@extends('layouts.admin')

@section('content')
<a v-link="{ path: '/games' }">Games Test</a>
<router-view></router-view>
@endsection