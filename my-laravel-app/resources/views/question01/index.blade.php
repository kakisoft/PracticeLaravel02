@extends('layouts.default')

@section('title', 'Blog Posts')

@section('content')
{{ $special_message }}
<div style="text-align: center;">

  <h2>Please call my APIs.</h2>

  <div>
    call/me
  </div>

  <br>

  <div>
    clue: RESTful
  </div>

<hr>
  <div>
    The Winners ( {{$number_of_cleared_users}} )
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
    All winners ( {{$number_of_cleared_users}} )
  </div>
<div>
@endsection