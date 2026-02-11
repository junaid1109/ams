<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Helpers\SettingHelper;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::where('published', true)->orderBy('order')->get();
        $categories = Portfolio::where('published', true)->select('category')->distinct()->get();
        $siteName = SettingHelper::get('site_name', 'AMS');
        
        return view('frontend.portfolio.index', compact('portfolios', 'categories', 'siteName'));
    }

    public function show(Portfolio $portfolio)
    {
        if (!$portfolio->published) {
            abort(404);
        }
        
        $siteName = SettingHelper::get('site_name', 'AMS');
        $relatedPortfolios = Portfolio::where('published', true)
            ->where('id', '!=', $portfolio->id)
            ->where('category', $portfolio->category)
            ->orderBy('order')
            ->take(3)
            ->get();
        
        return view('frontend.portfolio.show', compact('portfolio', 'relatedPortfolios', 'siteName'));
    }
}
