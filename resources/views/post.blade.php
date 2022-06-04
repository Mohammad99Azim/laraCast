@extends('layout')
@section('content')
    <article>

        <h1> {{ $content->title }} </h1>
        <a href="/categories/{{$content->category->slug}}"> {{$content->category->name}}</a>
        <p>
            {{ $content->body }}
        </p>
    </article>
@endsection


