<?php

namespace App\Http\Controllers\Admin;

use App\Models\HomeSection;
use App\Models\Setting;
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
     * Create form for advisory text blocks (auto-generates section name)
     */
    public function createAdvisoryTextBlock()
    {
        // Find the next available advisory text block number
        $lastBlock = HomeSection::where('section_name', 'like', 'advisory_text_block_%')
            ->orderBy('section_name', 'desc')
            ->first();
        
        $nextNumber = 1;
        if ($lastBlock) {
            preg_match('/advisory_text_block_(\d+)/', $lastBlock->section_name, $matches);
            if (isset($matches[1])) {
                $nextNumber = (int)$matches[1] + 1;
            }
        }
        
        $sectionName = 'advisory_text_block_' . $nextNumber;
        $isAdvisoryTextBlock = true;
        $blockType = 'text';
        
        return view('admin.home-sections.create-advisory', compact('sectionName', 'isAdvisoryTextBlock', 'blockType'));
    }

    /**
     * Create form for advisory table blocks (auto-generates section name)
     */
    public function createAdvisoryTableBlock()
    {
        // Find the next available advisory table block number
        $lastBlock = HomeSection::where('section_name', 'like', 'advisory_table_block_%')
            ->orderBy('section_name', 'desc')
            ->first();
        
        $nextNumber = 1;
        if ($lastBlock) {
            preg_match('/advisory_table_block_(\d+)/', $lastBlock->section_name, $matches);
            if (isset($matches[1])) {
                $nextNumber = (int)$matches[1] + 1;
            }
        }
        
        $sectionName = 'advisory_table_block_' . $nextNumber;
        $isAdvisoryTableBlock = true;
        $blockType = 'table';
        
        return view('admin.home-sections.create-advisory', compact('sectionName', 'isAdvisoryTableBlock', 'blockType'));
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
            'tagline' => 'nullable|string',
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

        $section = HomeSection::create($validated);

        // Redirect back to advisory page if it's an advisory text block or table block
        if (str_contains($section->section_name, 'advisory_text_block')) {
            return redirect()->route('admin.advisory.index')
                ->with('success', 'Text block created successfully.');
        }

        if (str_contains($section->section_name, 'advisory_table_block')) {
            return redirect()->route('admin.advisory.index')
                ->with('success', 'Table block created successfully.');
        }

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
            'tagline' => 'nullable|string',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string',
            'button_link' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'display_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
            'stats' => 'nullable|array',
            'stats.*.number' => 'nullable|string',
            'stats.*.label' => 'nullable|string',
            'portfolio_cta_button_enabled' => 'nullable|boolean',
            'portfolio_more_projects_button_enabled' => 'nullable|boolean',
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

        // Handle portfolio button toggles - save to Settings table
        if ($homeSection->section_name === 'portfolio-conclusion') {
            Setting::updateOrCreate(
                ['key' => 'portfolio_cta_button_enabled'],
                ['value' => $request->has('portfolio_cta_button_enabled') ? 1 : 0]
            );
            Setting::updateOrCreate(
                ['key' => 'portfolio_more_projects_button_enabled'],
                ['value' => $request->has('portfolio_more_projects_button_enabled') ? 1 : 0]
            );
        }

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

        // Remove stats and portfolio buttons from validated (not DB columns)
        unset($validated['stats'], $validated['portfolio_cta_button_enabled'], $validated['portfolio_more_projects_button_enabled']);

        $homeSection->update($validated);

        // Redirect back to advisory page if it's an advisory text block or table block
        if (str_contains($homeSection->section_name, 'advisory_text_block')) {
            return redirect()->route('admin.advisory.index')
                ->with('success', 'Text block updated successfully.');
        }

        if (str_contains($homeSection->section_name, 'advisory_table_block')) {
            return redirect()->route('admin.advisory.index')
                ->with('success', 'Table block updated successfully.');
        }

        return redirect()->route('admin.home-sections.index')
            ->with('success', 'Home section updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HomeSection $homeSection)
    {
        $sectionName = $homeSection->section_name;
        $homeSection->delete();

        // Redirect back to advisory page if it's an advisory text block or table block
        if (str_contains($sectionName, 'advisory_text_block')) {
            return redirect()->route('admin.advisory.index')
                ->with('success', 'Text block deleted successfully.');
        }

        if (str_contains($sectionName, 'advisory_table_block')) {
            return redirect()->route('admin.advisory.index')
                ->with('success', 'Table block deleted successfully.');
        }

        return redirect()->route('admin.home-sections.index')
            ->with('success', 'Home section deleted successfully.');
    }
}
