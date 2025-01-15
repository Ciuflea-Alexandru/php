<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    public function main()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $pages = $user->pages;

            return view('main', compact('user', 'pages'));
        } else {
            return redirect('/login')->withErrors([
                'auth2' => 'You must be authenticated',
            ]);
        }
    }

    public function storePage(Request $request)
    {
        $page = new Page;
        $page->title = 'New Page';
        $page->user_id = Auth::id();
        $page->save();

        return redirect()->route('main', ['page_title' => $page->title]);
    }

    public function showPage(Page $page)
    {
        $user = Auth::user();
        $pages = $user->pages;

        return view('main', compact('user', 'page', 'pages'));
    }

    public function updateAllPages(Request $request)
    {
        $user = Auth::user();
        $pages = $user->pages;

        // Loop through the titles and texts for each page
        $titles = $request->input('title', []);
        $texts = $request->input('text', []);

        foreach ($pages as $page) {
            if (isset($titles[$page->id])) {
                $page->update([
                    'title' => $titles[$page->id],
                    'text' => $texts[$page->id],
                ]);
            }
        }

        return redirect()->back()->with('success', 'Pages updated successfully.');
    }


}

