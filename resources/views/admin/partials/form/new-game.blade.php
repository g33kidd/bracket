<div class="card">
  <div class="card-header">Add New Game</div>
  <div class="card-block">

    <form action="{{ route('admin.games.store') }}" method="POST">
      {{ csrf_field() }}

      <div class="form-group row {{ $errors->has('name') ? 'has-danger' : '' }}">
        <label for="name" class="col-sm-3 form-control-label">Name</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="name" name="name" placeholder="Rocket League" value="{{ old('name') }}">
          @if ($errors->has('name'))
            <span class="text-muted">
              <strong>{{ $errors->first('name') }}</strong>
            </span>
          @endif
        </div>
      </div>

      <div class="form-group row {{ $errors->has('short_name') ? 'has-danger' : '' }}">
        <label for="short_name" class="col-sm-3 form-control-label">Short Name</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="short_name" name="short_name" placeholder="RL" value="{{ old('short_name') }}">
          @if ($errors->has('short_name'))
            <span class="text-muted">
              <strong>{{ $errors->first('short_name') }}</strong>
            </span>
          @endif
        </div>
      </div>

      <div class="form-group row {{ $errors->has('slug') ? 'has-danger' : '' }}">
        <label for="slug" class="col-sm-3 form-control-label">URL Slug</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="slug" id="slug" placeholder="rocketleague" value="{{ old('slug') }}">
          @if ($errors->has('slug'))
            <span class="text-muted">
              <strong>{{ $errors->first('slug') }}</strong>
            </span>
          @endif
        </div>
      </div>

      <div class="form-group row {{ $errors->has('platforms') ? 'has-danger' : '' }}">
        <label class="col-sm-3 form-control-label">Consoles</label>
        <div class="col-sm-9">
          @foreach(App\Platform::all() as $platform)
          <div class="checkbox">
            <label>
              <input type="checkbox" name="platforms[]" value="{{ $platform->id }}">
              {{ $platform->name }}
            </label>
          </div>
          @endforeach

          @if ($errors->has('platforms'))
            <span class="text-muted">
              <strong>{{ $errors->first('platforms') }}</strong>
            </span>
          @endif
        </div>
      </div>

      <div class="form-group row">
        <div class="col-sm-offset-3 col-sm-9">
          <button type="submit" class="btn btn-secondary">Add This Game</button>
        </div>
      </div>

    </form>

  </div>
</div>
