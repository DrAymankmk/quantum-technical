<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CmsPage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $homePage = CmsPage::where('slug', 'home')
            ->with([
                'sections' => function($query) {
                    $query->where('is_active', true)->orderBy('order');
                },
                'sections.items' => function($query) {
                    $query->where('is_active', true)->orderBy('order');
                },
                'sections.items.translations',
                'sections.translations'
            ])
            ->first();
            
        return view('frontend.template-1.pages.home.index', compact('homePage'));
    }
}