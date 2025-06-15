@extends('layouts.admin')

@section('title', 'News Management - News App')
@section('page-title', 'News Management')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">News</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">News List</h3>
                <div class="card-tools">
                    @if(auth()->user()->isWartawan() || auth()->user()->isAdmin())
                        <a href="{{ route('admin.news.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Add News
                        </a>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($news as $item)
                                <tr>
                                    <td>
                                        @if($item->image)
                                            <img src="{{ asset('assets/images/news/' . $item->image) }}" 
                                                 alt="News Image" class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                                        @else
                                            <div class="bg-secondary d-flex align-items-center justify-content-center" 
                                                 style="width: 60px; height: 60px; border-radius: 4px;">
                                                <i class="fas fa-image text-white"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <strong>{{ Str::limit($item->title, 50) }}</strong>
                                        <br>
                                        <small class="text-muted">{{ Str::limit(strip_tags($item->content), 80) }}</small>
                                    </td>
                                    <td>
                                        <span class="badge badge-info">{{ $item->category->name }}</span>
                                    </td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>
                                        @switch($item->status)
                                            @case('published')
                                                <span class="badge badge-success">
                                                    <i class="fas fa-check"></i> Published
                                                </span>
                                                @break
                                            @case('draft')
                                                <span class="badge badge-warning">
                                                    <i class="fas fa-edit"></i> Draft
                                                </span>
                                                @break
                                            @case('rejected')
                                                <span class="badge badge-danger">
                                                    <i class="fas fa-times"></i> Rejected
                                                </span>
                                                @break
                                            @default
                                                <span class="badge badge-secondary">{{ ucfirst($item->status) }}</span>
                                        @endswitch
                                    </td>
                                    <td>
                                        {{ $item->created_at->format('d M Y') }}
                                        <br>
                                        <small class="text-muted">{{ $item->created_at->format('H:i') }}</small>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <!-- View Button -->
                                            <a href="{{ route('admin.news.show', $item) }}" 
                                               class="btn btn-info btn-sm" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            <!-- Edit Button - Only for owner or admin -->
                                            @if(auth()->user()->isAdmin() || $item->user_id === auth()->id())
                                                <a href="{{ route('admin.news.edit', $item) }}" 
                                                   class="btn btn-warning btn-sm" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            @endif

                                            <!-- Approval Buttons - Only for Editor/Admin -->
                                            @if((auth()->user()->isEditor() || auth()->user()->isAdmin()) && $item->status === 'draft')
                                                <form action="{{ route('admin.news.approve', $item) }}" 
                                                      method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success btn-sm" 
                                                            title="Approve" onclick="return confirm('Are you sure you want to approve this news?')">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                </form>
                                                <form action="{{ route('admin.news.reject', $item) }}" 
                                                      method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-secondary btn-sm" 
                                                            title="Reject" onclick="return confirm('Are you sure you want to reject this news?')">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </form>
                                            @endif

                                            <!-- Delete Button - Only for owner or admin -->
                                            @if(auth()->user()->isAdmin() || $item->user_id === auth()->id())
                                                <form action="{{ route('admin.news.destroy', $item) }}" 
                                                      method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" 
                                                            title="Delete" onclick="return confirm('Are you sure you want to delete this news?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">
                                        <div class="text-muted">
                                            <i class="fas fa-newspaper fa-3x mb-3"></i>
                                            <h5>No News Found</h5>
                                            <p>There are no news articles available.</p>
                                            @if(auth()->user()->isWartawan() || auth()->user()->isAdmin())
                                                <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
                                                    <i class="fas fa-plus"></i> Create Your First News
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if($news->hasPages())
                <div class="card-footer clearfix">
                    <div class="float-right">
                        {{ $news->links() }}
                    </div>
                    <div class="float-left">
                        <small class="text-muted">
                            Showing {{ $news->firstItem() }} to {{ $news->lastItem() }} of {{ $news->total() }} results
                        </small>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Quick Stats Cards -->
@if(auth()->user()->isAdmin() || auth()->user()->isEditor())
<div class="row mt-3">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $news->where('status', 'draft')->count() }}</h3>
                <p>Pending Approval</p>
            </div>
            <div class="icon">
                <i class="fas fa-clock"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $news->where('status', 'published')->count() }}</h3>
                <p>Published</p>
            </div>
            <div class="icon">
                <i class="fas fa-check-circle"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $news->where('status', 'rejected')->count() }}</h3>
                <p>Rejected</p>
            </div>
            <div class="icon">
                <i class="fas fa-times-circle"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ $news->count() }}</h3>
                <p>Total News</p>
            </div>
            <div class="icon">
                <i class="fas fa-newspaper"></i>
            </div>
        </div>
    </div>
</div>
@endif
@endsection

@push('styles')
<style>
    .btn-group .btn {
        margin-right: 2px;
    }
    .btn-group .btn:last-child {
        margin-right: 0;
    }
    .table td {
        vertical-align: middle;
    }
    .img-thumbnail {
        border-radius: 4px;
    }
    .small-box {
        border-radius: 8px;
        transition: transform 0.2s;
    }
    .small-box:hover {
        transform: translateY(-2px);
    }
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    // Initialize tooltips
    $('[title]').tooltip();
    
    // Auto hide alerts after 5 seconds
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 5000);
});
</script>
@endpush