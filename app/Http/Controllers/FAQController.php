<?php

namespace App\Http\Controllers;

use App\Models\FAQ;

class FAQController extends Controller
{
    public function index()
    {
        $faqs = FAQ::where('published', true)->orderBy('order')->get();
        return view('frontend.faq', compact('faqs'));
    }
}
