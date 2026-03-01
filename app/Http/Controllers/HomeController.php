<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Advisory;
use App\Models\TeamMember;
use App\Models\Page;
use App\Models\Setting;
use App\Models\HomeSection;
use App\Models\Feature;
use App\Helpers\SettingHelper;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $siteName = SettingHelper::get('site_name', 'AMS');
        $siteTagline = SettingHelper::get('site_tagline', 'Professional Business Solutions');
        
        $services = Portfolio::where('published', true)->orderBy('order')->take(6)->get();
        $portfolios = Advisory::where('published', true)->orderBy('order')->take(3)->get();
        $teamMembers = TeamMember::where('published', true)->orderBy('order')->get();
        $features = Feature::getPublished();
        
        // Get homepage sections data
        $homeSections = HomeSection::where('is_active', true)->orderBy('display_order')->get();
        
        return view('frontend.index', compact(
            'services', 
            'portfolios', 
            'teamMembers',
            'features',
            'siteName',
            'siteTagline',
            'homeSections'
        ));
    }

    public function about()
    {
        $siteName = SettingHelper::get('site_name', 'AMS');
        $page = Page::where('slug', 'about')->where('published', true)->first();
        $teamMembers = TeamMember::where('published', true)->orderBy('order')->get();
        $homeSections = HomeSection::where('is_active', true)->orderBy('display_order')->get();
        
        return view('frontend.about', compact('page', 'teamMembers', 'siteName', 'homeSections'));
    }
}
