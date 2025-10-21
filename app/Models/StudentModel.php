<?php
namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table            = 'students';
    protected $primaryKey       = 'id';

    // ✅ Automatically allow CodeIgniter to update these columns
    protected $allowedFields    = ['name', 'email', 'course'];

    // ✅ Enable data return as associative array
    protected $returnType       = 'array';

    // ✅ Optional: automatically use created_at/updated_at if your DB table supports them
    protected $useTimestamps    = false; // change to true if you have these columns

    // ✅ Optional: Validation rules for better data integrity
    protected $validationRules  = [
        'name'  => 'required|min_length[3]|max_length[50]',
        'email' => 'required|valid_email',
        'course'=> 'required|min_length[2]|max_length[100]',
    ];

    protected $validationMessages = [
        'email' => [
            'required'    => 'Email is required.',
            'valid_email' => 'Please enter a valid email address.'
        ]
    ];

    protected $skipValidation = false;
}
