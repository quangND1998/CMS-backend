<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\TinTuc;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\CommentResource;
use Illuminate\Http\Response;
class CommentController extends Controller
{
    public function getDanhSach(){
    	$comment = Comment::all();
    	return CommentResource::collection($comment);
    }

    public function Xoa($id){
    	$comment = Comment::find($id);
        if (!$comment) {
            $msg = [
                'msg' => 'Delete the contact failed'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }
        $comment->delete();
        return response()->json('Delete Sussessfully', Response::HTTP_OK);
    }

    public function Them($article_id,Request $request){
        $this->validate($request,
            [
                'content' => 'required'
            ],
            [
                'content.required' => 'Bạn chưa nhập nội dung'
            ]);
        $tintuc = TinTuc::find($article_id);
   
        $comment = new Comment;
        $comment->idUser = Auth::user()->id;
    
        $comment->idTinTuc = $article_id;
        $comment->NoiDung = $request->content;
        $comment->save();

        return redirect('tin-tuc/'.$tintuc->TieuDeKhongDau.'.html')->with('message','Bình Luận đã được đăng!');
    }
}
