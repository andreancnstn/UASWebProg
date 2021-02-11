@extends('layouts.app')

@section('content')
<div class="container justify-content-center">
    <a href="{{ route('article.create') }}" class="btn btn-primary mb-4"><i class="fa fa-plus pr-2"></i><span>Create Blog</span></a>
    <table class="table table-hover">
        <caption>{{ auth()->user()->name}}'s blog posts</caption>
        <thead class="thead-dark">
            <tr>
                <th>Title</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach ($user->articles()->paginate(5) as $a)
            <tbody>
                <tr>
                    <td><a href="{{ route('article.detail', $a->id) }}" class="d-flex align-items-center">{{ $a->title }}</a></td>
                    <td>
                        <form action="{{ route('article.delete', $a->id) }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <button class="btn btn-danger"><i class="fa fa-trash pr-2" aria-hidden="true"></i><span>Delete</span></button>
                        </form>
                    </td>
                </tr>
            </tbody>
        @endforeach
    </table>
    <div>
        {{ $art->links() }}
    </div>
</div>
    
@endsection