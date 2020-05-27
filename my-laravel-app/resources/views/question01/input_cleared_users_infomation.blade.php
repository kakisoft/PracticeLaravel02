@extends('layouts.default')

@section('title', 'Blog Posts')

@section('content')

  <div class='page-header'>
    <h2>Wow! You must be a great software engineer!</h2>
    <h2>Please leave your comment.</h2>
  </div>

  <hr>
  Comment can't be blank
  <div class='form-horizontal' role='form'>
    <form method='post' accept-charset='UTF-8' action='{{action('Question01Controller@reflectClearedUserInputData')}}'>
    {{ csrf_field() }}
    {{ method_field('patch') }}

      <input type='hidden' name='user[id]' value='{{ $registration_information->id }}'>
      <div class='form-group'>
        <label for='user_name'>Name</label>
        <input class='form-control' type='text' value="{{ $registration_information->name }}" name='user[name]' id='user_name' />
      </div>
      <br>

      <div class='form-group'><label for='user_comment'>Comment</label>
        <textarea class='form-control' name='user[comment]' id='user_comment'></textarea>
      </div>

      <br>
      <div>
        <input type='submit' name='commit' value='Submit' class='btn btn-success' />
      </div>
    </form>
  </div>
<div>
@endsection