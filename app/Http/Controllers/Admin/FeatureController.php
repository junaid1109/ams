<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Feature;
use App\Helpers\IconHelper;

class FeatureController extends \App\Http\Controllers\Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (auth()->user()->role === 'viewer' && in_array($request->route()->getActionMethod(), ['create', 'store', 'edit', 'update', 'destroy'])) {
                abort(403, 'Unauthorized. Viewers have read-only access.');
            }
            return $next($request);
        });
    }

    public function index()
    {
        $features = Feature::orderBy('order')->paginate(10);
        return view('admin.features.index', compact('features'));
    }

    public function create()
    {
        $icons = IconHelper::getBootstrapIcons();
        return view('admin.features.create', compact('icons'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string',
            'order' => 'nullable|integer',
            'published' => 'boolean',
        ]);

        $validated['published'] = $request->has('published');

        Feature::create($validated);

        return redirect()->route('admin.features.index')->with('success', 'Feature created successfully');
    }

    public function edit(Feature $feature)
    {
        $icons = IconHelper::getBootstrapIcons();
        return view('admin.features.edit', compact('feature', 'icons'));
    }

    public function update(Request $request, Feature $feature)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string',
            'order' => 'nullable|integer',
            'published' => 'boolean',
        ]);

        $validated['published'] = $request->has('published');

        $feature->update($validated);

        return redirect()->route('admin.features.index')->with('success', 'Feature updated successfully');
    }

    public function destroy(Feature $feature)
    {
        $feature->delete();
        return redirect()->route('admin.features.index')->with('success', 'Feature deleted successfully');
    }
}
