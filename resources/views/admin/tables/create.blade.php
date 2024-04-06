<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

  
<div class="py-12 h-screen">
   
    <div class="flex flex-col items-center justify-center ">
        <a href="{{ route('admin.tables.index') }}" class="mb-6 bg-gradient-to-r from-blue-500 to-indigo-500 hover:from-blue-400  hover:to-indigo-400 text-white px-6 py-3 rounded-md text-sm font-medium">Back to Tables</a>
        <form  method="POST" action="{{route('admin.tables.store')}}" class="space-y-6 bg-gray-800 p-8 rounded-lg shadow-lg" style="width: 500px;">
           @csrf
            <div>
                <label for="name" class="block  text-sm font-medium text-gray-300">Name</label>
                <div class="mt-1">
                    <input type="text" id="name"  name="name" class="block w-full bg-gray-700 border-gray-500 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm py-2 px-3 text-sm text-gray-100" />
                    @error('name')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div>
                <label for="guest_number" class="block text-sm font-medium text-gray-300">Guest Number</label>
                <div class="mt-1">
                    <input type="text" id="guest_number" name="guest_number" class="block w-full bg-gray-700 border-gray-500 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm py-2 px-3 text-sm text-gray-100" />
                    @error('guest_number')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div>
                <label for="status" class="block text-sm font-medium text-gray-300">Status</label>
                <div class="mt-1">
                    <select id="status"  name="status" class="block w-full bg-gray-700 border-gray-500 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm py-2 px-3 text-sm text-gray-100">
                        <option disabled selected>Choose a status</option>
                        @foreach (App\Enums\TableStatus::cases() as $status)
                            <option value="{{$status->value}}">{{$status->name}}</option>
                        @endforeach
                    </select>
                    @error('status')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div>
                <label for="location" class="block text-sm font-medium text-gray-300">Location</label>
                <div class="mt-1">
                   
                    <select id="location"  name="location" class="block w-full bg-gray-700 border-gray-500 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm py-2 px-3 text-sm text-gray-100">
                        <option disabled selected>Choose a location</option>
                        @foreach (App\Enums\TableLocation::cases() as $location)
                            <option value="{{$location->value}}">{{$location->name}}</option>
                        @endforeach
                    </select>
                    @error('location')
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

</x-admin-layout>
