@extends('admin.layouts.app')

@section('title', 'Add New Agenda - ' . $eventDay->title)

@push('styles')
<link rel="stylesheet" href="{{ asset('css/lib/tinymce.min.css') }}">
@endpush

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Add New Agenda for {{ $eventDay->title }}</h3>
          <div class="card-tools">
            <a href="{{ route('admin.event-days.agendas.index', $eventDay) }}" class="btn btn-default">
              <i class="fas fa-arrow-left"></i> Back to Agendas
            </a>
          </div>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.event-days.agendas.store', $eventDay) }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="start_time">Start Time <span class="text-danger">*</span></label>
                  <input type="time" name="start_time" id="start_time"
                    class="form-control @error('start_time') is-invalid @enderror" value="{{ old('start_time') }}"
                    required>
                  @error('start_time')
                  <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="end_time">End Time <span class="text-danger">*</span></label>
                  <input type="time" name="end_time" id="end_time"
                    class="form-control @error('end_time') is-invalid @enderror" value="{{ old('end_time') }}" required>
                  @error('end_time')
                  <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="title">Title <span class="text-danger">*</span></label>
              <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                value="{{ old('title') }}" required>
              @error('title')
              <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label for="description">Description</label>
              <textarea name="description" id="description" rows="6"
                class="form-control tinymce @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
              @error('description')
              <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="venue">Venue</label>
                  <input type="text" name="venue" id="venue" class="form-control @error('venue') is-invalid @enderror"
                    value="{{ old('venue') }}">
                  @error('venue')
                  <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="track">Track</label>
                  <input type="text" name="track" id="track" class="form-control @error('track') is-invalid @enderror"
                    value="{{ old('track') }}">
                  @error('track')
                  <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Speakers</label>
              <div class="speakers-container">
                <div class="speaker-row mb-3">
                  <div class="row">
                    <div class="col-md-6">
                      <select name="speakers[]" class="form-control">
                        <option value="">Select Speaker</option>
                        @foreach($speakers as $speaker)
                        <option value="{{ $speaker->id }}">{{ $speaker->name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-md-5">
                      <input type="text" name="speaker_roles[]" class="form-control"
                        placeholder="Role (e.g., Moderator, Speaker)">
                    </div>
                    <div class="col-md-1">
                      <button type="button" class="btn btn-danger btn-sm remove-speaker" style="display: none;">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <button type="button" class="btn btn-secondary btn-sm mt-2" id="add-speaker">
                <i class="fas fa-plus"></i> Add Another Speaker
              </button>
            </div>

            <div class="form-group mt-4">
              <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Save Agenda
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script src="{{ asset('js/lib/tinymce/tinymce.min.js') }}"></script>
<script>
  $(document).ready(function() {
    // TinyMCE initialization
    tinymce.init({
      selector: '.tinymce',
      height: 300,
      menubar: false,
      plugins: [
        'advlist', 'lists', 'charmap', 'preview',
        'searchreplace', 'wordcount'
      ],
      toolbar: 'undo redo | ' +
        'bold italic | bullist numlist | ' +
        'removeformat',
      content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; }',
      formats: {
        removeformat: [
          {
            selector: '*',
            remove: 'all',
            split: true,
            expand: false,
            block_expand: true,
            deep: true
          }
        ]
      },
      paste_as_text: true,
      browser_spellcheck: true,
      convert_urls: false
    });

    // Existing speaker management code
    const speakersContainer = $('.speakers-container');
    const addSpeakerBtn = $('#add-speaker');

    function updateRemoveButtons() {
      const rows = $('.speaker-row');
      if (rows.length > 1) {
        $('.remove-speaker').show();
      } else {
        $('.remove-speaker').hide();
      }
    }

    addSpeakerBtn.click(function() {
      const newRow = $('.speaker-row').first().clone();
      newRow.find('select').val('');
      newRow.find('input').val('');
      speakersContainer.append(newRow);
      updateRemoveButtons();
    });

    speakersContainer.on('click', '.remove-speaker', function() {
      $(this).closest('.speaker-row').remove();
      updateRemoveButtons();
    });
  });
</script>
@endpush
@endsection
