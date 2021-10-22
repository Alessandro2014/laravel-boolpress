@extends('layouts.app')

@section('content')

    {{-- TABELLA POSTS --}}
    <div class="container">
        <h1 class="text-center mb-5">I miei post</h1>
        @if (session('message'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </symbol>
                    </svg>
                    Il post {{ session('message') }} è stato eliminato!
                </div>
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Scritto il</th>
                    <th scope="col">Categoria</th>
                    <th scope="col" class="">Opzioni</th>
                </tr>
            </thead>
            <tbody>
                {{-- CICLO FOR E STAMPA DETTAGLIO POST --}}
                @forelse($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }} </th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->getFormattedDate('created_at', 'H:i d-m-Y') }}</td>
                        <td>
                        @if ($post->category) {{ $post->category->name }} @else -
                        </td>
                @endif
                <td class="">
                    <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-info p-2">Dettaglio</a>
                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-secondary p-2">Modifica</a>
                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="d-inline delete-form"
                        data-post="{{ $post->title }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Elimina</button>
                    </form>
                </td>
                </tr>
            @empty
                <tr>
                    <th colspan="3" class="text-center">Non ci sono post</th>
                </tr>
                @endforelse
            </tbody>
        </table>
        <hr>
        {{-- PAGINAZIONE --}}
        {{ $posts->links() }}
        {{-- FOOTER CON RAGGRUPPAMENTO PER CATEGORIA --}}
        <footer class="mt-4">
            <div class="container">
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-3">
                            <h3>{{ $category->name }}</h3>
                            @forelse($category->posts as $post)
                                <h6> <a href="{{ route('admin.posts.show', $post->id) }}">{{ $post->title }}</a></h6>
                            @empty Nessun post per questa categoria
                            @endforelse
                        </div>
                    @endforeach
                </div>

            </div>
        </footer>
    </div>
@endsection
