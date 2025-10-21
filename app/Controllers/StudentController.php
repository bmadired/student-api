<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\StudentModel;

class StudentController extends ResourceController
{
    protected $modelName = StudentModel::class;
    protected $format    = 'json';

    // -----------------------------
    // GET /students
    // -----------------------------
    public function index()
    {
        $students = $this->model->findAll();
        return $this->respond($students);
    }

    // -----------------------------
    // GET /students/{id}
    // -----------------------------
    public function show($id = null)
    {
        if (!$id) {
            return $this->failValidationErrors('Student ID is required.');
        }

        $student = $this->model->find($id);
        if (!$student) {
            return $this->failNotFound("Student with ID $id not found.");
        }

        return $this->respond($student);
    }

    // -----------------------------
    // POST /students
    // -----------------------------
    public function create()
    {
        $data = $this->request->getJSON(true); // Parse JSON body

        if (!$data || !isset($data['name'], $data['email'], $data['course'])) {
            return $this->failValidationErrors('Invalid or incomplete JSON data.');
        }

        if ($this->model->insert($data)) {
            return $this->respondCreated([
                'status'  => 201,
                'message' => 'Student created successfully',
                'data'    => $data
            ]);
        }

        return $this->fail('Failed to insert record.');
    }

    // -----------------------------
    // PUT /students/{id}
    // -----------------------------
    public function update($id = null)
    {
        if (!$id) {
            return $this->failValidationErrors('Student ID is required.');
        }

        $data = $this->request->getJSON(true); // ✅ Ensures JSON is read properly

        if (!$data) {
            return $this->failValidationErrors('Invalid or missing JSON data.');
        }

        // Check if student exists before updating
        $student = $this->model->find($id);
        if (!$student) {
            return $this->failNotFound("Student with ID $id not found.");
        }

        if ($this->model->update($id, $data)) {
            return $this->respond([
                'status'       => 200,
                'message'      => 'Student updated successfully',
                'updated_data' => $data
            ]);
        }

        return $this->fail('Failed to update record.');
    }

    // -----------------------------
    // DELETE /students/{id}
    // -----------------------------
    public function delete($id = null)
    {
        if (!$id) {
            return $this->failValidationErrors('Student ID is required.');
        }

        // Check if record exists
        $student = $this->model->find($id);
        if (!$student) {
            return $this->failNotFound("Student with ID $id not found.");
        }

        if ($this->model->delete($id)) {
            return $this->respondDeleted([
                'status'  => 200,
                'message' => 'Student deleted successfully',
                'deleted_id' => $id
            ]);
        }

        return $this->fail('Failed to delete record.');
    }
}
