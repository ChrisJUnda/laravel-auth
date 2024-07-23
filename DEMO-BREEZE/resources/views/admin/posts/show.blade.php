{{-- @dd($posts) --}}
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center p-3">
                <h1>
                    {{ $post->title }}
                    {{-- ciao --}}
                </h1>
            </div>
            <div class="col-12 p-3">
                <p>
                    {{ $post->content }}
                    {{-- ciao --}}
                </p>
                <hr>
                <a class="btn btn-light" href="{{ route('admin.posts.index') }}">
                    Torna alla lista dei progetti
                </a>


            </div>
        </div>
    </div>
@endsection
