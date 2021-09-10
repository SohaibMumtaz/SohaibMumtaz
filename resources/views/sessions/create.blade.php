<x-layout>
    <div class="w-3/6 mx-auto my-10">
        <form class="bg-gray-100 shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST">
          @csrf
          
         
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
              Email
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" id="email" type="text" placeholder="email" value="{{old('email')}}">
            @error('email')
            <p class="text-red-500 text-xs italic mt-1">{{$message}}</p>
            @enderror
          </div>
          <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                Password
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="password" id="password" type="password" placeholder="******************">
                @error('password')
                <p class="text-red-500 text-xs italic mt-1">{{$message}}</p>
                @enderror
           </div>
            
          
          <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
              Log In
            </button>
           </div>
        </form>
       
      </div>

</x-layout>