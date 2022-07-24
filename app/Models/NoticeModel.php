<?php

namespace App\Models;

use CodeIgniter\Model;

class NoticeModel extends Model
{
    protected $table = 'notice';
    protected $allowedFields = ['TITLE', 'CONTENT'];
    protected $primaryKey = 'SEQ';

    protected $useSoftDeletes = true;
    protected $useTimestamps = true;

}