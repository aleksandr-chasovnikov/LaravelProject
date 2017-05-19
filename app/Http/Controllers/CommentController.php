<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    /**
     * Создать комментарий
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'comm' => 'required'
        ]);
        $data = $request->all();
        $comment = new Comment;
        $comment->fill($data);

        $comment->save();

        return redirect()->back();
    }
}

