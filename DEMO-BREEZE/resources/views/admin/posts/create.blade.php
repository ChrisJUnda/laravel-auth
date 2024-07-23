@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12  p-3">
                <h1>
                    Crea un nuovo post
                </h1>
                <a class="btn btn-light" href="{{ route('admin.posts.index') }}">
                    Torna alla lista dei progetti
                </a>
            </div>

            @include('shared.error')

            <div class="col-12 p-3">
                <form action="{{ route('admin.posts.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="post-title" class="form-label">Titolo</label>
                        <input type="text" class="form-control" id="post-title" placeholder="Inserisci il titolo"
                            name="title">
                    </div>
                    <div class="mb-3">
                        <label for="post-content" class="form-label">Descrizione</label>
                        <textarea class="form-control" id="post-content" rows="5" name="content"></textarea>
                    </div>
                    <button class="btn btn-primary">
                        Crea nuovo progetto
                    </button>

                </form>



            </div>
        </div>
    </div>
@endsection
