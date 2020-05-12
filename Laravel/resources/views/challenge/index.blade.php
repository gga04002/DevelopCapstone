@extends('top_nav')

@section('main')
<div>
  @foreach($challenges as $challenge)
  <div class="challenge-box" id="challenge_{{$challenge->id}}">
    <h1 class="challenge-name">{{$challenge->name}}</h1>
    <form action="/challenge/{{$challenge->id}}" method="get">
      <button class="entry-btn">참가하기</button>
    </form>
  </div>
  @endforeach
</div>
@endsection