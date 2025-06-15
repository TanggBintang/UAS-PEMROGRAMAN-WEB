<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('news')->get();
        
        $latestNews = News::published()
            ->with(['category', 'user'])
            ->orderBy('published_at', 'desc')
            ->take(6)
            ->get();
            
        // Menggunakan scope popular yang sudah ada di model
        $popularNews = News::published()
            ->popular() // Menggunakan scope popular
            ->take(4)
            ->get();

        return view('home', compact('categories', 'latestNews', 'popularNews'));
    }

    private function getCategoryIcon($categoryName)
        {
            $icons = [
                'Technology' => 'laptop-code',
                'Sports' => 'futbol',
                'Politics' => 'landmark',
                'Entertainment' => 'film',
                'Health' => 'heartbeat',
                'Business' => 'chart-line',
                'Science' => 'flask',
                'World' => 'globe-americas',
                'Local' => 'map-marker-alt',
                'Education' => 'graduation-cap'
            ];
            
            return $icons[$categoryName] ?? 'newspaper';
        }


    public function showNews($slug)
    {
        $news = News::where('slug', $slug)
            ->published()
            ->with(['category', 'user']) // Load relasi untuk menghindari N+1 query
            ->firstOrFail();
            
        // Increment views counter
        $news->increment('views');
        
        $relatedNews = News::where('category_id', $news->category_id)
            ->where('id', '!=', $news->id)
            ->published()
            ->with(['category', 'user'])
            ->take(3)
            ->get();

        // Gunakan view publik, bukan admin view
        return view('news.show', compact('news', 'relatedNews'));
    }

    public function categoryNews($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $news = News::where('category_id', $category->id)
            ->published()
            ->with(['category', 'user'])
            ->paginate(10);

        // Gunakan view publik untuk kategori
        return view('news.category', compact('category', 'news'));
    }
}