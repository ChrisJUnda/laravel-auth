{{-- @dd($posts) --}}
@extends('layouts.app')
@section('content')
    <div class="container text-center">
        <div class="row">
            <div class="col-12   p-3">
                <div class="card" style="width: 50rem;">
                    @if ($post->cover_image)
                        <div>
                            <img class="w-100 card-img-top" src="{{ asset('storage/' . $post->cover_image) }}">
                        </div>
                    @endif
                    {{-- <img src="..." class="" alt="..."> --}}
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->content }}</p>
                        <a class="btn btn-primary" href="{{ route('admin.posts.index') }}">
                            Torna alla lista dei progetti
                        </a>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
