@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Events</h1>
    <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Create Event</a>

    <table class="table data-table">
      <thead>
        <tr>
          <th>Title</th>
          <th>Author</th> <!-- New Column -->
          <th>Date</th>
          <th>Time</th>
          <th>Location</th>
          <th>RSVP Status</th> <!-- New Column -->
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($events as $event)
          <tr>
            <td>{{ $event->title }}</td>
            <td>{{ $event->user->name }}</td> <!-- Display author's name -->
            <td>{{ $event->date }}</td>
            <td>{{ $event->time }}</td>
            <td>{{ $event->location }}</td>
            <td>
              @php
                $rsvp = $event->rsvps->where('user_id', auth()->user()->id)->first();
              @endphp
              @if ($rsvp)
                {{ ucfirst($rsvp->status) }}
              @else
                Not RSVP'd
              @endif
            </td>
            <td>
              <a href="{{ route('events.show', $event) }}" class="btn btn-info">View</a>
              @if ($event->user_id == auth()->user()->id)
                <a href="{{ route('events.edit', $event) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('events.destroy', $event) }}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                </form>
              @endif

              <a href="{{ route('rsvp.edit', $event) }}" class="btn btn-primary ms-1 mt-1">Update RSVP</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
