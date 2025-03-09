@extends('admin.layouts.app')

@section('title', 'Speakers Management')

@section('content-header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>Speakers Management</h1>
  </div>
  <div class="col-sm-6">
    <div class="float-sm-right">
      <a href="{{ route('admin.speakers.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add New Speaker
      </a>
    </div>
  </div>
</div>
@endsection

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">All Speakers</h3>
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
            <th style="width: 60px">Image</th>
            <th>Name</th>
            <th>Designation</th>
            <th>Company</th>
            <th style="width: 60px">Order</th>
            <th style="width: 150px">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($speakers as $speaker)
          <tr>
            <td>
              <img src="{{ $speaker->image_url }}" alt="{{ $speaker->name }}" class="img-thumbnail"
                style="width: 50px; height: 50px; object-fit: cover;">
            </td>
            <td>{{ $speaker->name }}</td>
            <td>{{ $speaker->designation }}</td>
            <td>{{ $speaker->company }}</td>
            <td class="text-center">{{ $speaker->order }}</td>
            <td class="text-center">
              <a href="{{ route('admin.speakers.edit', $speaker) }}" class="btn btn-sm btn-info" title="Edit">
                <i class="fas fa-edit"></i>
              </a>
              <form action="{{ route('admin.speakers.destroy', $speaker) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger"
                  onclick="return confirm('Are you sure you want to delete this speaker?')" title="Delete">
                  <i class="fas fa-trash"></i>
                </button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="6" class="text-center">No speakers found.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

@push('styles')
<style>
  .table td,
  .table th {
    vertical-align: middle;
  }
</style>
@endpush
