<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Helpers\IconHelper;
use Illuminate\Support\Str;

class PortfolioController extends \App\Http\Controllers\Controller
{
    public function __construct()
    {
        // Viewers can only view, not create/edit/delete
        $this->middleware(function ($request, $next) {
            if (auth()->user()->role === 'viewer' && in_array($request->route()->getActionMethod(), ['create', 'store', 'edit', 'update', 'destroy'])) {
                abort(403, 'Unauthorized. Viewers have read-only access.');
            }
            return $next($request);
        });
    }

    public function index()
    {
        $portfolios = Portfolio::orderBy('order')->paginate(10);
        
        // Ensure all portfolios have slugs
        foreach ($portfolios as $portfolio) {
            if (!$portfolio->slug) {
                $portfolio->slug = Str::slug($portfolio->title);
                $portfolio->save();
            }
        }
        
        return view('admin.portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        return view('admin.portfolios.create');
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'title' => 'required|filled|string|max:255',
            'description' => 'required|filled|string',
            'short_description' => 'required|filled|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'features' => 'nullable|string',
            'pricing' => 'nullable|string',
            'published' => 'boolean',
            'order' => 'nullable|integer',
        ]);
        
        \Log::info('Validated data:', $validated);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('portfolios', 'public');
            $validated['image'] = $path;
        }

        $validated['slug'] = Str::slug($validated['title']);
        $validated['published'] = $request->has('published');

        Portfolio::create($validated);

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio created successfully');
    }

    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolios.edit', compact('portfolio'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'title' => 'required|filled|string|max:255',
            'description' => 'required|filled|string',
            'short_description' => 'required|filled|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'features' => 'nullable|string',
            'pricing' => 'nullable|string',
            'published' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {   
            $path = $request->file('image')->store('portfolio', 'public');
            $validated['image'] = $path;
        }

        $validated['slug'] = Str::slug($validated['title']);
        $validated['published'] = $request->has('published');

        $portfolio->update($validated);

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio updated successfully');
    }

    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio deleted successfully');
    }       
}
