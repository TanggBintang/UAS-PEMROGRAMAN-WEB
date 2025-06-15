@extends('layouts.admin')

@section('title', 'Profile - News App')
@section('page-title', 'My Profile')

@section('breadcrumb')
    <li class="breadcrumb-item active">Profile</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                <img src="{{ auth()->user()->avatar ? asset('assets/images/avatars/' . auth()->user()->avatar) : 'https://via.placeholder.com/150/1F2937/FFFFFF?text=' . substr(auth()->user()->name, 0, 1) }}" 
                     alt="Profile Picture" class="profile-avatar rounded-circle mb-3">
                
                <h4>{{ auth()->user()->name }}</h4>
                <p class="text-muted">
                    <i class="fas fa-envelope mr-2"></i> {{ auth()->user()->email }}<br>
                    <i class="fas fa-user-tag mr-2"></i> {{ ucfirst(auth()->user()->role) }}
                </p>
                
                <p class="text-muted">
                    Member since {{ auth()->user()->created_at->format('d M Y') }}
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>Update Profile</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', auth()->user()->name) }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', auth()->user()->email) }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="avatar">Profile Picture</label>
                        <input type="file" name="avatar" id="avatar" class="form-control-file">
                        <small class="text-muted">Leave blank to keep current picture</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <input type="password" name="current_password" id="current_password" class="form-control">
                        <small class="text-muted">Required only if changing password</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="password_confirmation">Confirm New Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection