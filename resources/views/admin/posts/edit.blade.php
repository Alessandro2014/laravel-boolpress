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
                    value="{{ old('title', $post->title) }}">
                @error('title')
                    <div class="invalid-feedback">
                        Inserisci un titolo valido
                    </div>
                @enderror
            </div>
            <div class="col-md-8  mb-4">
                <label for="image" class="form-label">Link immagine</label>
                <input type="text" class="form-control" id="image" name="image" value="{{ old('image', $post->image) }}">
            </div>
            <div class="col-md-12  mb-4">
                <label for="content" class="form-label">Descrizione</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="3"
                    value="">{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <div class="invalid-feedback">
                        Inserisci una descrizione di almeno 20 lettere
                    </div>
                @enderror
            </div>
            <div class="col-md-3 form-group">
                <label for="category_id">Seleziona una categoria</label>
                <select class="form-control" id="category_id" name="category_id">
                    <option value="">Nessuna categoria</option>
                    {{-- CICLO PER STAMPA CATEGORIA --}}
                    @foreach ($categories as $category)
                        <option @if ($post->category_id == $category->id) selected  @endif value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-8 offset-md-1">
                <h4>Tags</h4>
                {{-- CICLO PER STAMPA TAGS --}}
                @foreach ($tags as $tag)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="tag-{{ $tag->id }}"
                            value="{{ $tag->id }}" name="tags[]" @if (in_array($tag->id, old('tags', $tag_ids ?? []))) checked @endif>
                        <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                    </div>
                @endforeach
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-secondary">Conferma Modifica</button>
            </div>
        </form>
    </div>

@endsection
