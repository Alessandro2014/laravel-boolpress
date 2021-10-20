@extends('layouts.app')

@section('content')
    <section class="container">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="{{ $post->image }}" alt="{{ $post->title }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->content }}</p>
                        <p class="card-text"><small
                                class="text-muted">{{ $post->getFormattedDate('created_at', 'H:i d-m-Y') }}</small></p>
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-secondary p-2">Modifica</a>
                        <a href="{{ route('admin.posts.index') }}" class="btn btn-light">Indietro</a>

                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
