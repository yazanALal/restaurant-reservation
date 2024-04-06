<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

  
<div class="py-10 h-screen">
   
    <div class="flex flex-col items-center justify-center ">
        <a href="{{ route('admin.menus.index') }}" class="mb-6 bg-gradient-to-r from-blue-500 to-indigo-500 hover:from-blue-400 hover:to-indigo-400 text-white px-6 py-3 rounded-md text-sm font-medium">Back to Menus</a>
        <form enctype="multipart/form-data" method="POST" action="{{route('admin.menus.update',$menu->id)}}" class="space-y-6 bg-gray-800 p-8 rounded-lg shadow-lg" style="width: 500px;">
           @csrf
           @method("PUT")
            <div>
                <label for="name" class="block text-sm font-medium text-gray-300">Name</label>
                <div class="mt-1">
                    <input type="text" id="name"  name="name" value="{{$menu->name}}" class="block w-full bg-gray-700 border-gray-500 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm py-2 px-3 text-sm text-gray-100" />
                    @error('name')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div>
                <label for="image" class="block text-sm font-medium text-gray-300">Image</label>
                <div class="mt-1">
                    <img src="{{Storage::url($menu->image)}}" alt="" class="w-16 h-16 rounded">
                    <input type="file" id="image"  name="image"  class="block w-full bg-gray-700 border-gray-500 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm py-2 px-3 text-sm text-gray-100" />
                    @error('image')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-gray-300">Description</label>
                <div class="mt-1">
                    <textarea id="description" rows="3"  name="description"  class="block w-full bg-gray-700 border-gray-500 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm py-2 px-3 text-sm text-gray-100">{{$menu->description}}</textarea>
                    @error('description')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div>
                <label for="price" class="block text-sm font-medium text-gray-300">Price</label>
                <div class="mt-1">
                    <input type="text" id="price"  name="price" value="{{$menu->price}}" class="block w-full bg-gray-700 border-gray-500 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm py-2 px-3 text-sm text-gray-100" />
                    @error('price')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
             <div>
                <label for="categories" class="block text-sm font-medium text-gray-300">Categories</label>
                <div class="mt-1">
                    <select multiple id="categories" name="categories[]" class="block w-full bg-gray-700 border-gray-500 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm py-2 px-3 text-sm text-gray-100 select2">
                        @foreach ($categories as $category) 
                            <option value="{{$category->id}}" @selected($menu->categories->contains($category))>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <button type="submit" class="bg-gradient-to-r from-blue-500 to-indigo-500 hover:from-blue-400 hover:to-indigo-400 text-white px-6 py-3 rounded-md text-sm font-medium">Submit</button>
            </div>
        </form>
    </div>
</div>
</div>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<style>
   
    .select2-container--default .select2-selection--multiple {
        border-color: #4a5568 !important;
        background-color: #4a5568 !important;
        color: #fff !important;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__rendered {
        color: #fff !important;
        background-color: #4a5568 !important;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #4a5568 !important;
        border-color: #4a5568 !important;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        color: #fff !important;
    }
   
    .select2-container--default .select2-selection--multiple .select2-selection__arrow {
        border-color: #4a5568 transparent transparent !important;
    }
</style>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
</x-admin-layout>
