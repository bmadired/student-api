<?php
namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table      = 'students';
    protected $primaryKey = 'id';

    // Fields allowed for insert/update
    protected $allowedFields = ['name', 'date_of_birth', 'intake_class', 'department_id'];

    // Optional timestamps (PostgreSQL compatible)
    protected $useTimestamps = false;  // set true only if you have created_at column
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Optional for debugging/logging
    protected $returnType    = 'array';
}
