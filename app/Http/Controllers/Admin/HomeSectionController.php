<?php

namespace App\Http\Controllers\Admin;

use App\Models\HomeSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeSectionController extends Controller
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

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = HomeSection::orderBy('display_order')->get();
        return view('admin.home-sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.home-sections.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'section_name' => 'required|unique:home_sections',
            'title' => 'nullable|string',
            'subtitle' => 'nullable|string',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string',
            'button_link' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'display_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
            'content' => 'nullable|json',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('home-sections', 'public');
            $validated['image'] = $path;
        }

        $validated['is_active'] = $request->has('is_active');

        HomeSection::create($validated);

        return redirect()->route('admin.home-sections.index')
            ->with('success', 'Home section created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HomeSection $homeSection)
    {
        // Ensure content is decoded for the view
        if (is_string($homeSection->content)) {
            $homeSection->content = json_decode($homeSection->content, true) ?? [];
        }
        if (!is_array($homeSection->content)) {
            $homeSection->content = [];
        }
        return view('admin.home-sections.edit', compact('homeSection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HomeSection $homeSection)
    {
        $validated = $request->validate([
            'section_name' => 'required|string',
            'title' => 'nullable|string',
            'subtitle' => 'nullable|string',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string',
            'button_link' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'display_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
            'stats' => 'nullable|array',
            'stats.*.number' => 'nullable|string',
            'stats.*.label' => 'nullable|string',
        ]);

        // Handle Image Upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($homeSection->image && \Storage::disk('public')->exists($homeSection->image)) {
                \Storage::disk('public')->delete($homeSection->image);
            }
            $path = $request->file('image')->store('home-sections', 'public');
            $validated['image'] = $path;
        }

        // Handle is_active checkbox
        $validated['is_active'] = $request->has('is_active');

        // Handle Stats - convert to content field
        if ($request->has('stats')) {
            $stats = [];
            foreach ($request->input('stats', []) as $stat) {
                // Only add if number or label is not empty
                if (!empty($stat['number']) || !empty($stat['label'])) {
                    $stats[] = [
                        'number' => $stat['number'] ?? '',
                        'label' => $stat['label'] ?? '',
                    ];
                }
            }
            $validated['content'] = $stats;
        }

        // Remove stats from validated (not a DB column)
        unset($validated['stats']);

        // Debug - remove this after testing

        $homeSection->update($validated);

        return redirect()->route('admin.home-sections.index')
            ->with('success', 'Home section updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HomeSection $homeSection)
    {
        $homeSection->delete();

        return redirect()->route('admin.home-sections.index')
            ->with('success', 'Home section deleted successfully.');
    }
}
