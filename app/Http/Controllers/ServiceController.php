<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Helpers\SettingHelper;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('published', true)->orderBy('order')->get();
        $siteName = SettingHelper::get('site_name', 'AMS');
        
        return view('frontend.services.index', compact('services', 'siteName'));
    }

    public function show(Service $service)
    {
        if (!$service->published) {
            abort(404);
        }
        
        $siteName = SettingHelper::get('site_name', 'AMS');
        $relatedServices = Service::where('published', true)
            ->where('id', '!=', $service->id)
            ->orderBy('order')
            ->take(3)
            ->get();
        
        return view('frontend.services.show', compact('service', 'relatedServices', 'siteName'));
    }
}
