<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CmsPage;
class AboutController extends Controller
{
    //
    public function index()
    {
        $aboutPage = CmsPage::where('slug', 'about')
            ->with([
                'sections' => function($query) {
                    $query->where('is_active', true)->orderBy('order');
                },
            ])
            ->first();
        return view('frontend.template-1.pages.about.index', compact('aboutPage'));
    }
}
