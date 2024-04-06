<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
use App\Models\Reservation;
use App\Models\Table;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $reservations = Reservation::with('table')->get();
            return view('admin.reservations.index', compact('reservations'));
        } catch (Exception $e) {
            return abort(500, $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $tables = Table::where('status', 'available')->get();
            return view('admin.reservations.create', compact('tables'));
        } catch (Exception $e) {
            return abort(500, $e->getMessage());
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservationStoreRequest $request)
    {
        try {
            $table = Table::where('id', $request->table_id)->with('reservations')->first();
            $requestDate = Carbon::parse($request->res_date);

            if ($table->reservations) {
                foreach ($table->reservations as $res) {
                    if ($res->res_date->format('Y-m-d') == $requestDate->format('Y-m-d')) {
                        return back()->with('warning', 'sorry, this table is reserved for this date');
                    }
                }
            }
            $reservationData = $request->validated();
            $reservationData['uuid'] = Str::uuid();
            Reservation::create($reservationData);

            return to_route('admin.reservations.index')->with('success', 'reservation created successfully');
        } catch (Exception $e) {
            return abort(500, $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        try {
            $tables = Table::all();
            return view('admin.reservations.edit', compact('reservation', 'tables'));
        } catch (Exception $e) {
            return abort(500, $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReservationStoreRequest $request, Reservation $reservation)
    {
        try {
            $table = Table::find($request->table_id);
            $requestDate = Carbon::parse($request->res_date);
            $reservations=$table->reservations()->where('id','!=',$reservation->id)->get();
            if ($reservations) {
                foreach ($reservations as $res) {
                    if ($res->res_date->format('Y-m-d') == $requestDate->format('Y-m-d')) {
                        return back()->with('warning', 'sorry, this table is reserved for this date');
                    }
                }
            }
            $reservation->update($request->validated());


            return to_route('admin.reservations.index')->with('success', 'reservation updated successfully');
        } catch (Exception $e) {
            return abort(500, $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        try {

            $reservation->delete();
            return to_route('admin.reservations.index')->with('success', 'reservation deleted successfully');
        } catch (Exception $e) {
            return abort(500, $e->getMessage());
        }
    }
}
