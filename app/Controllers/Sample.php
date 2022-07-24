<?php

namespace App\Controllers;

class Sample extends BaseController
{
    public function index(){
        return "Sample controller";
    }

    public function method(): string{
        return "run method";
    }

    public function param($name): string
    {
        return "param name is " . $name;
    }

    public function param2($name, $age): string
    {
        return "param name is $name. age is $age";
    }

    public function defaultparam($name = 'codeigniter 4'): string
    {
        return "default param name is " . $name;
    }

    public function showview(): string
    {
        return view("/showView");
    }

    public function viewdata(): string
    {
        $data = ['name' => 'ci4',
                 'age' => 20
                ];
        return view("/viewData.php", $data);
    }

    public function postform(): string
    {
        return View("/postForm");
    }

    public function postinput(): void
    {
        $input_data = $this->request->getPost();
        var_export($input_data);
        echo $input_data;
    }

    public function session_exist() // (1)
    {
        $session = session(); // (2)
        $is_session_exist = $session->member_id != null; // (3)
        return $is_session_exist ? "세션 값이 존재합니다." : "세션 값이 없습니다."; // (4)
    }

    public function session_set() // (5)
    {
        $session = session();
        $session->member_id = "3"; // (6)
        return "세션이 설정되었습니다.";
    }

    public function session_get() // (7)
    {
        $session = session();
        $session_value = $session->member_id; // (8)
        return  $session_value === null ? "세션 값이 없습니다." : "세션 값은 $session_value 입니다." ;
    }

    public function session_remove() // (9)
    {
        $session = session();
        $session->remove('member_id'); // (10)
        return "세션값이 삭제되었습니다.";
    }

    public function json_response(): \CodeIgniter\HTTP\Response{
        $data = [
            'name' => "ci4",
            'type' => "json",
            'age' => "20"
        ];

        $response = $this->response->setJSON($data);
        return $response;
    }

    public function valid(){
        $input = $this->validate([
            "name" => [
                'rules' => 'required|min_length[4]|max_length[10]',
                'errors' => [
                    'required' => '이름이 필요합니다.',
                    'min_length' => '이름은 최소 4글자 이상입니다.',
                    'max_length' => '이름은 최대 10글자 이하입니다.'
                ]
            ],
            "age" => [
                'rules' => 'required|is_natural|less_than[150]',
                'errors' => [
                    'required' => '필수값입니다.',
                    'is_natural' =>"나이는 자연수 여야 합니다.",
                    'less_than' => "정말 150세 이상이신가요?"
                ]
            ]
        ]);
        if ($input){
            return $this->response->setJSON("성공했습니다.");
        }else{
            $errors = $this->validator->getErrors();
            return
                $this
                ->response
                ->setStatusCode(400, "bad parameter")
                ->setJSON($errors);
        }
    }

    public function test(){
        return $this->index();
    }

    public function redirect(){
        $this->response->redirect("/");
    }


}