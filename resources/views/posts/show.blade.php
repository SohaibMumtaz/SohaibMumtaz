{{-- <x-layout> 
  <article>
    <h1>
     
        {{$post->title}}
      
    </h1>
    <p>
      By<a href="/authors/{{$post->author->username}}"> {{$post->author->name}} </a> in
      <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
    </p>
    <p>
      {{$post->body}}
    </p>
  </article>
  <a href="\">Go Back</a>
</x-layout> --}}
<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <img src="{{asset("storage/".$post->thumbnail)}}" alt="" class="rounded-xl">

                    <p class="mt-4 block text-gray-400 text-xs">
                        Published <time>{{$post->created_at->diffForHumans()}}</time>
                    </p>

                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        <img src="/images//lary-avatar.svg" alt="Lary avatar">
                        <div class="ml-3 text-left">
                            <h5 class="font-bold"><a href="/?author={{$post->author->username}}">{{$post->author->name}}</a></h5>
                        </div>
                    </div>
                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/"
                            class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                        d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            Back to Posts
                        </a>

                        <div class="space-x-2">
                          <x-category-label :category='$post->category' />
                        </div>
                    </div>

                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                       {{$post->title}}
                    </h1>

                    <div class="space-y-4 lg:text-lg leading-loose">
                       {{$post->body}}
                    </div>
                </div>
                <div class="col-span-8 col-start-5">
                    @if (auth()->check())
                     <x-comment-add :post='$post'></x-comment-add>
                    @else
                    <p class="mb-7">
                     Please <a class="font-bold text-blue-500" href="/register">Join</a> or <a class="font-bold text-blue-500" href="/login">Login</a> to post a comment.
                    </p>
                    @endif
                   
                    @foreach ($post->comments as $comment)
                        <x-comment-box :comment='$comment'></x-comment-box>
                    @endforeach
                </div>
            </article>
        </main>
    </section>
</x-layout>
      
    
   
