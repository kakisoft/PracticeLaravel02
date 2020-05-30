@extends('layouts.default')

@section('title', 'Blog Posts')

@section('content')

@if (session('special_message'))
  <div>
    {{ session('special_message') }}
  </div>
@endif

<div style="text-align: center;">
    <h2>The Winners</h2>
    <h3>Let's share your winning</h3>

    <div class="social-button-item">
        <a
            href="https://twitter.com/share"
            class="twitter-share-button"
            data-url="http://example.com/"
            data-text="I did it!">Tweet
        </a>
    </div>
    </div>
<hr>




@endsection