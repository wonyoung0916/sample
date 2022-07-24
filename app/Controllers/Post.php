<?php
namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\PostsModel;

class Post extends Controller
{
    // 생성
    public function create(){

    }

    // 조회
    public function show($post_id){
        $model = new PostModel();
        $post = $model->find($post_id);
        if (!$post){
            return $this->response->redirect("/post");
        }
        return view('/post/show',[
            'post' => $post
        ]);
    }

    // 수정
    public function edit(){

    }

    // 삭제
    public function delete(){

    }

    // 목록
    public function index($page=1){

    }

}