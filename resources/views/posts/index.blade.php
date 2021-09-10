<x-layout>
    @include('posts._header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count())
           <x-post-grid :posts='$posts' />
           {{$posts->links()}}
        @else
            <p>No Posts, come back later....</p>

        @endif
    </main>

    {{-- @foreach($posts as $post)
    <article>
        <h1>
            <a href="/post/{{$post->slug}}">
                {{$post->title}}
            </a>
        </h1>
        <p>
            By<a href="/authors/{{$post->author->username}}"> {{$post->author->name}} </a> in
            <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
        </p>
        <p>
            {{$post->excerpt}}
        </p>
    </article>
    @endforeach --}}

</x-layout>
  