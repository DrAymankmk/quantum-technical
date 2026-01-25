<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CmsPage;
class ServiceSolutionController extends Controller
{
    //
    public function index()
    {
        $serviceSolutionPage = CmsPage::where('slug', 'service-solutions')
            ->with([
                'sections' => function($query) {
                    $query->where('is_active', true)->orderBy('order');
                },
            ])
            ->first();
        return view('frontend.template-1.pages.service-solution.index', compact('serviceSolutionPage'));
    }
}
