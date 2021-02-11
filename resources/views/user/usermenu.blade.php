@extends('layouts.app')

@section('content')
    <div class="container justify-content-center">
        <table class="table table-striped table-hover">
            <caption>List of active users</caption>
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach ($users as $user)
                <tbody>
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->phone }}</td>
                        @if(auth()->user()->id != @$user->id)
                        <td>
                            <form action="{{ route('delete_user', $user->id) }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <button class="btn btn-danger"><i class="fa fa-trash pr-2" aria-hidden="true"></i><span>Delete</span></button>
                            </form>
                        </td>
                        @else
                            <td></td>
                        @endif
                    </tr>
                </tbody>
            @endforeach
        </table>
        <div>
            {{ $users->links() }}
        </div>
    </div>
@endsection