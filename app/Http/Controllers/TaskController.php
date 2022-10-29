<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{
    protected $task;

    public function _construct(TaskRepository $tasks){
    	$this->middleware ('auth');
    	$this->tasks = $tasks;
    }

    public function index (Request $request){
    	return view('task.index', [
    		'task' => $this -> tasks -> forUser($request -> user()),
    	]);
    }

    public function store (Request $request)
    {
    	$this->validate($request, [
    	]);

    	$request -> user() -> tasks() -> create([
    	]);

    	return redirect('/tasks');
    }

    public function search(Request $request){
    	
    }
}
