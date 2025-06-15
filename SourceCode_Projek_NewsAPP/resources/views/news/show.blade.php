@extends('layouts.app')

@section('title', $news->title . ' - News App')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <!-- Main News Content -->
            <article class="news-article">
                <div class="news-header mb-4">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('category.news', $news->category->slug) }}">{{ $news->category->name }}</a></li>
                            <li class="breadcrumb-item active">{{ Str::limit($news->title, 50) }}</li>
                        </ol>
                    </nav>
                    
                    <h1 class="news-title">{{ $news->title }}</h1>
                    
                    <div class="news-meta mb-3">
                        <span class="badge bg-primary">{{ $news->category->name }}</span>
                        <span class="text-muted ms-2">
                            <i class="fas fa-user"></i> By {{ $news->user->name }}
                        </span>
                        <span class="text-muted ms-2">
                            <i class="fas fa-calendar"></i> {{ $news->published_at->format('d M Y, H:i') }}
                        </span>
                        <span class="text-muted ms-2">
                            <i class="fas fa-eye"></i> {{ number_format($news->views) }} views
                        </span>
                    </div>
                </div>
                
                @if($news->image)
                <div class="news-image mb-4">
                    <img src="{{ asset('assets/images/news/' . $news->image) }}" 
                         alt="{{ $news->title }}" 
                         class="img-fluid rounded shadow">
                </div>
                @endif
                
                <div class="news-content">
                    <div class="content-text">
                        {!! nl2br(e($news->content)) !!}
                    </div>
                </div>
                
                <!-- Social Share Buttons -->
                <div class="social-share mt-4 pt-4 border-top">
                    <h6>Share this article:</h6>
                    <div class="share-buttons">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" 
                           class="btn btn-primary btn-sm me-2" target="_blank">
                            <i class="fab fa-facebook-f"></i> Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($news->title) }}" 
                           class="btn btn-info btn-sm me-2" target="_blank">
                            <i class="fab fa-twitter"></i> Twitter
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($news->title . ' ' . request()->fullUrl()) }}" 
                           class="btn btn-success btn-sm" target="_blank">
                            <i class="fab fa-whatsapp"></i> WhatsApp
                        </a>
                    </div>
                </div>
            </article>
        </div>
        
        <div class="col-md-4">
            <!-- Related News Sidebar -->
            @if($relatedNews->count() > 0)
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Related News</h5>
                </div>
                <div class="card-body">
                    @foreach($relatedNews as $related)
                    <div class="related-news-item {{ !$loop->last ? 'mb-3 pb-3 border-bottom' : '' }}">
                        <div class="row">
                            @if($related->image)
                            <div class="col-4">
                                <img src="{{ asset('assets/images/news/' . $related->image) }}" 
                                     alt="{{ $related->title }}" 
                                     class="img-fluid rounded">
                            </div>
                            <div class="col-8">
                            @else
                            <div class="col-12">
                            @endif
                                <h6 class="related-title">
                                    <a href="{{ route('news.show', $related->slug) }}" 
                                       class="text-decoration-none">
                                        {{ Str::limit($related->title, 60) }}
                                    </a>
                                </h6>
                                <small class="text-muted">
                                    {{ $related->published_at->diffForHumans() }}
                                </small>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            
            <!-- Back to Category -->
            <div class="card">
                <div class="card-body text-center">
                    <h6>More from {{ $news->category->name }}</h6>
                    <a href="{{ route('category.news', $news->category->slug) }}" 
                       class="btn btn-outline-primary">
                        View All {{ $news->category->name }} News
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.news-title {
    font-size: 2.5rem;
    font-weight: bold;
    line-height: 1.2;
    margin-bottom: 1rem;
}

.news-meta {
    font-size: 0.9rem;
}

.news-content {
    font-size: 1.1rem;
    line-height: 1.8;
    text-align: justify;
}

.related-title a {
    color: #333;
    font-weight: 500;
}

.related-title a:hover {
    color: #007bff;
}

.share-buttons .btn {
    border-radius: 20px;
}

@media (max-width: 768px) {
    .news-title {
        font-size: 2rem;
    }
    
    .news-meta span {
        display: block;
        margin-bottom: 0.25rem;
    }
}
</style>
@endsection