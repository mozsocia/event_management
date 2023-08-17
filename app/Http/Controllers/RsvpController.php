<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Rsvp;
use Illuminate\Http\Request;

class RsvpController extends Controller
{
    public function update(Request $request, Event $event)
    {
        $user = auth()->user();
        $rsvp = Rsvp::where('user_id', $user->id)->where('event_id', $event->id)->first();

        if (!$rsvp) {
            Rsvp::create([
                'user_id' => $user->id,
                'event_id' => $event->id,
                'status' => 'going', // Default status
            ]);
        } else {
            $rsvp->status = $request->input('status');
            $rsvp->save();
        }

        return redirect()->route('events.index')->with('success', 'RSVP updated successfully.');
    }

    public function edit(Event $event)
    {
        $user = auth()->user();
        $rsvp = Rsvp::where('user_id', $user->id)->where('event_id', $event->id)->first();

        return view('events.rsvp_edit', compact('event', 'rsvp'));
    }

}
