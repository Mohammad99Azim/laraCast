@extends('./components/layout')
@section('content')
    @include('_post-header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <x-main-post-card/>

        <div class="lg:grid lg:grid-cols-2">
            <x-post-card/>
            <x-post-card/>
        </div>

        <div class="lg:grid lg:grid-cols-3">

            <x-post-card/>
            <x-post-card/>
            <x-post-card/>
        </div>
    </main>



@endsection



























{{--

@extends('./components/layout')
@section('content')
    <article>
        @foreach ($allPosts as $post)
            <article>
                <a href="/post/{{ $post->slug }}">
                    <h1> {{ $post->title }} </h1>
                </a>
                By <a href="/author/{{ $post->author->username }}"> {{ $post->author->name }} </a> in<a
                    href="/categories/{{ $post->category->slug }}"> {{ $post->category->name }}</a>
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
        @endforeach
@endsection --}}
