<?php

namespace App\Http\Controllers\Admin;

use App\Enum\CommentEnum;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::orderBy('created_at', 'desc')->get();
        return view('admin.comment.index', compact('comments'));
    }

    public function create()
    {
        return view('admin.comment.create-edit');
    }

    public function edit(Comment $comment)
    {
        return view('admin.comment.create-edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $data = $request->only([
            'is_approved',
            'is_active'
        ]);

        $data['is_approved'] = $data['is_approved'] ? CommentEnum::IS_APPROVED : CommentEnum::IS_NOT_APPROVED;
        $data['is_active'] = $data['is_active'] ? CommentEnum::IS_ACTIVE : CommentEnum::IS_NOT_ACTIVE;

        if ($comment->update($data)) {
            return redirect()->route('admin.comment.index')->with('success', 'Yorum başarılı bir şekilde güncellendi');
        }
        return redirect()->route('admin.comment.index')->with('error', 'Yorum güncellenirken bir sorun oluştu.');
    }

    public function destroy(string $id)
    {
        $comment = Comment::find($id);
        if ($comment->delete()) {
            return redirect()->route('admin.comment.index')->with('success', 'Yorum başarılı bir şekilde silindi');
        }
        return redirect()->route('admin.comment.index')->with('error', 'YOrum silinirken bir sorun oluştu.');
    }
}
