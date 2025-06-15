@extends('layouts.app')

@section('title', $category->name . ' News')

@section('content')
<div class="container">
    <!-- Category Header -->
    <div class="row mb-4">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
                </ol>
            </nav>
            <h1 class="mb-3">{{ $category->name }} News</h1>
            <p class="text-muted">Browse all news articles in {{ $category->name }} category</p>
        </div>
    </div>

    <!-- News List -->
    <div class="row">
        @if($news->count() > 0)
            @foreach($news as $article)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    @if($article->image)
                        <img src="{{ asset('assets/images/news/' . $article->image) }}" class="card-img-top" alt="{{ $article->title }}" style="height: 200px; object-fit: cover;">
                    @else
                        <img src="https://via.placeholder.com/300x200/1F2937/FFFFFF?text=No+Image" class="card-img-top" alt="No Image" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <span class="badge bg-primary mb-2 align-self-start">{{ $category->name }}</span>
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text flex-grow-1">{{ Str::limit(strip_tags($article->content), 120) }}</p>
                        <div class="mt-auto">
                            <small class="text-muted d-block mb-2">
                                <i class="fas fa-user"></i> {{ $article->user->name }} | 
                                <i class="fas fa-calendar"></i> {{ $article->published_at->format('M d, Y') }} |
                                <i class="fas fa-eye"></i> {{ $article->views }} views
                            </small>
                            <a href="{{ route('news.show', $article->slug) }}" class="btn btn-primary btn-sm">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="col-12">
                <div class="alert alert-info text-center">
                    <h4>No Articles Found</h4>
                    <p>There are no published articles in the {{ $category->name }} category yet.</p>
                    <a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>
                </div>
            </div>
        @endif
    </div>

    <!-- Pagination -->
    @if($news->hasPages())
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-center">
                {{ $news->links() }}
            </div>
        </div>
    </div>
    @endif
</div>
@endsection

@push('styles')
<style>
    .card {
        transition: transform 0.2s ease-in-out;
        border: none;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    }
    
    .breadcrumb {
        background-color: transparent;
        padding: 0;
    }
    
    .badge {
        font-size: 0.75rem;
    }
</style>
@endpush