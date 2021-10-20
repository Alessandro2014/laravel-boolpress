@extends('layouts.app')

@section('content')

    <div class="container">
        {{-- FORM PER MODIFICARE FUMETTO --}}
        <h1 class="text-center mb-3">Modifica Post</h1>
        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" class="row g-3">
            @method('PATCH')
            @csrf
            <div class="col-md-6 mb-4">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ $post->title }}">
                @error('title')
                    <div class="invalid-feedback">
                        Inserisci un titolo valido
                    </div>
                @enderror
            </div>
            <div class="col-md-8  mb-4">
                <label for="image" class="form-label">Link immagine</label>
                <input type="text" class="form-control" id="image" name="image" value="{{ $post->image }}">
            </div>
            <div class="col-md-12  mb-4">
                <label for="content" class="form-label">Descrizione</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content"
                    name="content" rows="3" value="">{{ $post->content }}</textarea>
                @error('content')
                    <div class="invalid-feedback">
                        Inserisci una descrizione di almeno 20 lettere
                    </div>
                @enderror
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-secondary">Conferma Modifica</button>
            </div>
        </form>
    </div>

@endsection
