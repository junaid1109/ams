<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use App\Helpers\SettingHelper;

class FAQController extends Controller
{
    public function index()
    {
        $faqs = FAQ::where('published', true)->orderBy('order')->get()->groupBy('topic');
        $siteName = SettingHelper::get('site_name', 'AMS');
        $siteTagline = SettingHelper::get('site_tagline', 'Professional Business Solutions');
        return view('frontend.faq', compact('faqs', 'siteName', 'siteTagline'));
    }
}
