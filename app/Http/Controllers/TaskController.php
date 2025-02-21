<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreTask;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tasks.index',['tasks' => Task::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTask $request)
    {
        $data = $request->validated();
        $task = Task::create($data);
        return redirect()->route('tasks.show',['task' => $task->id])->with('success','Task created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('tasks.show',['task' => Task::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     return view('tasks.edit',['task' => Task::findOrFail($id)]);
    // }

    public function edit(Task $task)
    {
        return view('tasks.edit',['task' => $task]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTask $request, string $id)
    {
        $data = $request->validated(); 
        $task = Task::findOrFail($id);
        $task->fill($data); 
        $task->save();

        return redirect()->route('tasks.show',['task' => $task->id])->with('success','Task updated successfully!');
         
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}