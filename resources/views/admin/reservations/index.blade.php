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
                <a href="{{ route('admin.reservations.create') }}" class="mb-6 bg-gradient-to-r from-blue-500 to-indigo-500 hover:from-blue-400 hover:to-indigo-400 text-white px-6 py-3 rounded-md text-sm font-medium">New Reservation</a>
            </div>

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Phone
                </th>
                <th scope="col" class="px-6 py-3">
                    Res_Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Guest number
                </th>
                <th scope="col" class="px-6 py-3">
                   Table
                </th>
                <th scope="col" class="px-6 py-3">
                   Edit
                </th>
                <th scope="col" class="px-6 py-3">
                   Delete
                </th>
            </tr>
        </thead>
        <tbody>
             @foreach ($reservations as $reservation)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                               {{$reservation->first_name}}-{{$reservation->last_name}}
                            </th>
                            <td class="px-6 py-4">
                               {{$reservation->email}}
                            </td>
                             <td class="px-6 py-4">
                               {{$reservation->phone}}
                            </td>
                             <td class="px-6 py-4">
                               {{$reservation->res_date}}
                            </td>
                            <td class="px-6 py-4">
                               {{$reservation->guest_number}}
                            </td>
                            <td class="px-6 py-4">
                               {{$reservation->table->name}}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{route('admin.reservations.edit',$reservation->id)}}" >Edit</a>
                            </td>
                            
                            <td class="px-6 py-4">
                            <form action="{{route('admin.reservations.destroy',$reservation->id)}}" method="POST" onsubmit="return confirm('Are you sure?')">
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
