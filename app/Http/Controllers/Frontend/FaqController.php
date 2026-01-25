<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CmsPage;
class FaqController extends Controller
{
    //
    public function index()
    {
        $faqPage = CmsPage::where('slug', 'faq')
            ->with([
                'sections' => function($query) {
                    $query->where('is_active', true)->orderBy('order');
                },
            ])
            ->first();
        return view('frontend.template-1.pages.faq.index', compact('faqPage'));
    }
}
