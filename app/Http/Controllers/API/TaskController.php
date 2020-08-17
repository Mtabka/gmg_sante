<?php

namespace App\Http\Controllers\API;

use App\Task;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::with('user')->get();
        return response()->json($tasks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required',
            'user_id' => 'required'//int|exists:users,id,
        ]);
        if (count($validator->errors()) > 0) {
            $result['error'] = $validator->errors()->all();
            return response()->json($result, 400);
        } else {
            $id = $request->get('id');
            if($id)
                $task = Task::find($id);
            else
                $task = new Task;
            $task->name = $request->get('name');
            $task->description = $request->get('description');
            $task->user_id = $request->get('user_id');
            $task->save();
            return response()->json($task);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $task = Task::find($id);
        return response()->json($task);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ids' => 'required|array',
        ]);
        if (count($validator->errors()) > 0) {
            $result['error'] = $validator->errors()->all();
            return response()->json($result, 400);
        } else {
            $ids = $request->get('ids');
            $result = Task::whereIn('id', $ids)->delete();
            return response()->json($result);
        }
    }
}
