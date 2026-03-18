<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use App\Models\Page;
use App\Models\Setting;
use App\Models\HomeSection;
use App\Helpers\SettingHelper;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $siteName = SettingHelper::get('site_name', 'AMS');
        $siteTagline = SettingHelper::get('site_tagline', 'Professional Business Solutions');
        
        $teamMembers = TeamMember::where('published', true)->orderBy('order')->get();
        
        // Get homepage sections data
        $homeSections = HomeSection::where('is_active', true)->orderBy('display_order')->get();
        
        // Services (empty array - service feature removed)
        $services = [];
        
        // Features (empty array - feature model removed)
        $features = [];
        
        return view('frontend.index', compact(
            'teamMembers',
            'siteName',
            'siteTagline',
            'homeSections',
            'services',
            'features'
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
