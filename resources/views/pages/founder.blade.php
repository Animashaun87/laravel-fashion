<!-- <!DOCTYPE html>
<html>
<head>
	<title>Founder</title>
</head>
<body>
	<h1><strong><?php echo $role ?> at <?php echo $name ?></strong></h1>
	 <h1><strong>{{$role}} at {{$name}}</strong></h1>  another way of echoing 
	<!-<h1><strong>{!! $role !!} at {!!$name !!}</strong></h1> another way of echoing -->
	{{-- This is a comment --}}

<!-- </body>
</html> --> 

@extends('layouts.master')

@section('title')
Founder
@endsection

@section('heading')
Our Founder
@endsection

@section('content')
<div>
	A {{$role}} at {{$name}}
</div>
@endsection