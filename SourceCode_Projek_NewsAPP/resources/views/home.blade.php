@extends('layouts.app')

@section('title', 'Latest News')

@section('content')
<div class="container">
    <!-- Enhanced Hero Section with Gradient Background -->
    <div class="hero-section position-relative overflow-hidden mb-5">
        <div class="hero-bg-gradient"></div>
        <div class="hero-content position-relative p-5 rounded-lg text-white">
            <div class="row align-items-center min-vh-50">
                <div class="col-md-8">
                    <div class="hero-text fade-in">
                        <h1 class="display-4 fw-bold mb-4 hero-title">Welcome to News App</h1>
                        <p class="lead fs-5 mb-4 hero-subtitle">Get the latest news and updates from around the world with our comprehensive coverage and real-time reporting.</p>
                        <div class="hero-stats d-flex gap-4 mb-4">
                            <div class="stat-item">
                                <span class="stat-number">{{ $latestNews->count() }}</span>
                                <span class="stat-label">Latest Articles</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">{{ $categories->count() }}</span>
                                <span class="stat-label">Categories</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">24/7</span>
                                <span class="stat-label">Coverage</span>
                            </div>
                        </div>
                        <a href="#latest-news" class="btn btn-hero btn-lg rounded-pill px-4 py-3">
                            <i class="fas fa-newspaper me-2"></i>Explore News
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="hero-image-container zoom-in">
                        <div class="hero-image-wrapper">
                            <img src="{{ asset('assets/images/news/logokiri.png') }}" 
                                 alt="News App" 
                                 class="img-fluid hero-image">
                            <div class="hero-image-glow"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-wave">
            <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
                <path d="M0,0V15.81C13,36.92,27.64,56.86,49.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
                <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
            </svg>
        </div>
    </div>
    
    <!-- Latest News Section with Enhanced Cards -->
    <section class="mb-5" id="latest-news">
        <div class="section-header text-center mb-5">
            <h2 class="section-title position-relative">Latest News</h2>
            <p class="section-subtitle">Stay updated with the most recent stories and breaking news</p>
        </div>
        <div class="row g-4">
            @foreach($latestNews as $news)
            <div class="col-lg-4 col-md-6 mb-4">
                <article class="news-card h-100 zoom-in">
                    <div class="news-card-image-container">
                        @if($news->image)
                            <img src="{{ asset('assets/images/news/' . $news->image) }}" 
                                 class="news-card-image" 
                                 alt="{{ $news->title }}">
                        @else
                            <div class="news-card-placeholder">
                                <i class="fas fa-newspaper"></i>
                            </div>
                        @endif
                        <div class="news-card-overlay">
                            <span class="news-category-badge">{{ $news->category->name }}</span>
                        </div>
                    </div>
                    <div class="news-card-content">
                        <div class="news-meta mb-3">
                            <span class="news-date">
                                <i class="far fa-calendar-alt me-2"></i>
                                {{ $news->published_at->diffForHumans() }}
                            </span>
                        </div>
                        <h3 class="news-title mb-3">{{ $news->title }}</h3>
                        <p class="news-excerpt">{{ Str::limit(strip_tags($news->content), 120) }}</p>
                        <div class="news-card-footer">
                            <a href="{{ route('news.show', $news->slug) }}" class="btn-read-more">
                                Read Full Story
                                <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
    </section>
    
    <!-- Popular News Section with Horizontal Layout -->
    <section class="mb-5">
        <div class="section-header text-center mb-5">
            <h2 class="section-title position-relative">Trending Stories</h2>
            <p class="section-subtitle">Most read and shared articles this week</p>
        </div>
        <div class="trending-container">
            <div class="row g-3">
                @foreach($popularNews as $index => $news)
                <div class="col-lg-6 col-md-12 mb-3">
                    <article class="trending-card fade-in" data-animation-delay="{{ $index * 0.1 }}">
                        <div class="trending-rank">{{ $index + 1 }}</div>
                        <div class="trending-image">
                            @if($news->image)
                                <img src="{{ asset('assets/images/news/' . $news->image) }}" 
                                     alt="{{ $news->title }}">
                            @else
                                <div class="trending-placeholder">
                                    <i class="fas fa-fire"></i>
                                </div>
                            @endif
                        </div>
                        <div class="trending-content">
                            <h4 class="trending-title">{{ Str::limit($news->title, 80) }}</h4>
                            <div class="trending-meta">
                                <span class="trending-category">{{ $news->category->name }}</span>
                                <span class="trending-date">{{ $news->published_at->diffForHumans() }}</span>
                            </div>
                            <a href="{{ route('news.show', $news->slug) }}" class="trending-link">
                                <span>Read More</span>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    
    <!-- Enhanced Categories Section -->
    <section class="mb-5">
        <div class="section-header text-center mb-5">
            <h2 class="section-title position-relative">Explore Categories</h2>
            <p class="section-subtitle">Discover news by your interests</p>
        </div>
        <div class="categories-grid">
            <div class="row g-4">
                @foreach($categories as $index => $category)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="category-card zoom-in" data-animation-delay="{{ $index * 0.1 }}">
                        <div class="category-icon">
                            <i class="fas fa-{{ getCategoryIcon($category->name) }}"></i>
                        </div>
                        <div class="category-content">
                            <h3 class="category-name">{{ $category->name }}</h3>
                            <p class="category-count">{{ $category->news_count }} articles</p>
                            <a href="{{ route('category.news', $category->slug) }}" class="category-link">
                                <span>Explore</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                        <div class="category-bg-pattern"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Newsletter Subscription Section -->
    <section class="newsletter-section mb-5">
        <div class="newsletter-container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="newsletter-content">
                        <h3 class="newsletter-title">Stay in the Loop</h3>
                        <p class="newsletter-subtitle">Get the latest news delivered straight to your inbox</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <form class="newsletter-form">
                        <div class="input-group">
                            <input type="email" class="form-control newsletter-input" placeholder="Enter your email">
                            <button class="btn newsletter-btn" type="submit">
                                <i class="fas fa-paper-plane"></i>
                                Subscribe
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

@push('styles')
<style>
/* Hero Section Styles */
.hero-section {
    position: relative;
    min-height: 60vh;
    display: flex;
    align-items: center;
}

.hero-bg-gradient {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: var(--gradient-primary);
    border-radius: var(--border-radius);
    z-index: 1;
}

.hero-content {
    position: relative;
    z-index: 2;
}

.hero-title {
    background: linear-gradient(45deg, #fff, #ffd700);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: titleGlow 3s ease-in-out infinite alternate;
}

@keyframes titleGlow {
    0% { filter: drop-shadow(0 0 10px rgba(255, 215, 0, 0.3)); }
    100% { filter: drop-shadow(0 0 20px rgba(255, 215, 0, 0.6)); }
}

.hero-stats {
    margin: 2rem 0;
}

.stat-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.stat-number {
    font-size: 2rem;
    font-weight: 700;
    color: #ffd700;
    display: block;
}

.stat-label {
    font-size: 0.9rem;
    opacity: 0.9;
    display: block;
}

.btn-hero {
    background: rgba(255, 255, 255, 0.2);
    border: 2px solid rgba(255, 255, 255, 0.3);
    color: white;
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
}

.btn-hero:hover {
    background: rgba(255, 255, 255, 0.3);
    border-color: rgba(255, 255, 255, 0.5);
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
}

.hero-image-container {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
}

.hero-image-wrapper {
    position: relative;
    animation: float 6s ease-in-out infinite;
}

.hero-image {
    max-height: 300px;
    filter: drop-shadow(0 10px 30px rgba(0, 0, 0, 0.3));
}

.hero-image-glow {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 120%;
    height: 120%;
    background: radial-gradient(circle, rgba(255, 215, 0, 0.2) 0%, transparent 70%);
    border-radius: 50%;
    animation: pulse 4s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}

.hero-wave {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    overflow: hidden;
    line-height: 0;
    transform: rotate(180deg);
}

.hero-wave svg {
    position: relative;
    display: block;
    width: calc(100% + 1.3px);
    height: 60px;
}

.hero-wave .shape-fill {
    fill: #f8f9fa;
}

/* Section Headers */
.section-header {
    margin-bottom: 3rem;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    background: var(--gradient-primary);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 1rem;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
    background: var(--gradient-primary);
    border-radius: 2px;
}

.section-subtitle {
    font-size: 1.1rem;
    color: #6c757d;
    font-weight: 400;
}

/* News Cards */
.news-card {
    background: white;
    border-radius: var(--border-radius);
    overflow: hidden;
    box-shadow: var(--shadow-soft);
    transition: all 0.3s ease;
    border: none;
}

.news-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-hover);
}

.news-card-image-container {
    position: relative;
    height: 250px;
    overflow: hidden;
}

.news-card-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.news-card:hover .news-card-image {
    transform: scale(1.1);
}

.news-card-placeholder {
    width: 100%;
    height: 100%;
    background: var(--gradient-primary);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 3rem;
}

.news-card-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to bottom, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0.7) 100%);
    display: flex;
    align-items: flex-end;
    padding: 1.5rem;
}

.news-category-badge {
    background: var(--gradient-primary);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
}

.news-card-content {
    padding: 2rem;
}

.news-meta {
    color: #6c757d;
    font-size: 0.9rem;
}

.news-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: #212529;
    line-height: 1.4;
}

.news-excerpt {
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 1.5rem;
}

.btn-read-more {
    color: #667eea;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
}

.btn-read-more:hover {
    color: #5a6fd8;
    transform: translateX(5px);
}

/* Trending Cards */
.trending-card {
    background: white;
    border-radius: var(--border-radius);
    padding: 1.5rem;
    box-shadow: var(--shadow-soft);
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 1rem;
    position: relative;
}

.trending-card:hover {
    transform: translateX(10px);
    box-shadow: var(--shadow-hover);
}

.trending-rank {
    background: var(--gradient-primary);
    color: white;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 1.1rem;
    flex-shrink: 0;
}

.trending-image {
    width: 80px;
    height: 80px;
    border-radius: var(--border-radius);
    overflow: hidden;
    flex-shrink: 0;
}

.trending-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.trending-placeholder {
    width: 100%;
    height: 100%;
    background: var(--gradient-secondary);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
}

.trending-content {
    flex: 1;
}

.trending-title {
    font-size: 1rem;
    font-weight: 600;
    color: #212529;
    margin-bottom: 0.5rem;
    line-height: 1.3;
}

.trending-meta {
    display: flex;
    gap: 1rem;
    margin-bottom: 0.5rem;
    font-size: 0.85rem;
    color: #6c757d;
}

.trending-category {
    background: rgba(102, 126, 234, 0.1);
    color: #667eea;
    padding: 0.25rem 0.5rem;
    border-radius: 12px;
    font-weight: 500;
}

.trending-link {
    color: #667eea;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
}

.trending-link:hover {
    color: #5a6fd8;
}

/* Category Cards */
.category-card {
    background: white;
    border-radius: var(--border-radius);
    padding: 2rem;
    text-align: center;
    box-shadow: var(--shadow-soft);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.category-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-hover);
}

.category-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto 1.5rem;
    background: var(--gradient-primary);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 2rem;
    transition: all 0.3s ease;
}

.category-card:hover .category-icon {
    transform: scale(1.1) rotate(5deg);
}

.category-name {
    font-size: 1.25rem;
    font-weight: 600;
    color: #212529;
    margin-bottom: 0.5rem;
}

.category-count {
    color: #6c757d;
    margin-bottom: 1.5rem;
}

.category-link {
    color: #667eea;
    text-decoration: none;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
}

.category-link:hover {
    color: #5a6fd8;
    transform: translateX(5px);
}

.category-bg-pattern {
    position: absolute;
    top: -50%;
    right: -50%;
    width: 100%;
    height: 100%;
    background: radial-gradient(circle, rgba(102, 126, 234, 0.05) 0%, transparent 70%);
    border-radius: 50%;
    transition: all 0.3s ease;
}

.category-card:hover .category-bg-pattern {
    transform: scale(1.2);
}

/* Newsletter Section */
.newsletter-section {
    background: var(--gradient-primary);
    border-radius: var(--border-radius);
    padding: 3rem 2rem;
    color: white;
    position: relative;
    overflow: hidden;
}

.newsletter-container {
    position: relative;
    z-index: 2;
}

.newsletter-title {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.newsletter-subtitle {
    font-size: 1.1rem;
    opacity: 0.9;
    margin-bottom: 0;
}

.newsletter-form {
    max-width: 400px;
    margin-left: auto;
}

.newsletter-input {
    border: none;
    padding: 1rem 1.5rem;
    border-radius: 50px 0 0 50px;
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
}

.newsletter-input:focus {
    box-shadow: none;
    background: white;
}

.newsletter-btn {
    background: rgba(255, 255, 255, 0.2);
    border: 2px solid rgba(255, 255, 255, 0.3);
    color: white;
    padding: 1rem 2rem;
    border-radius: 0 50px 50px 0;
    font-weight: 600;
    transition: all 0.3s ease;
}

.newsletter-btn:hover {
    background: rgba(255, 255, 255, 0.3);
    border-color: rgba(255, 255, 255, 0.5);
    color: white;
    transform: translateX(5px);
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .hero-stats {
        flex-direction: column;
        gap: 1rem !important;
    }
    
    .trending-card {
        flex-direction: column;
        text-align: center;
    }
    
    .newsletter-form {
        margin-top: 2rem;
        margin-left: 0;
    }
}
</style>
@endpush

@push('scripts')
<script>
// Add some interactive JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Add scroll animation for cards
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observe all cards
    document.querySelectorAll('.news-card, .trending-card, .category-card').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });

    // Newsletter form handling
    const newsletterForm = document.querySelector('.newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('input[type="email"]').value;
            if (email) {
                // Here you would typically send the email to your backend
                alert('Thank you for subscribing! We\'ll keep you updated with the latest news.');
                this.reset();
            }
        });
    }
});

// Helper function for category icons (you can add this to a helper class or use it directly)
function getCategoryIcon(categoryName) {
    const icons = {
        'Technology': 'laptop-code',
        'Sports': 'futbol',
        'Politics': 'landmark',
        'Entertainment': 'film',
        'Health': 'heartbeat',
        'Business': 'chart-line',
        'Science': 'flask',
        'World': 'globe-americas',
        'Local': 'map-marker-alt',
        'Education': 'graduation-cap'
    };
    return icons[categoryName] || 'newspaper';
}
</script>
@endpush
@endsection