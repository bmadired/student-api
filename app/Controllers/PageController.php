<?php
namespace App\Controllers;

class PageController extends BaseController {
    public function addStudentForm() {
        return view('add_student');
    }
}
