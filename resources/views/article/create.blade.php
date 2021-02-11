@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>New Blog</h3></div>
                <div class="card-body">
                    <form action="{{ route('article.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <h5>Title :</h5>
                            <input id="title" type="text" class="form-control"  name="title" placeholder="Input blog title" required>
                        </div>
                        <div class="form-group">
                            <h5>Category :</h5>
                            <select name="category_id" id="category" class="form-control">
                                <option disabled selected>Please select a category</option>
                                @foreach ($cat as $c)
                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <h5>Photo :</h5>
                            <input type="file" required class="form-control" name="image" id="image">
                        </div>
                        <div class="form-group">
                            <h5>Story :</h5>
                            <textarea class="form-control" rows="4" cols="50" name="description" title="description" placeholder="Input your article" required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-plus-square pr-2"></i><span>Create</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection