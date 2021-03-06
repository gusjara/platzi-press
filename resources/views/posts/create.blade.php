@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Create a New Article
                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary float-right">Back</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <h4>Notification! Some fields have errors...</h4>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form
                        action="{{ route('posts.store') }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >
                        <div class="form-group">
                            <label for="">Title *</label>
                            <input type="text" name="title" class="form-control" required value="{{old('title')}}">
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="image">
                        </div>
                        <div class="form-group">
                            <label for="">Content *</label>
                            <textarea name="body" id="body" class="form-control" required value="{{old('body')}}"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Embebed Content</label>
                            <textarea name="iframe" id="iframe" class="form-control" value="{{old('iframe')}}"></textarea>
                        </div>
                        <div class="form-group">
                            @csrf
                            <input type="submit" value="Save" class="btn btn-sm btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
