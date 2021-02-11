@extends('layouts.app')

@section('content')
<div class="container">
    @if (Auth::check())
        <h1 class="pb-3">Welcome {{ auth()->user()->name }}</h1>
    @endif
    <div class="row">
        @foreach ($articles as $a)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img class="card-img-top w-100" src="{{ Storage::url($a->image) }}" style="height: 200px">
                    <div class="card-body">
                        <h5 class="card-title">{{ $a->title }}</h5>
                        <p class="card-text hidetext">{{ $a->description }}</p>
                        <span><a href="{{ route('article.detail', $a->id) }}">see more</a></span>
                        <p>
                            Category: <a href="{{ route('article.perCat', $a->category_id) }}"> {{$cat->where('id', $a->category_id)->first()->name}} </a>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
