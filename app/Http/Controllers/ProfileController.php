<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Auth::user();
        // $profiles = User::withCount('pemeriksaans')->get();
        return view('profile.index', compact('profiles'));
    }


}
