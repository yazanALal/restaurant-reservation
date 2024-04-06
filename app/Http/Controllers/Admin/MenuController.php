<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuStoreRequest;
use App\Http\Requests\MenuUpdateRequest;
use App\Models\Category;
use App\Models\Menu;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $menus = Menu::with('categories')->get();
            return view('admin.menus.index', compact('menus'));
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
            $categories = Category::all();
            return view('admin.menus.create', compact('categories'));
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
    public function store(MenuStoreRequest $request)
    {
        try {
            $image = $request->file('image')->store('public/menus');

            $menu = Menu::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'image' => $image,
                'uuid' => Str::uuid(),
                'price' => $request->input('price'),
            ]);

            if ($request->has('categories')) {
                $menu->categories()->attach($request->input('categories'));
            }

            return to_route('admin.menus.index')->with('success', 'menu created successfully');
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
    public function edit($id)
    {
        try {
            $menu = Menu::where('id', $id)->with('categories')->first();
            $categories = Category::all();
            return view('admin.menus.edit', compact('categories', 'menu'));
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
    public function update(MenuUpdateRequest $request, Menu $menu)
    {
        try {
            $image = $menu->image;

            if ($request->hasFile('image')) {
                Storage::delete($menu->image);
                $image = $request->file('image')->store('public/menus');
            }
            $menu->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'image' => $image,
                'price' => $request->input('price'),
            ]);

            if ($request->has('categories')) {
                $menu->categories()->sync($request->input('categories'));
            } else {
                $menu->categories()->detach();
            }
            return to_route('admin.menus.index')->with('success', 'menu updated successfully');
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
    public function destroy(Menu $menu)
    {
        try {
            Storage::delete($menu->image);
            $menu->delete();
            return to_route('admin.menus.index')->with('success', 'menu deleted successfully');
        } catch (Exception $e) {
            return abort(500, $e->getMessage());
        }
    }
}
