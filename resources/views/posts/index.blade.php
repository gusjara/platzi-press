@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Routines <a class="btn btn-sm btn-primary float-right" href="{{ route('posts.create') }}">Create</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>Title</th>
                            <th colspan="2">&nbsp;</th>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->id}}</td>
                                <td>{{ $post->title}}</td>
                                <td>
                                    <a class="btn btn-sm btn-secondary" href="{{ route('posts.edit', $post) }}">
                                        Edit
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input  
                                            type="submit"
                                            class="btn btn-sm btn-danger" 
                                            value="Delete"
                                            onclick="return confirm('Are you sure you want to delete?')" 
                                        >
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
