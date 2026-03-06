<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Helpers\SettingHelper;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Portfolio::where('published', true)->orderBy('order')->get();
        $siteName = SettingHelper::get('site_name', 'AMS');
        
        return view('frontend.services.index', compact('services', 'siteName'));
    }

    public function show($service)
    {
        // Only accept slug, not numeric ID
        $portfolio = Portfolio::where('slug', $service)->firstOrFail();
        
        if (!$portfolio->published) {
            abort(404);
        }
        
        $siteName = SettingHelper::get('site_name', 'AMS');
        $relatedServices = Portfolio::where('published', true)
            ->where('id', '!=', $portfolio->id)
            ->orderBy('order')
            ->take(3)
            ->get();
        
        return view('frontend.services.show', ['service' => $portfolio, 'relatedServices' => $relatedServices, 'siteName' => $siteName]);
    }
}
