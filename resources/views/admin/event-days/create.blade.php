@extends('admin.layouts.app')

@section('title', 'Add New Event Day')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Add New Event Day</h3>
          <div class="card-tools">
            <a href="{{ route('admin.event-days.index') }}" class="btn btn-default">
              <i class="fas fa-arrow-left"></i> Back to List
            </a>
          </div>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.event-days.store') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="date">Date <span class="text-danger">*</span></label>
                  <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror"
                    value="{{ old('date') }}" required>
                  @error('date')
                  <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="day_number">Day Number <span class="text-danger">*</span></label>
                  <input type="number" name="day_number" id="day_number"
                    class="form-control @error('day_number') is-invalid @enderror" value="{{ old('day_number') }}"
                    min="1" required>
                  @error('day_number')
                  <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="title">Title <span class="text-danger">*</span></label>
                  <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title') }}" required>
                  @error('title')
                  <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="subtitle">Subtitle</label>
                  <input type="text" name="subtitle" id="subtitle"
                    class="form-control @error('subtitle') is-invalid @enderror" value="{{ old('subtitle') }}">
                  @error('subtitle')
                  <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="color_code">Color Code <span class="text-danger">*</span></label>
              <div class="input-group">
                <input type="color" name="color_code" id="color_code"
                  class="form-control @error('color_code') is-invalid @enderror"
                  value="{{ old('color_code', '#01B380') }}" required>
                <div class="input-group-append">
                  <span class="input-group-text" id="color_code_text">#01B380</span>
                </div>
              </div>
              @error('color_code')
              <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group mt-4">
              <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Save Event Day
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script>
  document.getElementById('color_code').addEventListener('input', function(e) {
        document.getElementById('color_code_text').textContent = e.target.value;
    });
</script>
@endpush
@endsection
