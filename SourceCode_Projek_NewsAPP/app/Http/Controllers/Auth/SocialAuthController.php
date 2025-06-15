<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        // Validasi provider yang diizinkan
        if (!in_array($provider, ['github', 'google', 'microsoft'])) {
            return redirect('/login')->withErrors(['error' => 'Provider not supported']);
        }

        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {
            // Validasi provider yang diizinkan
            if (!in_array($provider, ['github', 'google', 'microsoft'])) {
                return redirect('/login')->withErrors(['error' => 'Provider not supported']);
            }

            $socialUser = Socialite::driver($provider)->user();
            
            // Validasi data yang diperlukan dari provider
            if (!$socialUser->getEmail()) {
                return redirect('/login')->withErrors(['error' => 'Email not provided by ' . ucfirst($provider)]);
            }

            // Cek apakah user sudah ada berdasarkan email atau social ID
            $user = User::where('email', $socialUser->getEmail())
                       ->orWhere($provider . '_id', $socialUser->getId())
                       ->first();
            
            if ($user) {
                // Update social ID dan avatar jika user sudah ada
                $updateData = [
                    $provider . '_id' => $socialUser->getId(),
                ];

                // Update avatar jika tersedia
                if ($socialUser->getAvatar()) {
                    $updateData['avatar'] = $socialUser->getAvatar();
                }

                // Update email jika berbeda (untuk kasus user login dengan social ID tapi email berubah)
                if ($user->email !== $socialUser->getEmail()) {
                    // Cek apakah email baru sudah digunakan user lain
                    $emailExists = User::where('email', $socialUser->getEmail())
                                      ->where('id', '!=', $user->id)
                                      ->exists();
                    
                    if (!$emailExists) {
                        $updateData['email'] = $socialUser->getEmail();
                    }
                }

                $user->update($updateData);
            } else {
                // Buat user baru
                $userData = [
                    'name' => $socialUser->getName() ?: $socialUser->getNickname() ?: 'User',
                    'email' => $socialUser->getEmail(),
                    'password' => bcrypt(Str::random(16)),
                    'role' => 'wartawan', // default role
                    $provider . '_id' => $socialUser->getId(),
                    'email_verified_at' => now(), // Anggap email sudah terverifikasi dari provider
                ];

                // Tambahkan avatar jika tersedia
                if ($socialUser->getAvatar()) {
                    $userData['avatar'] = $socialUser->getAvatar();
                }

                $user = User::create($userData);
            }
            
            // Login user
            Auth::login($user);
            
            // Regenerate session untuk keamanan
            request()->session()->regenerate();
            
            return redirect()->intended('/admin/dashboard');
            
        } catch (\Laravel\Socialite\Two\InvalidStateException $e) {
            return redirect('/login')->withErrors([
                'error' => 'Invalid state. Please try again.'
            ]);
        } catch (\Exception $e) {
            // Log error untuk debugging
            Log::error('Social Auth Error: ' . $e->getMessage(), [
                'provider' => $provider,
                'error' => $e->getTraceAsString()
            ]);

            return redirect('/login')->withErrors([
                'error' => 'Unable to login using ' . ucfirst($provider) . '. Please try again.'
            ]);
        }
    }
}