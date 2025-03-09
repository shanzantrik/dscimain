@extends('admin.layouts.app')

@section('title', 'Event Days Management')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Event Days</h3>
          <div class="card-tools">
            <a href="{{ route('admin.event-days.create') }}" class="btn btn-primary">
              <i class="fas fa-plus"></i> Add New Day
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
                  <th>Day #</th>
                  <th>Date</th>
                  <th>Title</th>
                  <th>Subtitle</th>
                  <th>Color</th>
                  <th>Agendas</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse($eventDays as $day)
                <tr>
                  <td>{{ $day->day_number }}</td>
                  <td>{{ $day->date->format('d M Y') }}</td>
                  <td>{{ $day->title }}</td>
                  <td>{{ $day->subtitle }}</td>
                  <td>
                    <span class="color-preview" style="background-color: {{ $day->color_code }}"></span>
                    {{ $day->color_code }}
                  </td>
                  <td>
                    <a href="{{ route('admin.event-days.agendas.index', $day) }}" class="btn btn-info btn-sm">
                      <i class="fas fa-calendar-alt"></i> View Agendas ({{ $day->agendas_count ?? 0 }})
                    </a>
                  </td>
                  <td>
                    <div class="btn-group">
                      <a href="{{ route('admin.event-days.edit', $day) }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i>
                      </a>
                      <form action="{{ route('admin.event-days.destroy', $day) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                          onclick="return confirm('Are you sure you want to delete this day?')">
                          <i class="fas fa-trash"></i>
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="7" class="text-center">No event days found.</td>
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
  .color-preview {
    display: inline-block;
    width: 20px;
    height: 20px;
    margin-right: 5px;
    border-radius: 3px;
    vertical-align: middle;
  }
</style>
@endsection
