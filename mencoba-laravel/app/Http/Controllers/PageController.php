<?php

namespace App\Http\Controllers;

use App\Models\CategoryBlog;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Blog;


class PageController extends Controller
{
    public function faq()
    {
        return view('faq.index');
    }

    public function contact()
    {
        $setting =Setting::get();
        return view('contact.index', compact('setting'));
    }

    public function blog()
    {
        $categories = CategoryBlog::withCount('blogs')->get();
        $totalBlogCount = Blog::count();
        // $blogs= Blog::with('category')->orderBy('id', 'desc')->get();
        $blogs= Blog::with('category')->latest()->get();
        
        return view('blog.index', compact('blogs', 'categories','totalBlogCount'));
    }

    public function showBlog(string $slug)
    {
        $blog = Blog::where('slug', $slug)->with('category')->first();
        return view('blog.show');
    }


}
