<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

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
    public function store(Request $request): RedirectResponse
    {
        // First, take the resource as input
        $numberOfAttendees = $request->input('numbersOfAttendees');
        $event_id = $request->input('event_id');
        $user_id = $request->input('user_id');

        // Then, pass them as an object and create it with the directive Model::create as an associative array
        $attendee = Attendee::create([
            'numbersOfAttendees' => $numberOfAttendees,
            'event_id' => $event_id,
            'user_id' => $user_id,
        ]);

        return redirect('/attendees');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $attendee = Attendee::find($id);

        if ($attendee) {
            return response()->json($attendee);
        } else {
            return response()->json(['message' => 'Attendee not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $attendee = Attendee::find($id);

        if ($attendee) {
            $attendee->update($request->only(['numbersOfAttendees', 'event_id', 'user_id']));
            return response()->json(['message' => 'Attendee updated successfully']);
        } else {
            return response()->json(['message' => 'Attendee not found'], 404);
        }
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
        } else {
            return response()->json(['message' => 'Attendee not found'], 404);
        }
    }
}
