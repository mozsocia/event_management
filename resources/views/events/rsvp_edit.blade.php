@extends('layouts.app')

@section('content')
<div class="container">
    <h4><strong>Edit RSVP for Event: -- </strong> {{ $event->title }}</h4>
    <p><strong>Date:</strong> {{ $event->date }}</p>
    <p><strong>Time:</strong> {{ $event->time }}</p>
    <p><strong>Location:</strong> {{ $event->location }}</p>
    
    <form action="{{ route('rsvp.update', $event) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="status" class="form-label">RSVP Status</label>
            <select class="form-control" id="status" name="status">
                <option value="going" {{ $rsvp && $rsvp->status === 'going' ? 'selected' : '' }}>Going</option>
                <option value="not_interested" {{ $rsvp && $rsvp->status === 'not_interested' ? 'selected' : '' }}>Not Interested</option>
                <option value="maybe" {{ $rsvp && $rsvp->status === 'maybe' ? 'selected' : '' }}>Maybe</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update RSVP</button>
        <a href="{{ route('events.index') }}" class="btn btn-secondary">Back to List</a>
    </form>
</div>
@endsection
