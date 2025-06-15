<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class NewsController extends Controller
{
    public function index()
    {
        $query = News::with(['user', 'category']);
        
        // Filter berdasarkan role
        $user = auth()->user();
        if ($user && $user->role === 'wartawan') {
            $query->where('user_id', auth()->id());
        }
        
        $news = $query->orderBy('created_at', 'desc')->paginate(10);
        
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.news.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $counter = 1;
        
        while (News::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $data = [
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'user_id' => auth()->id(),
            'status' => 'draft',
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            
            // Create directory if not exists
            $newsPath = public_path('assets/images/news/');
            if (!file_exists($newsPath)) {
                mkdir($newsPath, 0755, true);
            }
            
            // Initialize ImageManager with GD driver
            $manager = new ImageManager(new Driver());
            
            // Read, resize and save image using v3 syntax
            $img = $manager->read($image->getRealPath());
            $img->resize(800, 600);
            $img->save($newsPath . $filename);
            
            $data['image'] = $filename;
        }

        News::create($data);

        return redirect()->route('admin.news.index')->with('success', 'News created successfully!');
    }

    public function show(News $news)
    {
        return view('admin.news.show', compact('news'));
    }

    public function edit(News $news)
    {
        // Check permission
        $user = auth()->user();
        if ($user && $user->role === 'wartawan' && $news->user_id !== auth()->id()) {
            abort(403);
        }
        
        $categories = Category::all();
        return view('admin.news.edit', compact('news', 'categories'));
    }

    public function update(Request $request, News $news)
    {
        // Check permission
        $user = auth()->user();
        if ($user && $user->role === 'wartawan' && $news->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
        ];

        // Update slug only if title changed
        if ($news->title !== $request->title) {
            $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $counter = 1;
            
            while (News::where('slug', $slug)->where('id', '!=', $news->id)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }
            
            $data['slug'] = $slug;
        }

        if ($request->hasFile('image')) {
            // Delete old image
            if ($news->image && file_exists(public_path('assets/images/news/' . $news->image))) {
                unlink(public_path('assets/images/news/' . $news->image));
            }
            
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            
            // Create directory if not exists
            $newsPath = public_path('assets/images/news/');
            if (!file_exists($newsPath)) {
                mkdir($newsPath, 0755, true);
            }
            
            // Initialize ImageManager with GD driver
            $manager = new ImageManager(new Driver());
            
            // Read, resize and save image using v3 syntax
            $img = $manager->read($image->getRealPath());
            $img->resize(800, 600);
            $img->save($newsPath . $filename);
            
            $data['image'] = $filename;
        }

        $news->update($data);

        return redirect()->route('admin.news.index')->with('success', 'News updated successfully!');
    }

    public function destroy(News $news)
    {
        // Check permission
        $user = auth()->user();
        if ($user && $user->role === 'wartawan' && $news->user_id !== auth()->id()) {
            abort(403);
        }

        // Delete image
        if ($news->image && file_exists(public_path('assets/images/news/' . $news->image))) {
            unlink(public_path('assets/images/news/' . $news->image));
        }

        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'News deleted successfully!');
    }

    public function approve(News $news)
    {
        // Only editor can approve
        $user = auth()->user();
        if (!$user || ($user->role !== 'editor' && $user->role !== 'admin')) {
            abort(403);
        }

        $news->update([
            'status' => 'published',
            'published_at' => now(),
        ]);

        return redirect()->back()->with('success', 'News approved and published!');
    }

    public function reject(News $news)
    {
        // Only editor can reject
        $user = auth()->user();
        if (!$user || ($user->role !== 'editor' && $user->role !== 'admin')) {
            abort(403);
        }

        $news->update(['status' => 'rejected']);

        return redirect()->back()->with('success', 'News rejected!');
    }
}