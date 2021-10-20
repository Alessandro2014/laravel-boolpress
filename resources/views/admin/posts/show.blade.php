@extends('layouts.app')

@section('content')
    <section class="container">
        <div class="card" style="width: 18rem;">
            <img src="{{ $post->image }}" class="card-img-top" alt="{{ $post->title }}">
            <div class="card-body">
                <h3 class="card-title">{{ $post->title }}</h3>
                <p class="card-text">{{ $post->content }}</p>
                <a href="#" class="btn btn-primary">Modifica</a>
            </div>
        </div>
    </section>


@endsection
