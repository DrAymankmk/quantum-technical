<?php

namespace App\Http\Controllers;

use App\Models\CmsLanguage;
use App\Models\CmsPage;
use Illuminate\Http\Request;

class PageBuilderController extends Controller
{
    /**
     * Show the page builder for editing page, sections, and items in one view.
     */
    public function edit(CmsPage $page)
    {
        $languages = CmsLanguage::active()->ordered()->get();

        $page->load([
            'translations',
            'sections' => fn ($query) => $query->orderBy('order'),
            'sections.translations',
            'sections.items' => fn ($query) => $query->orderBy('order'),
            'sections.items.translations',
        ]);

        return view('backend.cms.page-builder.edit', compact('page', 'languages'));
    }

    /**
     * Update page settings from the page builder.
     */
    public function update(Request $request, CmsPage $page)
    {
        $validated = $request->validate([
            'slug' => 'required|string|max:255|unique:cms_pages,slug,'.$page->id,
            'name' => 'required|string|max:255',
            'is_active' => 'boolean',
            'order' => 'integer',
            'translations' => 'required|array',
            'translations.*.title' => 'required|string|max:255',
            'translations.*.meta_description' => 'nullable|string',
            'translations.*.meta_keywords' => 'nullable|string|max:255',
        ]);

        $page->update([
            'slug' => $validated['slug'],
            'name' => $validated['name'],
            'is_active' => $request->boolean('is_active', true),
            'order' => $validated['order'] ?? 0,
        ]);

        foreach ($validated['translations'] as $locale => $translationData) {
            $page->translations()->updateOrCreate(
                ['locale' => $locale],
                [
                    'title' => $translationData['title'],
                    'meta_description' => $translationData['meta_description'] ?? null,
                    'meta_keywords' => $translationData['meta_keywords'] ?? null,
                ]
            );
        }

        return redirect()->route('cms.pages.builder', $page)
            ->with('success', __('Page updated successfully'));
    }
}
