<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CmsLanguageController;
use App\Http\Controllers\CmsPageController;
use App\Http\Controllers\CmsSectionController;
use App\Http\Controllers\CmsItemController;
use App\Http\Controllers\CmsLinkController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\TranslationController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\FaqController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\ServiceSolutionController;





Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [
            \Mcamara\LaravelLocalization\Middleware\LocaleCookieRedirect::class,
            \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter::class,
            \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationViewPath::class,
        ],
    ],
    function () {

Route::get('/', [HomeController::class, 'index'])->name('frontend.home.index');
Route::get('/about', [AboutController::class, 'index'])->name('frontend.about.index');
Route::get('/contact', [ContactController::class, 'index'])->name('frontend.contact.index');
Route::post('/contact', [ContactController::class, 'send'])->name('frontend.contact.send');
Route::get('/faq', [FaqController::class, 'index'])->name('frontend.faq.index');
Route::get('/services', [ServiceController::class, 'index'])->name('frontend.services.index');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('frontend.services.show');
Route::get('/service-solutions', [ServiceSolutionController::class, 'index'])->name('frontend.service-solutions.index');



        // CMS Dashboard - Protected
        Route::middleware(['auth'])->group(function () {
            Route::get('/dashboard', function () {
                return view('backend.index');
            })->name('dashboard');

            // CMS Routes
            Route::prefix('cms')->name('cms.')->group(function () {
                // Languages (Modal CRUD)
                Route::get('languages/data', [CmsLanguageController::class, 'data'])->name('languages.data');
                Route::post('languages/{language}/toggle-status', [CmsLanguageController::class, 'toggleStatus'])->name('languages.toggle-status');
                Route::resource('languages', CmsLanguageController::class)->except(['create', 'edit']);

                // Pages (Full Page CRUD)
                Route::get('pages/data', [CmsPageController::class, 'data'])->name('pages.data');
                Route::post('pages/{page}/toggle-status', [CmsPageController::class, 'toggleStatus'])->name('pages.toggle-status');
                Route::resource('pages', CmsPageController::class);

                // Sections (Full Page CRUD)
                Route::get('sections/data', [CmsSectionController::class, 'data'])->name('sections.data');
                Route::post('sections/{section}/toggle-status', [CmsSectionController::class, 'toggleStatus'])->name('sections.toggle-status');
                Route::get('sections/{section}/get-form', [CmsSectionController::class, 'getForm'])->name('sections.get-form');
                Route::resource('sections', CmsSectionController::class);

                // Items (Full Page CRUD)
                Route::get('items/data', [CmsItemController::class, 'data'])->name('items.data');
                Route::post('items/{item}/toggle-status', [CmsItemController::class, 'toggleStatus'])->name('items.toggle-status');
                Route::get('items/{item}/get-form', [CmsItemController::class, 'getForm'])->name('items.get-form');
                Route::resource('items', CmsItemController::class);

                // Links (Modal CRUD)
                Route::get('links/data', [CmsLinkController::class, 'data'])->name('links.data');
                Route::post('links/{link}/toggle-status', [CmsLinkController::class, 'toggleStatus'])->name('links.toggle-status');
                Route::resource('links', CmsLinkController::class)->except(['create', 'edit']);

                // Media Management
                Route::get('media/data', [MediaController::class, 'data'])->name('media.data');
                Route::get('media/collections', [MediaController::class, 'getCollections'])->name('media.collections');
                Route::post('media/bulk-delete', [MediaController::class, 'bulkDestroy'])->name('media.bulk-delete');
                Route::resource('media', MediaController::class)->except(['create', 'edit', 'show']);

                // Translations Management
                Route::get('translations/data', [TranslationController::class, 'data'])->name('translations.data');
                Route::get('translations/locales', [TranslationController::class, 'getLocales'])->name('translations.locales');
                Route::get('translations/files', [TranslationController::class, 'getFiles'])->name('translations.files');
                Route::post('translations/scan', [TranslationController::class, 'scan'])->name('translations.scan');
                Route::resource('translations', TranslationController::class)->except(['show']);
            });
        });
    }
);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';