<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PcBuild; // Assume you have a PcBuild model
use Illuminate\Support\Facades\Auth;

class PcBuildController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pcBuilds = PcBuild::where('user_id', $user->id)->get(); 

        return view('pcbuilds.index', compact('pcBuilds'));
    }
}
