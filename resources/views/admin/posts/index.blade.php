@extends('layouts.app')

@section('content')

    {{-- TABELLA POSTS --}}
    <div class="container">
        <h1 class="text-center mb-5">I miei post</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titotlo</th>
                    <th scope="col">Scritto il </th>
                    <th scope="col">Immagine</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                    <tr>
                        <th scope="row">{{ $posts->id }} </th>
                        <td>{{ $posts->title }}</td>
                        <td>{{ $posts->created_at }}</td>
                        <td>{{ $posts->images }}</td>
                        <td><a href="{{ route('admin.posts.show', $posts->id) }}">Dettaglio</a></td>
                    </tr>
                @empty
                    <tr>
                        <th colspan="3" class="text-center">Non ci sono post</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection