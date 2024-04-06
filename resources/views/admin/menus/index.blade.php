<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
@if (session('success'))
        <div class="alert alert-success" role="alert" id="message">
            {{ session('success') }}
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
            <div class="flex justify-end m-2 p-2 ">
                <a href="{{ route('admin.menus.create') }}" class="mb-6 bg-gradient-to-r from-blue-500 to-indigo-500 hover:from-blue-400 hover:to-indigo-400 text-white px-6 py-3 rounded-md text-sm font-medium">New Menu</a>
            </div>
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                   name
                </th>
                <th scope="col" class="px-6 py-3">
                    image
                </th>
                <th scope="col" class="px-6 py-3">
                    description
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                                edit
                </th> 
                <th scope="col" class="px-6 py-3">
                    delete
                </th>
            </tr>
        </thead>
        <tbody>
             @foreach ($menus as $menu)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                               {{$menu->name}}
                            </th>
                            <td class="px-6 py-4 " >
                               <img src=" {{Storage::url($menu->image)}}" alt="" class="w-16 h-16 rounded">
                            </td>
                            <td class="px-6 py-4">
                               {{$menu->description}}
                            </td>
                             <td class="px-6 py-4">
                               {{$menu->price}}
                            </td>
                             <td class="px-6 py-4">
                                @foreach ($menu->categories as $category)
                                     {{$category->name}} /
                                @endforeach
                            </td>
                            
                            <td class="px-6 py-4">
                                <a href="{{route('admin.menus.edit',$menu->id)}}" >Edit</a>
                                
                            </td>
                            
                            <td class="px-6 py-4">
                            <form action="{{route('admin.menus.destroy',$menu->id)}}" method="POST" onsubmit="return confirm('Are you sure?')">
                               @csrf 
                               @method('DELETE') 
                                <button type="submit">Delete</button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
        </tbody>
    </table>
</div>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
    .alert-success {
    color: #08591b;
    background-color: #d4edda;
    border-color: #c3e6cb;
    padding: .75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: .25rem;
    }
    </style>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#message').fadeOut('slow');
            }, 2500); 
        });
    </script>
</x-admin-layout>
