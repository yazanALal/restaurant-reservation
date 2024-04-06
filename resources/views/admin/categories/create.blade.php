<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

  
<div class="py-12 h-screen">
   
    <div class="flex flex-col items-center justify-center ">
        <a href="{{ route('admin.categories.index') }}" class="mb-6 bg-gradient-to-r from-blue-500 to-indigo-500 hover:from-blue-400 hover:to-indigo-400 text-white px-6 py-3 rounded-md text-sm font-medium">Back to Categories</a>
        <form enctype="multipart/form-data" class="space-y-6 bg-gray-800 p-8 rounded-lg shadow-lg" style="width: 500px;" method="POST" action="{{route('admin.categories.store')}}">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-300">Name</label>
                <div class="mt-1">
                    <input type="text" id="name"  name="name" class="block w-full bg-gray-700 border-gray-500 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm py-2 px-3 text-sm text-gray-100" />
                    @error('name')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div>
                <label for="image" class="block text-sm font-medium text-gray-300"> Image</label>
                <div class="mt-1">
                    <input type="file" id="image"  name="image"  class="block w-full bg-gray-700 border-gray-500 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm py-2 px-3 text-sm text-gray-100" />
                     @error('image')
                        <span class="text-red-500">{{ $message }}</span>
                     @enderror
                </div>
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-gray-300">Description</label>
                <div class="mt-1">
                    <textarea id="description"  name='description'
                     rows="3"  class="block w-full bg-gray-700 border-gray-500 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm py-2 px-3 text-sm text-gray-100"></textarea>
                     @error('description')
                        <span class="text-red-500">{{ $message }}</span>
                     @enderror
                </div>
            </div>
            <div>
                <button type="submit" class="bg-gradient-to-r from-blue-500 to-indigo-500 hover:from-blue-400 hover:to-indigo-400 text-white px-6 py-3 rounded-md text-sm font-medium">Submit</button>
            </div>
        </form>
    </div>
</div>
</div>
</x-admin-layout>
