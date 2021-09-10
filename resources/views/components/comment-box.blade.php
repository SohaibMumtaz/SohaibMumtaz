@props(['comment'])
<div class="bg-gray-100 my-3 p-6 border rounded">
    <div class="flex">
        <div class="w-40 mr-2">
            <img src="https://picsum.photos/id/{{$comment->author->id}}/100/100" alt="">
        </div>
        <div class="w-full">
            <div class="flex justify-between">
             <h5 class="font-bold">{{$comment->author->name}}</h5>
             <p class=" text-sm text-blue-500">{{$comment->created_at->diffForHumans()}}</p>
            </div>
            <p class="text-sm font-thin mt-3">{{$comment->comment}}</p>
        </div>
    </div>
</div>