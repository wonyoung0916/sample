<?php

namespace App\Controllers;

class Sample extends BaseController
{
    public function index(){
        $sample->method();
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


}