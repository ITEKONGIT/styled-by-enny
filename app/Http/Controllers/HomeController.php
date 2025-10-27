<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)->get();
        $categories = ServiceCategory::with(['services' => function($query) {
            $query->where('is_active', true);
        }])->where('is_active', true)->get();

        return view('home', compact('services', 'categories'));
    }

    public function services()
    {
        $services = Service::with('category')->where('is_active', true)->get();
        $categories = ServiceCategory::where('is_active', true)->get();

        return view('services', compact('services', 'categories'));
    }
}