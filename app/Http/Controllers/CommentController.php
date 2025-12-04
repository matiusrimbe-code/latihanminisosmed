<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class CommentController extends Controller
{
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'post_id' => 'required',
            'comment_content' => 'required|string|max:255'
        ]);

        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 400);
        }

        $user = JWTAuth::parseToken()->authenticate();

        $comment = Comment::create([
            'user_id' => $user->id,
            'post_id' => $request->post_id,
            'comment_content' => $request->comment_content,
        ]);

        return response()->json([
            'success' => true,
            'data' => $comment
        ], 201);
    }

    public function destroy(int $id) {
        Comment::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Comment berhasil dihapus'
        ]);
    }
}
