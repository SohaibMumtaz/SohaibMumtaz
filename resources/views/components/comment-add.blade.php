<form action="/comment" method="post" class="bg-gray-100 border rounded p-4 mb-8">
    @csrf
    <label for="comment" class="mb-4">Post a comment</label>
    <textarea name="comment" id="comment" class="w-full px-3 py-2 text-sm text-gray-700 border rounded-lg focus:outline-none" rows="4" placeholder="Please leave a comment here...."></textarea>
    @error('comment')
      <p class="text-red-500 text-xs italic mt-1">{{$message}}</p>
    @enderror
    @error('post_id')
      <p class="text-red-500 text-xs italic mt-1">{{$message}}</p>
    @enderror
    @error('user_id')
      <p class="text-red-500 text-xs italic mt-1">{{$message}}</p>
    @enderror
    <input type="hidden" value="{{$post->id}}" name="post_id">
    <input type="hidden" value="{{auth()->user()->id}}" name="user_id">

    <button class="bg-blue-600 mr-0 text-gray-200 rounded hover:bg-blue-500 px-4 py-2 focus:outline-none" type="submit">Post</button>
</form>