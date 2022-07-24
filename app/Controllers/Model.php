<?php


namespace App\Controllers;


use App\Models\SampleModel; // (1)

class Model extends BaseController
{
    public function create()
    {
        $sampleModel = new SampleModel();  // (2)
        $data = [  // (3)
            'name' => 'ci4',
            'age' => 1
        ];

        try {  // (4)
            $result = $sampleModel->insert($data);  // (5)
            return "$result";  // (6)
        } catch (\ReflectionException $e) {  // (7)
            return $e->getMessage();
        } catch(\DataException $e){ // (8)
            return $e->getMessage();
        }
    }
}