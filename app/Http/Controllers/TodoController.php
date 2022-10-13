<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoretodoRequest;
use App\Http\Requests\UpdatetodoRequest;
use App\Models\todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        foreach (todo::all() as $todo) {
            $data[] = $todo;
        }
       
        // var_dump($data);die;
        if(isset($data)){
            return view('todo')->with('tasks', $data); 
        }
        else{
             return view('todo');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $todo = todo::create([
        //     'tasks' => $_POST['task']
        // ]);

        $todo = new todo;

        // var_dump($todo);die;

        $todo->tasks = $request->task;

        $todo->save();

        return redirect('/');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetodoRequest  $request
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $todo = new todo;

        $todo = todo::where('idtodo', $request->idtask);;

        $todo->update(['tasks' => $request->taskedit]);

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $todo = new todo;
        $todo = todo::where('idtodo', $request->idtask);
        $todo->delete();

        return redirect('/');
        
    }
}
