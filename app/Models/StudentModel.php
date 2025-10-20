<?php
namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table      = 'students';
    protected $primaryKey = 'id';

    // Fields allowed for insert/update
    protected $allowedFields = ['name', 'email', 'course', 'created_at'];

    // Automatically manage timestamps if desired
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = '';
}
