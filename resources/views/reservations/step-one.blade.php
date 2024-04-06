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
                                    class="  w-40  p-1  text-xs  font-medium  leading-none  text-center text-blue-100  bg-blue-600  rounded-full">
                                    Step1
                                </div>
                            </div>
                            <form method="POST" action="{{ route('reservations.store.step.one') }}">
                                @csrf
                                <div class="mt-4 mb-4">
                                    <label class="mt-1"> First Name </label>
                                    <input type="text" value="{{ $reservation->first_name ?? '' }}" name="first_name"
                                        class=" w-full  px-4  py-2  text-sm  border  rounded-md   focus:border-blue-400   focus:outline-none   focus:ring-1   focus:ring-blue-600 "
                                        name="first_name" placeholder="First Name" />
                                    @error('first_name')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label cclass="mt-1"> Last Name </label>
                                    <input type="text" value="{{ $reservation->last_name ?? ''}}"
                                        class="  w-full  px-4  py-2  text-sm  border  rounded-md  focus:border-blue-400  focus:outline-none  focus:ring-1  focus:ring-blue-600"
                                        name="last_name" placeholder="Last Name" />
                                    @error('last_name')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label cclass="mt-1"> Email </label>
                                    <input value="{{ $reservation->email ?? ''}}"
                                        class="w-full px-4 py-2 text-sm border rounded-md focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-600"
                                        placeholder="Email" type="text" name="email" />
                                    @error('email')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label cclass="mt-1"> Phone Number </label>
                                    <input
                                        class="w-full px-4 py-2 text-sm border rounded-md focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-600"
                                        placeholder="Phone Number" type="number" name="phone"
                                        value="{{ $reservation->phone ?? ''}}" />
                                    @error('phone')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label cclass="mt-1"> Reservation Date </label>
                                    <input type="datetime-local" id="res_date" name="res_date"
                                    min="{{$minDate->format('Y-m-d\TH:i:s')}}"
                                    max="{{$maxDate->format('Y-m-d\TH:i:s')}}"
                                        value="{{ $reservation ? $reservation->res_date->format('Y-m-d\TH:i:s') : ''}}"
                                        class="w-full px-4 py-2 text-sm border rounded-md focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-600" />
                                    @error('res_date')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label cclass="mt-1"> Guest Number </label>
                                    <input type="number" id="guest_number" name="guest_number"
                                        value="{{ $reservation->guest_number ?? ''}}"
                                        class="w-full px-4 py-2 text-sm border rounded-md focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-600"
                                        placeholder="Guest Number" />
                                    @error('guest_number')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex justify-end">
                                    <button
                                        type="submit"
                                        class=" px-6 py-2 mt-4 text-sm font-medium leading-5 text-cente text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg hover:bg-blue-700 focus:outline-none"
                                        >
                                        Next
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
