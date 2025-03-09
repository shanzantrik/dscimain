@csrf

<div class="form-group">
  <label for="name">Name</label>
  <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
    value="{{ old('name', $speaker->name ?? '') }}" required>
  @error('name')
  <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="form-group">
  <label for="designation">Designation</label>
  <input type="text" name="designation" id="designation" class="form-control @error('designation') is-invalid @enderror"
    value="{{ old('designation', $speaker->designation ?? '') }}" required>
  @error('designation')
  <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="form-group">
  <label for="company">Company</label>
  <input type="text" name="company" id="company" class="form-control @error('company') is-invalid @enderror"
    value="{{ old('company', $speaker->company ?? '') }}">
  @error('company')
  <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="form-group">
  <label for="bio">Bio</label>
  <textarea name="bio" id="bio" class="form-control @error('bio') is-invalid @enderror"
    rows="4">{{ old('bio', $speaker->bio ?? '') }}</textarea>
  @error('bio')
  <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="form-group">
  <label for="image">Profile Image</label>
  <div class="custom-file">
    <input type="file" name="image" id="image" class="custom-file-input @error('image') is-invalid @enderror" {{
      isset($speaker) ? '' : 'required' }} accept="image/*">
    <label class="custom-file-label" for="image">Choose file</label>
  </div>
  @error('image')
  <div class="invalid-feedback">{{ $message }}</div>
  @enderror
  @if(isset($speaker) && $speaker->image)
  <div class="mt-2">
    <img src="{{ $speaker->image_url }}" alt="Current Image" class="img-thumbnail" style="height: 100px;">
  </div>
  @endif
</div>

<div class="form-group">
  <label for="order">Display Order</label>
  <input type="number" name="order" id="order" class="form-control @error('order') is-invalid @enderror"
    value="{{ old('order', $speaker->order ?? 0) }}">
  @error('order')
  <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="form-group">
  <button type="submit" class="btn btn-primary">{{ isset($speaker) ? 'Update' : 'Create' }} Speaker</button>
  <a href="{{ route('admin.speakers.index') }}" class="btn btn-secondary">Cancel</a>
</div>

@push('scripts')
<script>
  $(document).ready(function() {
    // Custom file input
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
});
</script>
@endpush
