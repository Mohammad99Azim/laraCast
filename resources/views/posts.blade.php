@extends('layout')
@section('content')
    <article>
        @foreach ($allPosts as $post)
            <article>
                <a href="/post/{{ $post->id }}">
                    <h1> {{ $post->title }} </h1>
                </a>
                <a href="/categories/{{$post->category->slug}}"> {{$post->category->name}}</a>
                <p>{{ $post->excerpt }}</p>
            </article>

            @if ($loop->last)
                <hr>
            @endif
        @endforeach

        {{-- @foreach ($allPosts as $post)
            <article>

                {{ $post->matter('title') }}
            </article>
        @endforeach --}}
    @endsection
