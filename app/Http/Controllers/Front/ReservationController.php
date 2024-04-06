<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStepOneRequest;
use App\Http\Requests\ReservationStoreRequest;
use App\Models\Reservation;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Http\Request;
use illuminate\Support\Str;

class ReservationController extends Controller
{
    public function stepOne(Request $request)
    {
        $reservation = $request->session()->get('reservation');
        $minDate = Carbon::today();
        $maxDate = Carbon::now()->addDays(10);
        return view('reservations.step-one', compact('reservation', 'minDate', 'maxDate'));
    }

    public function storeStepOne(ReservationStepOneRequest $request)
    {
        if (empty($request->session()->get('reservation'))) {
            $reservation = new Reservation();
            $reservation->fill($request->validated());
            $request->session()->put('reservation', $reservation);
        } else {
            $reservation = $request->session()->get('reservation');
            $reservation->fill($request->validated());
            $request->session()->put('reservation', $reservation);
        }
        return to_route('reservations.step.two');
    }

    public function stepTwo(Request $request)
    {
        $reservation = $request->session()->get('reservation');
        $availableTableIds = Reservation::orderBy('res_date')->get()->filter(function ($value) use ($reservation) {
            return $value->res_date->format('Y-m-d') == $reservation->res_date->format('Y-m-d');
        })->pluck('table_id');
        $tables = Table::where('status', 'available')
            ->where('guest_number', '>=', $reservation->guest_number)
            ->whereNotIn('id', $availableTableIds)->get(['uuid', 'name', 'guest_number']);
        return view('reservations.step-two', compact('reservation', 'tables'));
    }

    public function storeStepTwo(Request $request)
    {
        $validated = $request->validate([
            'table_uuid' => 'required|string|exists:tables,uuid',
        ]);
       
        $reservation = $request->session()->get('reservation');
        $table_id = Table::where('uuid', $request->table_uuid)->first()->id;
        $reservation->fill([
            'table_id' => $table_id,
            'uuid' => Str::uuid()
        ]);
        $reservation->save();
        $request->session()->forget('reservation');

        return to_route('thankYou');
    }
}
