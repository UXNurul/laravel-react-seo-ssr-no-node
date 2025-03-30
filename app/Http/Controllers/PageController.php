<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Page;

class PageController extends Controller
{
    public function showPage($slug = 'Home')
    {
        $page = DB::table('pages')->where('component', ucfirst($slug))->first();

        if (!$page) {
            abort(404);
        }

        return view('app', [
            'pageData' => json_encode([
                'component' => ucfirst($slug),
                'props' => [
                    'title' => $page->title ?? 'Default Title',
                    'description' => $page->description ?? '',
                    'keywords' => $page->keywords ?? '',
                    'message' => $page->message ?? '',
                    'subtitle' => $page->subtitle ?? 'Default Subtitle',
                    'email' => $page->email ?? 'support@example.com'
                ]
            ])
        ]);
    }

    // Show admin panel for pages
    public function index()
    {
        return response()->json(Page::all());
    }

    // Show the form for creating a new page
    public function create()
    {
        $page = Page::create($request->all());
        return response()->json($page, 201);
    }

    // Store a new page in the database
    public function store(Request $request)
    {
        $page = Page::create($request->all());
        return response()->json($page, 201);
    }

    // Show the form to edit an existing page
    public function edit($id)
    {
        $page = Page::findOrFail($id);
    return response()->json($page);
    }

    // Update the existing page
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
        ]);
    
        $page = Page::findOrFail($id);
        $page->update($request->all());
    
        return response()->json($page);
    }
    
    

    // Delete a page
    public function destroy($id)
    {
        Page::findOrFail($id)->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }

}