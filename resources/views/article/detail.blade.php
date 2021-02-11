@extends('layouts.app')

@section('content')
<div class=" container d-flex justify-content-center">
    <div class="col-6 align-middle">
        <h2 class="pb-2">{{ $art->title }}</h2>
        <img src="{{ Storage::url($art->image) }}" class="w-100 pb-4">
        <h5>{{ $art->description }}</h5>
        <a href="{{ url()->previous() }}" class="btn btn-outline-dark"><i class="fas fa-chevron-circle-left pr-2"></i><span>Back</span></a>
    </div>
</div>
@endsection