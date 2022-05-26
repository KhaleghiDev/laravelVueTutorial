<?php

namespace App\Http\Controllers;

use App\Models\life;
use Illuminate\Http\Request;

class LifeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lifes = life::all();
        return view("admin.life.index", compact('lifes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.life.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'color' => 'required',
        ]);
        // dd(auth()->id());
        life::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'color' =>  $request->color,
        ]);

        return redirect()->route('admin.life.index')
            ->with('success', 'life created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\life  $life
     * @return \Illuminate\Http\Response
     */
    public function show(life $life)
    {
        return view("admin.life.show", compact("life"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\life  $life
     * @return \Illuminate\Http\Response
     */
    public function edit(life $life)
    {
        return view('admin.life.edit', compact('life'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\life  $life
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, life $life)
    {
        $validated = $request->validate([
            'title' => 'required',
            'color' => 'required',
        ]);
        // dd(auth()->id());
        life::update([
            'title' => $request->title,
            'color' =>  $request->color,
        ]);

        return redirect()->route('admin.life.index')
            ->with('success', 'life created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\life  $life
     * @return \Illuminate\Http\Response
     */
    public function destroy(life $life)
    {
        $life->delete();
        return redirect()->route('admin.life.index')
            ->with('success', 'life created successfully.');
    }
}
