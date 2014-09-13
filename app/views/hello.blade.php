@extends('layouts.master')
@section('head')
  @parent
  <title>HOME ::  TTC Monitoring and Evaluation System</title>
@endsection

@section('content')
  <h2>Home Page</h2>
  @if(Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
  @elseif (Session::has('fail'))
    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
  @endif
@endsection
