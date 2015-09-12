<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">
  <label for="name">Name</label>
  <input type="name" class="form-control" id="name" placeholder="{{ $user->name }}" name="name" disabled>
</div>
<div class="form-group">
  <label for="email">Email address</label>
  <input type="email" class="form-control" id="email" placeholder="{{ $user->email }}" name="email" disabled>
</div>
<div class="form-group">
  <label for="roles">Roles</label>
  <select name="roles[]" multiple class="form-control">
    @foreach($roles as $index => $role)
      <option value="{{ $index }}" {{ ($user->roles->contains('id', $index)) ? 'selected' : '' }}>{{ $role }}</option>
    @endforeach
  </select>
</div>
