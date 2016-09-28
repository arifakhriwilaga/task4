@extends('layouts.layout_login')

@section('content')
<div class="row">
<div class="col-xs-12">
<div class="col-xs-7">
</div>
<div class="col-xs-4">
<div class="well">
<!-- Open form -->

{!! Form::open(['route' => 'sign_up_store']) !!}
<table width="380">
<tr><td colspan="2"><h2><center>Welcome to my blog</center></h2><br></td></tr>
<tr><td>{!! Form::label('username', 'Username') !!}</td>
	<td>
		{!! Form::text('username') !!}
		{!! $errors->first('username') !!}
	</td>
</tr>
<tr><td>{!! Form::label('email', 'Email') !!}</td>
	<td>
		{!! Form::email('email') !!}
		{!! $errors->first('email') !!} 
	</td>
</tr>
<tr><td>{!! Form::label('password', 'Password') !!}</td>
	<td>
	{!! Form::password('password') !!}
	{!! $errors->first('password') !!} 
	</td>
</tr>
<tr><td colspan="2"><center>{!! Form::submit('Sign Up', ['class' => 'btn btn-raised btn-info']) !!}</center></td>
</tr>
</table> 
{!! Form::close() !!}
<!-- end form -->
</div>
</div>
<div class="col-xs-1">
</div>
</div>
</div>
@stop