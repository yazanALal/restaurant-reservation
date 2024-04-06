<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TableStoreRequest;
use App\Models\Table;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $tables = Table::all();
            return view('admin.tables.index', compact('tables'));
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
        return view('admin.tables.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TableStoreRequest $request)
    {
        try {
            Table::create([
                'name' => $request->name,
                'status' => $request->status,
                'uuid' => Str::uuid(),
                'location' => $request->location,
                'guest_number' => $request->guest_number
            ]);

            return to_route('admin.tables.index')->with('success', 'table created successfully');
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
    public function edit(Table $table)
    {
        return view('admin.tables.edit', compact('table'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TableStoreRequest $request, Table $table)
    {
        try {
            $table->update($request->validated());

            return to_route('admin.tables.index')->with('success', 'table updated successfully');
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
    public function destroy(Table $table)
    {
        try {
            $table->delete();
            return to_route('admin.tables.index')->with('success', 'table deleted successfully');
        } catch (Exception $e) {
            return abort(500, $e->getMessage());
        }
    }
}
