<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Models\Notes;
use App\Models\Status;

class NotesController extends Controller
{
    public function index()
    {
        $notes = Notes::all();

        return response()->json($notes);
    }

    public function create()
    {
        $status = Status::all();

        return response()->json(['status' => $status]);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'status_id' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validate->errors()
            ], 422);
        }

        $user = auth()->userOrFail();
        $note = new Notes;
        $note->title = $request->title;
        $note->description = $request->description;
        $note->status_id = $request->status_id;
        $note->user_id = $user->id;
        $note->save();

        return response()->json(['status' => 'success'], 200);
    }
}
