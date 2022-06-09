<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks=Task::all();
        return view("admin.task.index",compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.task.create");
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
            'time_start' => 'required',
            'time_end' => 'required',
            'namber'=>'required'
        ]);
        // dd(auth()->id());
        Task::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'time_start' =>  $request->time_start,
            'time_end' =>  $request->time_end,
            'namber'=>$request->namber,
        ]);
        return redirect()->route('admin.task.index')
        ->with('success', 'task created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view("admin.task.show", compact("task"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view("admin.task.edit", compact("task"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'namber'=>'required'
        ]);
        // dd(auth()->id());
        Task::update([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'time_start' =>  $request->time_start,
            'time_end' =>  $request->time_end,
            'namber'=>$request->namber,
        ]);
        return redirect()->route('admin.task.index')
        ->with('success', 'task update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('admin.task.index')
        ->with('success', 'task deleate successfully.');
    }
}
