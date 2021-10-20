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
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }} </th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->getFormattedDate('created_at', 'H:i d-m-Y') }}</td>
                        <td><a href="{{ route('admin.posts.show', $post->id) }}">Dettaglio</a></td>
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
