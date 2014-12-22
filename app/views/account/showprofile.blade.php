@extends('layout.main')

@section('content')
Your name is {{Auth::user()->username }} <br>
Your email is {{Auth::user()->email }}
@stop

