<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\StudentModel;

class StudentController extends ResourceController
{
    protected $modelName = StudentModel::class;
    protected $format    = 'json';

    // GET /students
    public function index()
    {
        $students = $this->model->findAll();
        return $this->respond($students);
    }

    // GET /students/{id}
    public function show($id = null)
    {
        $student = $this->model->find($id);
        if (!$student) {
            return $this->failNotFound("Student with ID $id not found.");
        }
        return $this->respond($student);
    }

    // POST /students
    public function create()
    {
        $data = $this->request->getJSON(true);
        if (!$data) {
            return $this->fail('Invalid JSON data.');
        }

        if ($this->model->insert($data)) {
            return $this->respondCreated(['message' => 'Student created successfully']);
        }
        return $this->fail('Failed to insert record.');
    }

    // PUT /students/{id}
    public function update($id = null)
    {
        $data = $this->request->getJSON(true);
        if (!$id || !$data) {
            return $this->fail('Missing ID or data.');
        }

        if ($this->model->update($id, $data)) {
            return $this->respond(['message' => 'Student updated successfully']);
        }
        return $this->fail('Update failed.');
    }

    // DELETE /students/{id}
    public function delete($id = null)
    {
        if (!$id) {
            return $this->fail('ID required.');
        }

        if ($this->model->delete($id)) {
            return $this->respondDeleted(['message' => 'Student deleted successfully']);
        }
        return $this->fail('Delete failed.');
    }
}
