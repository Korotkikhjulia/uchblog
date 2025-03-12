<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    // Добавление комментария
    public function store(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        Comment::create([
            'content' => $request->content,
            'post_id' => $postId,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('home')->with('success', 'Комментарий добавлен!');
    }

    // Редактирование комментария
    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        return view('comments.edit', compact('comment'));
    }

    // Обновление комментария
    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comment = Comment::findOrFail($id);
        $comment->update(['content' => $request->content]);

        return redirect()->route('home')->with('success', 'Комментарий обновлен!');
    }

    // Удаление комментария
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->route('home')->with('success', 'Комментарий удалён!');
    }
}
