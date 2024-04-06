<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">

        <div class="flex items-center min-h-screen bg-gray-50">
            <div class="flex-1 h-full max-w-4xl mx-auto bg-white rounded-lg shadow-xl">
                <div class="flex flex-col md:flex-row">
                    <div class="h-32 md:h-auto md:w-1/2">
                        <img class="object-cover w-full h-full"
                            src="https://cdn.pixabay.com/photo/2021/01/15/17/01/green-5919790__340.jpg" alt="img" />
                    </div>
                    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                        <div class="w-full">
                            <h3 class="mb-4 text-xl font-bold text-blue-600">Make Reservation</h3>

                            <div class="w-full bg-gray-200 rounded-full">
                                <div
                                    class="  w-100  p-1  text-xs  font-medium  leading-none  text-center text-blue-100  bg-blue-600  rounded-full">
                                    Step2
                                </div>
                            </div>
                            <form method="POST" action="{{ route('reservations.store.step.two') }}">
                                @csrf
                                <div class="mb-4">
                                    <label class="mt-1"> Table </label>
                                    <select id="table_id" name="table_uuid"
                                        class="w-full px-4 py-2 text-sm border rounded-md focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-600">
                                        @foreach ($tables as $table)
                                            <option value="{{ $table->uuid }}" >
                                                {{ $table->name }}-({{ $table->guest_number }} Guest)</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex justify-between">
                                    <a href="{{route('reservations.step.one')}}" class=" px-6 py-2 mt-4 text-sm font-medium leading-5 text-cente text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg hover:bg-blue-700 focus:outline-none" >
                                    Previous
                                    </a>
                                    <button
                                    type="submit"
                                        class=" px-6 py-2 mt-4 text-sm font-medium leading-5 text-cente text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg hover:bg-blue-700 focus:outline-none"
                                        >
                                        Make Reservation
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
