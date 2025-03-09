@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Add New Speaker</h3>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.speakers.store') }}" method="POST" enctype="multipart/form-data">
            @include('admin.speakers.form')
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
