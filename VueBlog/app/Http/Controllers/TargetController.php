<?php

namespace App\Http\Controllers;

use App\Models\Target;
use Illuminate\Http\Request;

class TargetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $targets=Target::all();
       return view("admin.target.index",compact('targets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.target.create");
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
            'time' => 'required',
        ]);
        // dd(auth()->id());
        Target::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'time' =>  $request->color,
        ]);
        return redirect()->route('admin.target.index')
        ->with('success', 'target created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Target  $target
     * @return \Illuminate\Http\Response
     */
    public function show(Target $target)
    {
        return view("admin.target.show", compact("target"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Target  $target
     * @return \Illuminate\Http\Response
     */
    public function edit(Target $target)
    {
        return view('admin.target.edit', compact('target'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Target  $target
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Target $target)
    {
        $validated = $request->validate([
            'title' => 'required',
            'time' => 'required',
        ]);
        // dd(auth()->id());
        Target::update([
            'title' => $request->title,
            'time' =>  $request->color,
        ]);

        return redirect()->route('admin.target.index')
            ->with('success', 'life created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Target  $target
     * @return \Illuminate\Http\Response
     */
    public function destroy(Target $target)
    {
        $target->delete();
        return redirect()->route('admin.target.index')
            ->with('success', 'target created successfully.');
    }
}
