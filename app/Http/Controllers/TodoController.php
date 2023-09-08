<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use \Validator;

class TodoController extends Controller
{
    public function index()
    {
        $todo = Todo::all();
        return response()->json($todo);
    }
    
    public function store(Request $request)
    {
        $todo = Todo::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'status' => Todo::STATUS_PENDING
        ]);

        $res = [
            'msg' => 'Successfully created Todo '.$todo->id,
            'todo' => $todo
        ];
    
        return response()->json($res, 201); // Return the created task with a 201 status code.
    }
    
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'status' => 'required|integer|between:0,1',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $todo = Todo::find($id);

        if($todo){
            $todo->update([
                'status' => $request->input('status'),
            ]);

            $res = [
                'msg' => 'Successfully updated todo '.$id,
                'todo' => $todo
            ];
        
            return response()->json($res);
        }

        $res = [
            'msg' => 'Todo not found.'
        ];

        return response()->json($res, 404);
    }
    
    public function destroy($id)
    {
        $todo = Todo::find($id);
        if($todo){
            $todo->delete();
            $res = [
                'msg' => 'Todo deleted successfully.',
            ];
        
            return response()->json($res);

        }
    
        $res = [
            'msg' => 'Todo not found.'
        ];

        return response()->json($res, 404);
    }
    
}
