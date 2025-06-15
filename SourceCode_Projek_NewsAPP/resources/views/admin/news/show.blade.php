@extends('layouts.admin')

@section('title', 'View News - News App')
@section('page-title', 'View News')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.news.index') }}">News</a></li>
    <li class="breadcrumb-item active">View</li>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <h2>{{ $news->title }}</h2>
                <div class="news-meta mb-3">
                    <span class="badge bg-primary">{{ $news->category->name }}</span>
                    <span class="text-muted">Posted by {{ $news->user->name }} on {{ $news->created_at->format('d M Y') }}</span>
                    <span class="badge {{ $news->status == 'published' ? 'bg-success' : ($news->status == 'draft' ? 'bg-warning' : 'bg-danger') }}">
                        {{ ucfirst($news->status) }}
                    </span>
                    @if($news->published_at)
                        <span class="text-muted">Published on {{ $news->published_at->format('d M Y H:i') }}</span>
                    @endif
                </div>
                
                @if($news->image)
                    <img src="{{ asset('assets/images/news/' . $news->image) }}" alt="News Image" class="img-fluid mb-3 rounded">
                @endif
                
                <div class="news-content">
                    {!! nl2br(e($news->content)) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Actions</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            @if(auth()->user()->isEditor() || auth()->user()->isAdmin())
                                @if($news->status == 'draft')
                                    <form action="{{ route('admin.news.approve', $news->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-block">Approve & Publish</button>
                                    </form>
                                @endif
                                
                                @if($news->status != 'rejected')
                                    <form action="{{ route('admin.news.reject', $news->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-block">Reject</button>
                                    </form>
                                @endif
                            @endif
                            
                            @if(auth()->user()->isAdmin() || $news->user_id == auth()->id())
                                <a href="{{ route('admin.news.edit', $news->id) }}" class="btn btn-primary btn-block">Edit</a>
                                
                                <form action="{{ route('admin.news.destroy', $news->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            @endif
                            
                            <a href="{{ route('admin.news.index') }}" class="btn btn-secondary btn-block">Back to List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection