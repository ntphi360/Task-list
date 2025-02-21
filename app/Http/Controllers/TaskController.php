<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tasks.index',['tasks' => Task::latest()->paginate()]);
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
    public function store(TaskRequest $request)
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
    public function edit(string $id)
    {
        return view('tasks.edit',['task' => Task::findOrFail($id)]);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, string $id)
    {
        $data = $request->validated(); 
        $task = Task::findOrFail($id); 
        $task->update($data);

        return redirect()->route('tasks.show',['task' => $task->id])->with('success','Task updated successfully!');
         
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('tasks.index')->with('success','Task deleted successfully!');
    }

    public function toggleComplete(Task $task){
        $task->completed = !$task->completed;
        $task->save();
        return redirect()->back()->with('success', 'Task status updated!');
    }
} 