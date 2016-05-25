@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">Add New Game</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/games') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Rocket League">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('short_name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Short Name</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="short_name" value="{{ old('short_name') }}" placeholder="RL">

                            @if ($errors->has('short_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('short_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">URL Slug</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="slug" value="{{ old('slug') }}" placeholder="rocket-league">

                            @if ($errors->has('slug'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('slug') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('platform_id') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Platform/Console</label>

                        <div class="col-md-6">
                            <select class="form-control" name="platform_id">
                              @foreach(App\Platform::all() as $platform)
                                <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                              @endforeach
                            </select>

                            @if ($errors->has('platform_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('platform_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
