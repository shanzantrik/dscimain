@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content-header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0">Dashboard</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </div>
</div>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-3 col-6">
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{ $totalSpeakers }}</h3>
        <p>Total Speakers</p>
      </div>
      <div class="icon">
        <i class="fas fa-users"></i>
      </div>
      <a href="{{ route('admin.speakers.index') }}" class="small-box-footer">
        More info <i class="fas fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>

  <!-- Add more stats boxes here -->
</div>

<div class="row">
  <div class="col-lg-6">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Recent Speakers</h3>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Name</th>
              <th>Designation</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach($recentSpeakers as $speaker)
            <tr>
              <td>{{ $speaker->name }}</td>
              <td>{{ $speaker->designation }}</td>
              <td>
                <span class="badge badge-{{ $speaker->is_active ? 'success' : 'danger' }}">
                  {{ $speaker->is_active ? 'Active' : 'Inactive' }}
                </span>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
