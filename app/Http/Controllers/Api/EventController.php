<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendees = DB::table('attendees')->get();
        return response()->json($attendees);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // First, take the resource as input
        $name = $request->input('name');
        $start_time = $request->input('start_time');
        $end_time = $request->input('end_time');

        // Then, pass them as an object and create it with the directive Model::create as an associative array
        $event = Event::create([
            'name' => $name,
            'start_time' => $start_time,
            'end_time' => $end_time,
        ]);

        return redirect('/events');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::find($id);

        if ($event) {
            return response()->json($event);
        } else {
            return response()->json(['message' => 'Event not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::find($id);

        if ($event) {
            $event->update($request->only(['name', 'start_time', 'end_time']));
            return response()->json(['message' => 'Event updated successfully']);
        } else {
            return response()->json(['message' => 'Event not found'], 404);
        }
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
        } else {
            return response()->json(['message' => 'Event not found'], 404);
        }
    }
}
