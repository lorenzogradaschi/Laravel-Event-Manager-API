<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return response()->json($events);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $start_time = $request->input('start_time');
        $end_time = $request->input('end_time');

        $event = Event::create([
            'name' => $name,
            'description' => $description,
            'start_time' => $start_time,
            'end_time' => $end_time,
        ]);

        return response()->json($event, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::find($id);

        if ($event) {
            return response()->json($event);
        }
        return response()->json(['message' => 'Event not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::find($id);

        if ($event) {
            $event->update($request->only(['name', 'description', 'start_time', 'end_time']));
            return response()->json($event);
        }
        return response()->json(['message' => 'Event not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::find($id);

        if ($event) {
            $event->delete();
            return response()->json(['message' => 'Event deleted successfully']);
        }
        return response()->json(['message' => 'Event not found'], 404);
    }
}
