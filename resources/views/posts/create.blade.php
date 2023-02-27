@extends('layouts.app')

@section('title', 'Create the Post')

@section('content')
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value=" {{ old('title') }}">
        </div>
        @error('title')
        <div>{{ $message }}</div>
        @enderror
        <div>
            <label for="content">Content:</label>
            <textarea name="content" id="content">{{ old('content') }}</textarea>
        </div>
        @error('content')
        <div>{{ $message }}</div>
        @enderror
        @if($errors->any())
            <div>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div>
            <input type="submit" value="Create">
        </div>
    </form>
@endsection
