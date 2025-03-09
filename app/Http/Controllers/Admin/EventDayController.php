<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventDay;
use Illuminate\Http\Request;

class EventDayController extends Controller
{
    public function index()
    {
        $eventDays = EventDay::withCount('agendas')
            ->orderBy('day_number')
            ->get();

        return view('admin.event-days.index', compact('eventDays'));
    }

    public function create()
    {
        return view('admin.event-days.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'day_number' => 'required|integer|min:1',
            'color_code' => 'required|string|max:7',
        ]);

        EventDay::create($validated);

        return redirect()->route('admin.event-days.index')
            ->with('success', 'Event day created successfully.');
    }

    public function edit(EventDay $eventDay)
    {
        return view('admin.event-days.edit', compact('eventDay'));
    }

    public function update(Request $request, EventDay $eventDay)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'day_number' => 'required|integer|min:1',
            'color_code' => 'required|string|max:7',
        ]);

        $eventDay->update($validated);

        return redirect()->route('admin.event-days.index')
            ->with('success', 'Event day updated successfully.');
    }

    public function destroy(EventDay $eventDay)
    {
        $eventDay->delete();

        return redirect()->route('admin.event-days.index')
            ->with('success', 'Event day deleted successfully.');
    }
}
