<?php

use App\Models\User;
use App\Models\News;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

if (!function_exists('current_user')) {
    /**
     * Get the current authenticated user
     * 
     * @return \App\Models\User|null
     */
    function current_user(): ?User
    {
        return auth()->user();
    }
}

if (!function_exists('getCategoryIcon')) {
    function getCategoryIcon($categoryName)
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
}

if (!function_exists('is_admin')) {
    /**
     * Check if current user is admin
     * 
     * @return bool
     */
    function is_admin(): bool
    {
        return current_user() && current_user()->isAdmin();
    }
}

if (!function_exists('is_editor')) {
    /**
     * Check if current user is editor
     * 
     * @return bool
     */
    function is_editor(): bool
    {
        return current_user() && current_user()->isEditor();
    }
}

if (!function_exists('is_wartawan')) {
    /**
     * Check if current user is wartawan
     * 
     * @return bool
     */
    function is_wartawan(): bool
    {
        return current_user() && current_user()->isWartawan();
    }
}

if (!function_exists('news_status_badge')) {
    /**
     * Generate status badge for news
     * 
     * @param string $status
     * @return string
     */
    function news_status_badge(string $status): string
    {
        $badges = [
            'draft' => 'warning',
            'published' => 'success',
            'rejected' => 'danger'
        ];
        
        return '<span class="badge badge-'.$badges[$status].'">'.ucfirst($status).'</span>';
    }
}

if (!function_exists('format_date')) {
    /**
     * Format date to human readable format
     * 
     * @param mixed $date
     * @param string $format
     * @return string
     */
    function format_date($date, string $format = 'd M Y'): string
    {
        if (!$date) return '-';
        
        return $date instanceof \DateTime 
            ? $date->format($format) 
            : \Carbon\Carbon::parse($date)->format($format);
    }
}

if (!function_exists('truncate_text')) {
    /**
     * Truncate text with ellipsis
     * 
     * @param string $text
     * @param int $limit
     * @return string
     */
    function truncate_text(string $text, int $limit = 100): string
    {
        return Str::limit($text, $limit, '...');
    }
}

if (!function_exists('news_image_url')) {
    /**
     * Get news image URL
     * 
     * @param string|null $image
     * @return string
     */
    function news_image_url(?string $image): string
    {
        return $image 
            ? asset('assets/images/news/'.$image) 
            : 'https://via.placeholder.com/800x600?text=No+Image';
    }
}

if (!function_exists('user_avatar_url')) {
    /**
     * Get user avatar URL
     * 
     * @param User $user
     * @return string
     */
    function user_avatar_url(User $user): string
    {
        if ($user->avatar) {
            return asset('assets/images/avatars/'.$user->avatar);
        }
        
        if ($user->google_id) {
            return $user->avatar;
        }
        
        return 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&color=7F9CF5&background=EBF4FF';
    }
}

if (!function_exists('get_categories')) {
    /**
     * Get all categories
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    function get_categories()
    {
        return Category::all();
    }
}

if (!function_exists('recent_news')) {
    /**
     * Get recent news
     * 
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    function recent_news(int $limit = 5)
    {
        return News::published()
            ->with(['user', 'category'])
            ->latest()
            ->limit($limit)
            ->get();
    }
}

if (!function_exists('storage_url')) {
    /**
     * Get storage URL for files
     * 
     * @param string $path
     * @return string
     */
    function storage_url(string $path): string
    {
        return Storage::url($path);
    }
}

if (!function_exists('active_route')) {
    /**
     * Check if route is active
     * 
     * @param string|array $route
     * @param string $output
     * @return string
     */
    function active_route($route, string $output = 'active'): string
    {
        if (is_array($route)) {
            return in_array(request()->route()->getName(), $route) ? $output : '';
        }
        
        return request()->route()->getName() == $route ? $output : '';
    }
}