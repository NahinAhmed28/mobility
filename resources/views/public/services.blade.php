@extends('layouts.public')

@section('content')
  <h1>Services We Offer</h1>
  @foreach($services as $cat)
    <div class="mb-4">
      <h4>{{ $cat->name }}</h4>
      <ul>
        @foreach($cat->items as $item)
          <li>{{ $item->title }}</li>
        @endforeach
      </ul>
    </div>
  @endforeach
@endsection
