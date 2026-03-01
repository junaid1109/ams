<?php

namespace App\Http\Controllers;

use App\Models\Advisory;
use App\Helpers\SettingHelper;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Advisory::where('published', true)->orderBy('order')->get();
        $categories = Advisory::where('published', true)->select('category')->distinct()->get();
        $siteName = SettingHelper::get('site_name', 'AMS');
        
        return view('frontend.advisory.index', compact('portfolios', 'categories', 'siteName'));
    }

    public function show(Advisory $advisory)
    {
        if (!$advisory->published) {
            abort(404);
        }
        
        $siteName = SettingHelper::get('site_name', 'AMS');
        $relatedPortfolios = Advisory::where('published', true)
            ->where('id', '!=', $advisory->id)
            ->where('category', $advisory->category)
            ->orderBy('order')
            ->take(3)
            ->get();
        
        return view('frontend.advisory.show', compact('advisory', 'relatedPortfolios', 'siteName'));
    }
}
