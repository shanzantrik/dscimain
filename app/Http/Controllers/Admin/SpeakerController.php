<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Speaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SpeakerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $speakers = Speaker::orderBy('order')->get();
        return view('admin.speakers.index', compact('speakers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.speakers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'order' => 'nullable|integer'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('speakers', 'public');
            $validated['image'] = $path;
        }

        Speaker::create($validated);

        return redirect()->route('admin.speakers.index')
            ->with('success', 'Speaker created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Speaker $speaker)
    {
        return view('admin.speakers.edit', compact('speaker'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Speaker $speaker)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'order' => 'nullable|integer'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($speaker->image) {
                Storage::disk('public')->delete($speaker->image);
            }
            $path = $request->file('image')->store('speakers', 'public');
            $validated['image'] = $path;
        }

        $speaker->update($validated);

        return redirect()->route('admin.speakers.index')
            ->with('success', 'Speaker updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Speaker $speaker)
    {
        if ($speaker->image) {
            Storage::disk('public')->delete($speaker->image);
        }

        $speaker->delete();

        return redirect()->route('admin.speakers.index')
            ->with('success', 'Speaker deleted successfully.');
    }
}
