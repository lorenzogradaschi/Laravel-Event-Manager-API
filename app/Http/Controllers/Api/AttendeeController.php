<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendee;
use Illuminate\Http\Request;

class AttendeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendees = Attendee::all();
        return response()->json($attendees);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'numbersOfAttendees' => 'required|integer|min:1',
            'event_id' => 'required|exists:events,id',
            'user_id' => 'required|exists:users,id'
        ]);

        $attendee = Attendee::create([
            'numbersOfAttendees' => $request->numbersOfAttendees,
            'event_id' => $request->event_id,
            'user_id' => $request->user_id,
        ]);

        return response()->json($attendee, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $attendee = Attendee::find($id);

        if ($attendee) {
            return response()->json($attendee);
        }
        return response()->json(['message' => 'Attendee not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'numbersOfAttendees' => 'sometimes|required|integer|min:1',
            'event_id' => 'sometimes|required|exists:events,id',
            'user_id' => 'sometimes|required|exists:users,id'
        ]);

        $attendee = Attendee::find($id);

        if ($attendee) {
            $attendee->update($request->only(['numbersOfAttendees', 'event_id', 'user_id']));
            return response()->json($attendee);
        }
        return response()->json(['message' => 'Attendee not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $attendee = Attendee::find($id);

        if ($attendee) {
            $attendee->delete();
            return response()->json(['message' => 'Attendee deleted successfully']);
        }
        return response()->json(['message' => 'Attendee not found'], 404);
    }
}
