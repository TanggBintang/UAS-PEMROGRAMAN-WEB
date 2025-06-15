@extends('layouts.app')

@section('title', $category->name . ' News - News App')

@section('content')
<div class="container">
    <!-- Category Header -->
    <div class="category-header mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">{{ $category->name }}</li>
            </ol>
        </nav>
        
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="category-title">{{ $category->name }}</h1>
                @if($category->description)
                    <p class="category-description text-muted">{{ $category->description }}</p>
                @endif
                <p class="text-muted">{{ $news->total() }} articles found</p>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('home') }}" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-left"></i> Back to Home
                </a>
            </div>
        </div>
    </div>
    
    <!-- News List -->
    @if($news->count() > 0)
        <div class="row">
            @foreach($news as $newsItem)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100 news-card">
                    @if($newsItem->image)
                        <div class="card-img-wrapper">
                            <img src="{{ asset('assets/images/news/' . $newsItem->image) }}" 
                                 class="card-img-top" 
                                 alt="{{ $newsItem->title }}">
                        </div>
                    @else
                        <div class="card-img-wrapper">
                            <div class="placeholder-img d-flex align-items-center justify-content-center bg-light">
                                <i class="fas fa-image fa-3x text-muted"></i>
                            </div>
                        </div>
                    @endif
                    
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">
                            <a href="{{ route('news.show', $newsItem->slug) }}" 
                               class="text-decoration-none text-dark">
                                {{ $newsItem->title }}
                            </a>
                        </h5>
                        
                        <p class="card-text text-muted flex-grow-1">
                            {{ Str::limit(strip_tags($newsItem->content), 120) }}
                        </p>
                        
                        <div class="news-meta">
                            <small class="text-muted">
                                <i class="fas fa-user"></i> {{ $newsItem->user->name }}
                            </small>
                            <small class="text-muted ms-2">
                                <i class="fas fa-calendar"></i> {{ $newsItem->published_at->diffForHumans() }}
                            </small>
                            <small class="text-muted ms-2">
                                <i class="fas fa-eye"></i> {{ number_format($newsItem->views) }}
                            </small>
                        </div>
                    </div>
                    
                    <div class="card-footer bg-transparent">
                        <a href="{{ route('news.show', $newsItem->slug) }}" 
                           class="btn btn-primary btn-sm">
                            Read More <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $news->links() }}
        </div>
    @else
        <div class="text-center py-5">
            <div class="empty-state">
                <i class="fas fa-newspaper fa-4x text-muted mb-3"></i>
                <h4>No News Found</h4>
                <p class="text-muted">There are no published articles in this category yet.</p>
                <a href="{{ route('home') }}" class="btn btn-primary">Browse Other Categories</a>
            </div>
        </div>
    @endif
</div>

<style>
.category-title {
    font-size: 2.5rem;
    font-weight: bold;
    color: #333;
}

.category-description {
    font-size: 1.1rem;
    margin-bottom: 1rem;
}

.news-card {
    transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    border: none;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.news-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 20px rgba(0,0,0,0.15);
}

.card-img-wrapper {
    height: 200px;
    overflow: hidden;
}

.card-img-top {
    height: 100%;
    width: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.news-card:hover .card-img-top {
    transform: scale(1.05);
}

.placeholder-img {
    height: 200px;
    background-color: #f8f9fa;
}

.card-title a:hover {
    color: #007bff !important;
}

.news-meta {
    font-size: 0.85rem;
    border-top: 1px solid #eee;
    padding-top: 0.5rem;
    margin-top: 0.5rem;
}

.empty-state {
    padding: 3rem 1rem;
}

@media (max-width: 768px) {
    .category-title {
        font-size: 2rem;
    }
    
    .col-md-6 {
        margin-bottom: 1rem;
    }
}
</style>
@endsection