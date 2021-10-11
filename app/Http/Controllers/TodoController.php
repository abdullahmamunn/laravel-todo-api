<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $data = Todo::all();
        return response()->json($data, 200);
    }
    public function store(Request $request)
    {
        $data = new Todo();
        $data->task = $request->task;
        $data->save();
        return response()->json($data,201);
    }
    public function singleData($id)
    {
        $data = Todo::find($id);
        if(empty($data)){
            $data = "data not found!";
            return response($data,404);
        }
        return response()->json($data,200);
    }
    public function updateData(Request $request, $id)
    {
        $data = Todo::find($id);
        $data->task = $request->task;
        $data->save();
        return response()->json($data,201);
    }
    public function deleteData($id)
    {
        $data = Todo::find($id);
        $data->delete();
        return response("data deleted",200);
    }
}
