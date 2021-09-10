<x-layout>
   
    <div class="w-3/6 mx-auto my-10">
        <form class="bg-gray-100 shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
              Title
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="title" id="title" type="text" placeholder="Title"
            value="{{old('title')}}">
            @error('title')
            <p class="text-red-500 text-xs italic mt-1">{{$message}}</p>
            @enderror
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="slug">
              Slug
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="slug" id="slug" type="text" placeholder="Slug"
            value="{{old('slug')}}">
            @error('slug')
            <p class="text-red-500 text-xs italic mt-1">{{$message}}</p>
            @enderror
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="excerpt">
              Excerpt
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="excerpt" id="excerpt" type="text" placeholder="Excerpt" value="{{old('excerpt')}}">
            @error('excerpt')
            <p class="text-red-500 text-xs italic mt-1">{{$message}}</p>
            @enderror
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="thumbnail">
              Thumbnail
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="thumbnail" id="thumbnail" type="file"/>
            @error('thumbnail')
            <p class="text-red-500 text-xs italic mt-1">{{$message}}</p>
            @enderror
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="body">
              Body
            </label>
            <textarea name="body" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="body" rows="20">{{old('body')}}</textarea>
            @error('body')
            <p class="text-red-500 text-xs italic mt-1">{{$message}}</p>
            @enderror
          </div>
          <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="category">
              Category
            </label>
            <select name="category_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="category">
                <option value="" >--Please Select a Category--</option>
                @foreach ($category::get() as $category)
                 <option value="{{$category->id}}" {{old('category_id')==$category->id ? 'selected': ''}}>{{$category->name}}</option>
                @endforeach
            </select>
            @error('category_id')
            <p class="text-red-500 text-xs italic mt-1">{{$message}}</p>
            @enderror
           </div>
          <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
              Add Post
            </button>
           </div>
        </form>
       
      </div>

</x-layout>