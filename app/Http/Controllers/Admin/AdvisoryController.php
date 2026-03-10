<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Advisory;
use Illuminate\Support\Str;

class AdvisoryController extends \App\Http\Controllers\Controller
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
        $advisory = Advisory::orderBy('order')->get();
        $advisoryIntro = \App\Models\HomeSection::where('section_name', 'advisory_intro')->first();
        $textBlocks = \App\Models\HomeSection::where('section_name', 'like', 'advisory_text_block_%')
            ->orderBy('display_order')
            ->get();
        $tableBlocks = \App\Models\HomeSection::where('section_name', 'like', 'advisory_table_block_%')
            ->orderBy('display_order')
            ->get();
        
        return view('admin.advisory.index', compact('advisory', 'advisoryIntro', 'textBlocks', 'tableBlocks'));
    }

    public function create()
    {
        return view('admin.advisory.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'category' => 'nullable|string',
            'icon' => 'nullable|image|mimes:png|max:512',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'image_secondary' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'client' => 'nullable|string|max:255',
            'project_date' => 'nullable|date',
            'published' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        // Ensure title is not empty
        if (empty(trim($validated['title']))) {
            return back()->withInput()->withErrors(['title' => 'Title cannot be empty']);
        }

        if ($request->hasFile('icon')) {
            $path = $request->file('icon')->store('advisory/icons', 'public');
            $validated['icon'] = $path;
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('advisory', 'public');
            $validated['image'] = $path;
        }

        if ($request->hasFile('image_secondary')) {
            $path = $request->file('image_secondary')->store('advisory', 'public');
            $validated['image_secondary'] = $path;
        }

        $validated['slug'] = Str::slug($validated['title']);
        $validated['published'] = $request->has('published');

        Advisory::create($validated);

        return redirect()->route('admin.advisory.index')->with('success', 'Advisory item created successfully');
    }

    public function edit(Advisory $advisory)
    {
        return view('admin.advisory.edit', compact('advisory'));
    }

    public function update(Request $request, Advisory $advisory)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'category' => 'nullable|string',
            'icon' => 'nullable|image|mimes:png|max:512',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'image_secondary' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'client' => 'nullable|string|max:255',
            'project_date' => 'nullable|date',
            'published' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        // Ensure title is not empty
        if (empty(trim($validated['title']))) {
            return back()->withInput()->withErrors(['title' => 'Title cannot be empty']);
        }

        if ($request->hasFile('icon')) {
            $path = $request->file('icon')->store('advisory/icons', 'public');
            $validated['icon'] = $path;
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('advisory', 'public');
            $validated['image'] = $path;
        }

        if ($request->hasFile('image_secondary')) {
            $path = $request->file('image_secondary')->store('advisory', 'public');
            $validated['image_secondary'] = $path;
        }

        $validated['slug'] = Str::slug($validated['title']);
        $validated['published'] = $request->has('published');

        $advisory->update($validated);

        return redirect()->route('admin.advisory.index')->with('success', 'Advisory item updated successfully');
    }

    public function destroy(Advisory $advisory)
    {
        $advisory->delete();
        return redirect()->route('admin.advisory.index')->with('success', 'Advisory item deleted successfully');
    }
}
