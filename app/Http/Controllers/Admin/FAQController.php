<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = FAQ::orderBy('order')->paginate(20);
        return view('admin.faqs.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:500|unique:faqs',
            'answer' => 'required|string',
            'order' => 'nullable|integer',
            'published' => 'boolean',
        ]);

        FAQ::create($validated);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FAQ $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FAQ $faq)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:500|unique:faqs,question,' . $faq->id,
            'answer' => 'required|string',
            'order' => 'nullable|integer',
            'published' => 'boolean',
        ]);

        $faq->update($validated);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FAQ $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ deleted successfully');
    }
}
