<?php
namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\NoticeModel;
class Post extends Controller
{
    // 생성
    public function create()
    {
        if ($this->request->getMethod() === "get") { // (1)
            return view("/post/create"); // (2)
        }

        // (3)
        $model = new NoticeModel();
        $SEQ = $model->insert($this->request->getPost()); // (4)

        if ($SEQ) { //(5)
            $this->response->redirect("/post/show/$SEQ"); // (6)
        } else {
            return view("/post/create", [ // (7)
                'post_data' => $this->request->getPost(),
                'errors' => $model->errors()
            ]);
        }
    }

    // 조회
    public function show($SEQ)
    {
        $model = new NoticeModel();
        $post = $model->find($SEQ); // (1)
        if (!$post) { // (2)
            return $this->response->redirect("/post");
        }

        return view('/post/show',[ // (3)
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