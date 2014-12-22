@extends('layout.main')

@section('content')
{{Form::open(array('method'=>'post',
                'action' => 'AccountController@postCreate',
                'class'=>'pure-form-stacked')) }}
<div>User Name
    {{Form::text('username');}}
    @if($errors->has('username'))
    {{$errors->first('username')}}
    @endif
</div>
<div>Email
    {{Form::text('email');}}  
    @if($errors->has('username'))
    {{$errors->first('username')}}
    @endif
</div>
<div>Password
    {{Form::password('password');}} 
    @if($errors->has('password'))
    {{$errors->first('password')}}
    @endif
</div>
<div>Confirm Password
    {{Form::password('password_confirm');}}  
    @if($errors->has('password_confirm'))
    {{$errors->first('password_confirm')}}
    @endif
</div>
<br>
<div>
    {{Form::submit('Create Account');}}    
</div>
{{Form::token()}}
{{Form::open() }}
@stop