<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

  @if (session('warning'))
        <div class="alert alert-warning" role="alert" id="message">
            {{ session('warning') }}
        </div>
    @endif
<div class="py-12 h-screen">
    <div class="flex flex-col items-center justify-center ">
        <a href="{{ route('admin.reservations.index') }}" class="mb-6 bg-gradient-to-r from-blue-500 to-indigo-500 hover:from-blue-400  hover:to-indigo-400 text-white px-6 py-3 rounded-md text-sm font-medium">Back to Reservations</a>
        <form  method="POST" action="{{route('admin.reservations.update',$reservation->id)}}" class="space-y-6 bg-gray-800 p-8 rounded-lg shadow-lg" style="width: 500px;">
           @csrf
           @method('PUT')
            <div>
                <label for="first_name" class="block  text-sm font-medium text-gray-300">First Name</label>
                <div class="mt-1">
                    <input type="text" id="first_name"  value="{{$reservation->first_name}}" name="first_name" class="block w-full bg-gray-700 border-gray-500 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm py-2 px-3 text-sm text-gray-100" />
                    @error('first_name')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div>
                <label for="last_name" class="block  text-sm font-medium text-gray-300">Last Name</label>
                <div class="mt-1">
                    <input type="text" id="last_name" value="{{$reservation->last_name}}" name="last_name" class="block w-full bg-gray-700 border-gray-500 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm py-2 px-3 text-sm text-gray-100" />
                    @error('last_name')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div>
                <label for="email" class="block  text-sm font-medium text-gray-300">Email</label>
                <div class="mt-1">
                    <input type="text" id="email" value="{{$reservation->email}}" name="email" class="block w-full bg-gray-700 border-gray-500 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm py-2 px-3 text-sm text-gray-100" />
                    @error('email')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div>
                <label for="phone" class="block  text-sm font-medium text-gray-300">Phone</label>
                <div class="mt-1">
                    <input type="text" id="phone" value="{{$reservation->phone}}"  name="phone" class="block w-full bg-gray-700 border-gray-500 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm py-2 px-3 text-sm text-gray-100" />
                    @error('phone')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div>
                <label for="res_date" class="block  text-sm font-medium text-gray-300">Reservations Date</label>
                <div class="mt-1">
                    <input type="datetime-local" id="res_date" value="{{$reservation->res_date}}" name="res_date" class="block w-full bg-gray-700 border-gray-500 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm py-2 px-3 text-sm text-gray-100" />
                    @error('res_date')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div>
                <label for="guest_number" class="block  text-sm font-medium text-gray-300">Guest Number</label>
                <div class="mt-1">
                    <input type="text" id="guest_number" value="{{$reservation->guest_number}}"  name="guest_number" class="block w-full bg-gray-700 border-gray-500 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm py-2 px-3 text-sm text-gray-100" />
                    @error('guest_number')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div>
                <label for="table_id" class="block text-sm font-medium text-gray-300">Table</label>
                <div class="mt-1"> 
                    <select id="table_id"  name="table_id" class="block w-full bg-gray-700 border-gray-500 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm py-2 px-3 text-sm text-gray-100">
                            @foreach ($tables as $table)
                                <option value="{{$table->id}}" @selected($table->id==$reservation->table_id)>{{$table->name}}-({{$table->guest_number}} Guest)</option>
                            @endforeach
                    </select>
                    @error('table_id')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
                <button type="submit" class="bg-gradient-to-r from-blue-500 to-indigo-500 hover:from-blue-400 hover:to-indigo-400 text-white px-6 py-3 rounded-md text-sm font-medium">Submit</button>
            </div>
        </form>
    </div>
</div>
<style>
    .alert-warning {
        color: #000000;
        background-color: #eee995;
        border-color: #e4e6c3;
        padding: .75rem 1.25rem;
        margin-bottom: 1rem;
        border: 1px solid transparent;
        border-radius: .25rem;
        }
</style>
</x-admin-layout>
