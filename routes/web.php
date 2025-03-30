<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\DB;

// Route::get('/{any}', function () {
//     return view('app', [
//         'pageData' => json_encode([
//             'component' => 'Home', 
//             'props' => [
//                 'message' => 'Welcome to Laravel + React',
//                 'email' => 'support@example.com'
//             ]
//         ])
//     ]);
// })->where('any', '.*');

// Route::get('/', function () {
//     return view('app', [
//         'pageData' => json_encode([
//             'component' => 'Home', 
//             'props' => [
//                 'title' => 'Home | Welcome',
//                 'description' => 'Home | description',
//                 'message' => 'Home | Welcome 📞',
//                 'email' => 'home@example.com'
//             ]
//         ])
//     ]);
// });

// Route::get('/contact', function () {
//     return view('app', [
//         'pageData' => json_encode([
//             'component' => 'Contact', 
//             'props' => [
//                 'title' => 'Contact Us - Get in Touch | Modernseva',
//                 'description' => 'Need help? Contact us for support, business inquiries, or collaboration. Reach out to us today!',
//                 'keywords' => 'Contact Modernseva, customer support, business inquiries, collaboration',
//                 'message' => 'Contact Us 📞',
//                 'subtitle' => 'We are here to help you 24/7',
//                 'email' => 'support@example.com'
//             ]
//         ])
//     ]);
// });


// Route::get('/{slug?}', [PageController::class, 'show'])->where('slug', '.*');

// Route::get('/', function () {
//     $page = DB::table('pages')->where('component', 'Home')->first();

//     if (!$page) {
//         abort(404); // Return a 404 if page is missing
//     }

//     return view('app', [
//         'pageData' => json_encode([
//             'component' => 'Home',
//             'props' => [
//                 'title' => $page->title ?? 'Home | Welcome',
//                 'description' => $page->description ?? '',
//                 'keywords' => $page->keywords ?? '',
//                 'message' => $page->message ?? '',
//                 'subtitle' => $page->subtitle ?? 'Default Subtitle',
//                 'email' => $page->email ?? 'support@example.com'
//             ]
//         ])
//     ]);
// });

// Route::get('/contact', function () {
//     $page = DB::table('pages')->where('component', 'Contact')->first();

//     if (!$page) {
//         abort(404); // Return a 404 if page is missing
//     }

//     return view('app', [
//         'pageData' => json_encode([
//             'component' => 'Contact',
//             'props' => [
//                 'title' => $page->title ?? 'Contact Us',
//                 'description' => $page->description ?? '',
//                 'keywords' => $page->keywords ?? '',
//                 'message' => $page->message ?? '',
//                 'subtitle' => $page->subtitle ?? 'Default Subtitle',
//                 'email' => $page->email ?? 'support@example.com'
//             ]
//         ])
//     ]);
// });

// Root URL ("/") should load the Home page directly
// Route::get('/', function () {
//     $page = DB::table('pages')->where('component', 'Home')->first();

//     if (!$page) {
//         abort(404); // 404 if Home page is missing
//     }

//     return view('app', [
//         'pageData' => json_encode([
//             'component' => 'Home',
//             'props' => [
//                 'title' => $page->title ?? 'Default Title',
//                 'description' => $page->description ?? '',
//                 'keywords' => $page->keywords ?? '',
//                 'message' => $page->message ?? '',
//                 'subtitle' => $page->subtitle ?? 'Default Subtitle',
//                 'email' => $page->email ?? 'support@example.com'
//             ]
//         ])
//     ]);
// });

// // Dynamic route for all other pages
// Route::get('/{slug}', function ($slug) {
//     $page = DB::table('pages')->where('component', ucfirst($slug))->first();

//     if (!$page) {
//         abort(404); // 404 if page not found
//     }

//     return view('app', [
//         'pageData' => json_encode([
//             'component' => ucfirst($slug),
//             'props' => [
//                 'title' => $page->title ?? 'Default Title',
//                 'description' => $page->description ?? '',
//                 'keywords' => $page->keywords ?? '',
//                 'message' => $page->message ?? '',
//                 'subtitle' => $page->subtitle ?? 'Default Subtitle',
//                 'email' => $page->email ?? 'support@example.com'
//             ]
//         ])
//     ]);
// });

// // Optional: Fallback route for better error handling
// Route::fallback(function () {
//     abort(404);
// });



    // Route::get('/admin/page', [PageController::class, 'index']);
    // Route::get('/admin/page/create', [PageController::class, 'create']);
    // Route::post('/admin/page/store', [PageController::class, 'store']);
    // Route::get('/admin/page/{id}/edit', [PageController::class, 'edit']);
    // Route::post('/admin/page/{id}/update', [PageController::class, 'update']);
    // Route::delete('/admin/page/{id}/delete', [PageController::class, 'destroy']);

    Route::get('/admin/pages', function () {
        return view('app', [
            'pageData' => json_encode([
                'component' => 'Home', // Default component
                'props' => [
                    'title' => 'Default Title',
                    'description' => 'Default Description',
                    'keywords' => 'Laravel, React, SEO',
                    'message' => 'Welcome to our site!',
                    'subtitle' => 'Best platform for services',
                    'email' => 'support@example.com'
                ]
            ])
        ]);
    });

   


// Home page
Route::get('/', [PageController::class, 'showPage']);

// Dynamic pages
Route::get('/{slug}', [PageController::class, 'showPage']);

// Optional: 404 fallback
Route::fallback(function () {
    abort(404);
});


Route::get('/sitemap.xml', function () {
    return response()->view('sitemap')->header('Content-Type', 'text/xml');
});

Route::get('/robots.txt', function () {
    $content = "User-agent: *\n";
    $content .= "Disallow: /admin\n";
    $content .= "Disallow: /private\n";

    $content .= "Disallow: /secret\n";

    $content .= "Allow: /\n";

    $content .= "Sitemap: " . url('/sitemap.xml') . "\n";

    // File::put(public_path('robots.txt'), $content);

    return Response::make($content, 200)
    ->header('Content-Type', 'text/plain')
    ->header('Cache-Control', 'no-cache, no-store, must-revalidate');
});