<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Str;

class PortfolioController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        $portfolios = Portfolio::orderBy('order')->paginate(10);
        return view('admin.portfolio.index', compact('portfolios'));
    }

    public function create()
    {
        return view('admin.portfolio.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'image_secondary' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'client' => 'nullable|string|max:255',
            'project_url' => 'nullable|url',
            'project_date' => 'nullable|date',
            'details' => 'nullable|string',
            'published' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('portfolio', 'public');
            $validated['image'] = $path;
        }

        if ($request->hasFile('image_secondary')) {
            $path = $request->file('image_secondary')->store('portfolio', 'public');
            $validated['image_secondary'] = $path;
        }

        $validated['slug'] = Str::slug($validated['title']);
        $validated['published'] = $request->has('published');

        Portfolio::create($validated);

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio item created successfully');
    }

    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'image_secondary' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'client' => 'nullable|string|max:255',
            'project_url' => 'nullable|url',
            'project_date' => 'nullable|date',
            'details' => 'nullable|string',
            'published' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('portfolio', 'public');
            $validated['image'] = $path;
        }

        if ($request->hasFile('image_secondary')) {
            $path = $request->file('image_secondary')->store('portfolio', 'public');
            $validated['image_secondary'] = $path;
        }

        $validated['slug'] = Str::slug($validated['title']);
        $validated['published'] = $request->has('published');

        $portfolio->update($validated);

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio item updated successfully');
    }

    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio item deleted successfully');
    }
}
