@extends('admin.layouts.app')

@section('title', 'Event Agendas - ' . $eventDay->title)

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Event Agendas for {{ $eventDay->title }} ({{ $eventDay->date->format('d M Y') }})</h3>
          <div class="card-tools">
            <a href="{{ route('admin.event-days.agendas.create', $eventDay) }}" class="btn btn-primary">
              <i class="fas fa-plus"></i> Add New Agenda
            </a>
            <a href="{{ route('admin.event-days.index') }}" class="btn btn-default ml-2">
              <i class="fas fa-arrow-left"></i> Back to Days
            </a>
          </div>
        </div>
        <div class="card-body">
          @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif

          <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Time</th>
                  <th>Title</th>
                  <th>Venue</th>
                  <th>Track</th>
                  <th>Speakers</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse($agendas as $agenda)
                <tr>
                  <td>
                    {{ $agenda->start_time->format('h:i A') }} -
                    {{ $agenda->end_time->format('h:i A') }}
                  </td>
                  <td>
                    <strong>{{ $agenda->title }}</strong>
                    @if($agenda->description)
                    <br>
                    <small class="text-muted">{{ Str::limit($agenda->description, 100) }}</small>
                    @endif
                  </td>
                  <td>{{ $agenda->venue }}</td>
                  <td>{{ $agenda->track }}</td>
                  <td>
                    @foreach($agenda->speakers as $speaker)
                    <div class="speaker-item mb-2">
                      <img src="{{ $speaker->image_url }}" alt="{{ $speaker->name }}" class="speaker-avatar">
                      <div class="speaker-info">
                        <strong>{{ $speaker->name }}</strong>
                        @if($speaker->pivot->role)
                        <br>
                        <small class="text-primary">{{ $speaker->pivot->role }}</small>
                        @endif
                      </div>
                    </div>
                    @endforeach
                  </td>
                  <td>
                    <div class="btn-group">
                      <a href="{{ route('admin.event-days.agendas.edit', [$eventDay, $agenda]) }}"
                        class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i>
                      </a>
                      <form action="{{ route('admin.event-days.agendas.destroy', [$eventDay, $agenda]) }}" method="POST"
                        class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                          onclick="return confirm('Are you sure you want to delete this agenda?')">
                          <i class="fas fa-trash"></i>
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="6" class="text-center">No agendas found for this day.</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  .speaker-item {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .speaker-avatar {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    object-fit: cover;
  }

  .speaker-info {
    font-size: 0.9em;
  }
</style>
@endsection
