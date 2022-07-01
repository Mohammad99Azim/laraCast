@extends('./components/layout')
@section('content')
    @include('_post-header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($allPosts)
            <x-main-post-card :post="$allPosts[0]" />
            @if ($allPosts->count() > 1)
                <x-grid-posts-handle :posts="$allPosts->skip(1)" />
            @endif
            <div class="lg:grid lg:grid-cols-3">

            </div>
        @else
            <p class="text-center">There is No Posts yet </p>
        @endif
    </main>



@endsection
