<?php

namespace App\Http\Controllers;

use CleanArchitecture\Task\Domain\Entities\Task;
use CleanArchitecture\Task\Domain\Entities\User;
use CleanArchitecture\Task\Domain\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
	/**
	 * @var TaskService
	 */
	private $taskService;

	public function __construct(TaskService $taskService)
	{
		$this->taskService = $taskService;
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $tasks = $this->taskService->getAll();
	    return response()->json($tasks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task();
	    $task->setName($request->name);
	    $task->setStartTime($request->start_time);
	    $task->setEndTime($request->end_time);
	    $task->setStatus($request->status);

        $user = new User();
	    $user->setId(auth()->id());

        $task = $this->taskService->create($user, $task);

        return response()->json($task);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	    $user = new User();
	    $user->setId(auth()->id());
	    $tasks = $this->taskService->find($id, $user);
	    return response()->json($tasks);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
	    $user = new User();
	    $user->setId(auth()->id());
	    $tasks = $this->taskService->find($id, $user);
	    $tasks = $this->taskService->update($id, $tasks, $user);
	    return response()->json($tasks);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
	    $user = new User();
	    $user->setId(auth()->id());

	    $res = $this->taskService->destroy($id, $user);
	    return response()->json($res);
    }
}
