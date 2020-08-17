<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('tasks')->get();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->get('id');
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'first_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$id,
        ]);
        if (count($validator->errors()) > 0) {
            $result['error'] = $validator->errors()->all();
            return response()->json($result, 400);
        } else {

            if ($id)
                $user = User::find($id);
            else
                $user = new User;
            $user->name = $request->get('name');
            $user->first_name = $request->get('first_name');
            $user->email = $request->get('email');
            $user->save();
            return response()->json($user);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->tasks()->delete();
        $result = $user->delete();
        return response()->json($result);
    }
}
