{{-- @dd($posts) --}}
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center p-3">
                <h1>
                    Lista dei lavori
                </h1>
                <div>
                    <a class="btn btn-primary" as="button" href="{{ route('admin.posts.create') }}">
                        Crea
                    </a>
                    {{-- <button class="btn btn-primary">
                        Crea Nuovo
                    </button> --}}
                </div>

            </div>
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="col-12 p-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="col">#</th>
                            <th scope="col" class="col-7">Title</th>
                            <th scope="col" class="col">slug</th>
                            <th scope="col" class="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <th scope="row">
                                    {{ $post->id }}
                                </th>
                                <td>
                                    @if ($post->cover_image)
                                        image -
                                    @endif
                                    {{ $post->title }}
                                </td>
                                <td>
                                    {{ $post->slug }}
                                </td>
                                <td>
                                    <div class="d-flex gap-2 ">
                                        <a href="{{ route('admin.posts.show', $post) }}" as="button"
                                            class="btn btn-info ">
                                            {{-- <i class="fa-solid fa-magnifying-glass"></i> --}}
                                            <i class="fa-solid fa-magnifying-glass fa-sm"></i>
                                        </a>
                                        <a href="{{ route('admin.posts.edit', $post) }}" as="button"
                                            class="btn btn-warning ">
                                            <i class="fa-solid fa-file-pen fa-sm"></i>
                                        </a>
                                        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger "><i class="fa-solid fa-trash fa-sm"></i></button>

                                        </form>
                                        {{-- <a href="{{ route('admin.posts.destroy', $post) }}" as="button"
                                            class="btn btn-danger ">

                                        </a> --}}
                                    </div>
                                    <div></div>
                                    <div></div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
