<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Scout\Searchable;
use App\Model\Post;

class SearchController extends Controller
{
    //添加一条记录
    public function addPost()
    {
        $post = new Post();
        $post->title = '测试添加';
        $post->profiles = '测试备注';
        $post->content = '测试内容';
        $post->save();
    }

    //更新一条记录
    public function updatePost()
    {
        $post = Post::find(5);
        $post->title = '测试修改';
        $post->save();

    }

    //删除一条记录
    public function deletePost()
    {
        $post = Post::find(5);
        $post->delete();
    }

    //查询记录
    public function searchPost(Request $request)
    {
        $search = $request->input('search', '');
        if ($search) {
            //富含where条件
            dd(Post::search($search)->where('id', 2)->get()->toArray());
        } else {
            dd(Post::get()->toArray());
        }
        //paginate(15)分页
    }

}
