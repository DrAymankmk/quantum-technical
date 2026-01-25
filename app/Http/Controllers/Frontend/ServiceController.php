<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CmsPage;
use App\Models\CmsItem;

class ServiceController extends Controller
{
    //
    public function index()
    {
        $servicePage = CmsPage::where('slug', 'services')
            ->with([
                'sections' => function ($query) {
                    $query->where('is_active', true)->orderBy('order');
                },
            ])
            ->first();

        return view('frontend.template-1.pages.service.index', compact('servicePage'));
    }

    public function show($slug)
    {
        // Get service item by slug, but only if it belongs to the "services" page
        $servicePage = CmsItem::with(['translations', 'section.page'])
            ->where('slug', $slug)
            ->whereHas('section.page', function ($q) {
                $q->where('slug', 'services');
            })
            ->firstOrFail();

        return view('frontend.template-1.pages.service.show', compact('servicePage'));
    }
}
