@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{ $cat->name }}</h3>
    <div class="row">
        @foreach ($cat->articles as $a)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img class="card-img-top w-100" src="{{ Storage::url($a->image) }}" style="height: 200px">
                    <div class="card-body">
                        <h5 class="card-title">{{ $a->title }}</h5>
                        <p class="card-text hidetext">{{ $a->description }}</p>
                        <span><a href="{{ route('article.detail', $a->id) }}">see more</a></span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
