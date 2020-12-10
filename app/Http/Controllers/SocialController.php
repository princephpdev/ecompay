<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function socialRedirect(){
        return Socialite::driver('google')->redirect();
    }

    public function socialCallback(){
        try {
            $user = Socialite::driver('google')->user();
           $check_user = User::where('email', $user->getEmail())->first();
           if($check_user){
                Auth::login($check_user);
                return redirect('/dashboard');
           }
           else{
               $provider = 'Google';
               $newUser = User::create([
                   'name'=> $user->getName(),
                   'email'=> $user->getEmail(),
                   'provider_id' => $user->getId(),
                   'profile_photo_path' => $user->getAvatar(),
                   'provider' => $provider,
                   'password' => Hash::make('123456abc'),
               ]);

               Auth::login($newUser);
               return redirect('/dashboard');
           }
        } catch ( \Exception $e) {
            dd($e->getMessage());
        }
    }
}
