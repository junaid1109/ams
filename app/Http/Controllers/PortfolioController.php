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
        $advisorySection = \App\Models\HomeSection::where('section_name', 'advisory_intro')->first();
        $textBlocks = \App\Models\HomeSection::where('section_name', 'like', 'advisory_text_block_%')
            ->orderBy('display_order')
            ->get();
        $tableBlocks = \App\Models\HomeSection::where('section_name', 'like', 'advisory_table_block_%')
            ->orderBy('display_order')
            ->get();
        
        return view('frontend.advisory.index', compact('portfolios', 'categories', 'siteName', 'advisorySection', 'textBlocks', 'tableBlocks'));
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
