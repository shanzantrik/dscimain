<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventAgenda;
use App\Models\EventDay;
use App\Models\Speaker;
use Illuminate\Http\Request;

class EventAgendaController extends Controller
{
    public function index(EventDay $eventDay)
    {
        $agendas = $eventDay->agendas()->with('speakers')->get();
        return view('admin.event-agendas.index', compact('eventDay', 'agendas'));
    }

    public function create(EventDay $eventDay)
    {
        $speakers = Speaker::orderBy('name')->get();
        return view('admin.event-agendas.create', compact('eventDay', 'speakers'));
    }

    public function store(Request $request, EventDay $eventDay)
    {
        $validated = $request->validate([
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'venue' => 'nullable|string|max:255',
            'track' => 'nullable|string|max:255',
            'speakers' => 'array',
            'speakers.*' => 'exists:speakers,id',
            'speaker_roles' => 'array',
            'speaker_roles.*' => 'string|max:255',
        ]);

        $agenda = $eventDay->agendas()->create([
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'title' => $validated['title'],
            'description' => $validated['description'],
            'venue' => $validated['venue'],
            'track' => $validated['track'],
        ]);

        if (!empty($validated['speakers'])) {
            $speakerRoles = [];
            foreach ($validated['speakers'] as $index => $speakerId) {
                $speakerRoles[$speakerId] = [
                    'role' => $validated['speaker_roles'][$index] ?? null
                ];
            }
            $agenda->speakers()->attach($speakerRoles);
        }

        return redirect()->route('admin.event-days.agendas.index', $eventDay)
            ->with('success', 'Event agenda created successfully.');
    }

    public function edit(EventDay $eventDay, EventAgenda $agenda)
    {
        $speakers = Speaker::orderBy('name')->get();
        $agenda->load('speakers');
        return view('admin.event-agendas.edit', compact('eventDay', 'agenda', 'speakers'));
    }

    public function update(Request $request, EventDay $eventDay, EventAgenda $agenda)
    {
        $validated = $request->validate([
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'venue' => 'nullable|string|max:255',
            'track' => 'nullable|string|max:255',
            'speakers' => 'array',
            'speakers.*' => 'exists:speakers,id',
            'speaker_roles' => 'array',
            'speaker_roles.*' => 'string|max:255',
        ]);

        $agenda->update([
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'title' => $validated['title'],
            'description' => $validated['description'],
            'venue' => $validated['venue'],
            'track' => $validated['track'],
        ]);

        if (!empty($validated['speakers'])) {
            $speakerRoles = [];
            foreach ($validated['speakers'] as $index => $speakerId) {
                $speakerRoles[$speakerId] = [
                    'role' => $validated['speaker_roles'][$index] ?? null
                ];
            }
            $agenda->speakers()->sync($speakerRoles);
        } else {
            $agenda->speakers()->detach();
        }

        return redirect()->route('admin.event-days.agendas.index', $eventDay)
            ->with('success', 'Event agenda updated successfully.');
    }

    public function destroy(EventDay $eventDay, EventAgenda $agenda)
    {
        $agenda->delete();

        return redirect()->route('admin.event-days.agendas.index', $eventDay)
            ->with('success', 'Event agenda deleted successfully.');
    }
}
