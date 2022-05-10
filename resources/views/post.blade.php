@extends('layout')
@section('content')
    <article>

        <h1> {{ $content->title }} </h1>

        <p>
            {!!  $content->body !!}
        </p>
    </article>
@endsection


