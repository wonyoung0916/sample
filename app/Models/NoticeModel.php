<?php

namespace App\Models;

use CodeIgniter\Model;

class NoticeModel extends Model
{
    protected $table = 'notice';
    protected $allowedFields = ['SEQ', 'TITLE', 'CONTENT', 'READ_CNT', 'SHOW_YN', 'DEL_YN', 'CREATED_BY', 'CREATED_AT'];
    protected $primaryKey = 'SEQ';

    protected $useTimestamps = true;

}