@extends('layouts.default')

@section('title', 'Blog Posts')

@section('content')
{{ $special_message }}
<div style="text-align: center;">

  <h2>Please call my APIs.</h2>

  <div>
    <p>call/me<p>
  </div>

  <br>

  <div>
    <p>clue: RESTful</p>
  </div>

<hr>
  <div>
    <p>The Winners ( {{$number_of_cleared_users}} )</p>
    <div>
      <table>
        <tr>
          <th>No.</th>
          <th>Date</th>
          <th>Name</th>
          <th>Comment</th>
        </tr>

        @forelse ($recent_cleared_users as $recent_cleared_user)
          <tr>
            <td>{{ $recent_cleared_user->id }}</td>
            <td>{{ $recent_cleared_user->created_at }}</td>
            <td>{{ $recent_cleared_user->name }}</td>
            <td>{{ $recent_cleared_user->comment }}</td>
          </tr>
        @endforeach

      </table>
    </div>
  </div>
  <div>
    <p>All winners ( {{$number_of_cleared_users}} )</p>
  </div>
<div>
@endsection