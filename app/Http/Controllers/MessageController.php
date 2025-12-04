<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class MessageController extends Controller
{
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'receiver_id' => 'required',
            'message_content' => 'required|string|max:500'
        ]);

        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 400);
        }

        $user = JWTAuth::parseToken()->authenticate();

        $message = Message::create([
            'sender_id' => $user->id,
            'receiver_id' => $request->receiver_id,
            'message_content' => $request->message_content,
        ]);

        return response()->json([
            'success' => true,
            'data' => $message
        ], 201);
    }

    public function show($id) {
        $message = Message::find($id);

        return response()->json([
            'success' => true,
            'data' => $message
        ]);
    }

    public function getMessages($id) {
        $messages = Message::where('receiver_id', $id)->get();

        return response()->json([
            'success' => true,
            'data' => $messages
        ]);
    }   

    public function destroy(int $id) {
        Message::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Message berhasil dihapus'
        ]);
    }
}
