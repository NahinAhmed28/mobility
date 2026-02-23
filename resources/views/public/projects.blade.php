@extends('layouts.public')

@section('content')
  <h1>Project Experience</h1>
  @foreach($projects as $cat)
    <div class="mb-4">
      <h3>{{ $cat->name }}</h3>
      <ul>
        @foreach($cat->projects as $p)
          <li>
            <strong>{{ $p->title }}</strong>
            @if($p->location) — <small>{{ $p->location }}</small>@endif
          </li>
        @endforeach
      </ul>
    </div>
  @endforeach
@endsection
