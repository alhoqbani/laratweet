<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    
    public function follows(User $user)
    {
        auth()->user()->following()->attach($user->id);
    
        return response()->json(['message' => 'ok'], 201);
        
    }
    
    public function unfollows(User $user)
    {
        auth()->user()->following()->detach($user->id);
        
        return response()->json(['message' => 'ok'], 202);
    }
    
}
