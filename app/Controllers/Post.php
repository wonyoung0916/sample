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
        $post = $model->find($SEQ);
        if (!$post) { // (2)
            return $this->response->redirect("/post");
        }

        return view('/post/show',[ // (3)
            'post' => $post
        ]);
    }

    // 수정
    public function edit($SEQ)
    {
        $model = new NoticeModel();
        $post = $model->find($SEQ); // (1)
        if (!$post) {
            return $this->response->redirect("/post"); // (2)
        }

        if ($this->request->getMethod() === "get") { // (3)
            return view("/post/create",[
                'post_data' => $post
            ]);
        }

        $model->update($SEQ, $this->request->getPost()); // (4)

        $this->response->redirect("/post/show/$SEQ"); // (5)
    }

    // 삭제
    public function delete()
    {
        if ($this->request->getMethod() !== "post"){ // (1)
            return $this->response->redirect("/post");
        }

        $SEQ = $this->request->getPost('SEQ'); // (2)
        $model = new NoticeModel();
        $post = $model->find($SEQ);
        if (!$post) {
            return $this->response->redirect("/post");
        }

        $model->delete($SEQ); // (3)
        return $this->response->redirect("/post"); // (4)
    }

    // 목록
    public function index()
    {
        $model = new NoticeModel();
        $post_query = $model->orderBy("CREATED_AT", "desc");
        $post_list = $model->paginate(10); // (1)
        $pager = $post_query->pager;
        $pager->setPath("/post");

        return view("post/index", [
            'post_list' => $post_list,
            'pager' => $pager
        ]);
    }

}