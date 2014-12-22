@extends('layout.main')

@section('content')
{{Form::open(array('method'=>'post',
                'action' => 'AccountController@postSignIn',
                'class'=>'pure-form-stacked'))}}
<div>
    Email
    {{Form::text('email') }}
    @if($errors->has('email'))
    {{$errors->first('email')}}
    @endif
</div>
<div>
    Password
    {{Form::password('password') }}
    @if($errors->has('password'))
    {{$errors->first('password')}}
    @endif
</div>
<div>
    Remember me
    {{Form::checkbox('remember') }}
</div>
{{Form::submit('Sign In')}}
{{Form::token()}}
{{Form::close()}}
@stop