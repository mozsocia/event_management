@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Event Details</h1>
    <div>
        <strong>Title:</strong> {{ $event->title }}
    </div>
    <div>
        <strong>Description:</strong> {{ $event->description }}
    </div>
    <div>
        <strong>Date:</strong> {{ $event->date }}
    </div>
    <div>
        <strong>Time:</strong> {{ $event->time }}
    </div>
    <div>
        <strong>Location:</strong> {{ $event->location }}
    </div>
    <a href="{{ route('events.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection
