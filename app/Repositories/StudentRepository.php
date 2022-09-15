<?php

namespace App\Repositories;

use App\Http\Requests\StudentRequest;
use App\Interfaces\StudentInterface;
use App\Traits\ResponseAPI;
use App\Models\Student;

class StudentRepository implements StudentInterface
{

    use ResponseAPI;

    public function getAllStudents()
    {
        try {
            $students = Student::all();
            return $this->success("All Students", $students);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function getStudentById($id)
    {
        try {
            $student = Student::find($id);

            // checking student
            if (!$student) return $this->error("No student found with ID $id", 404);

            return $this->success("Student", $student);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function requestStudent(StudentRequest $request, $id = null)
    {
        try {
            // testing if create or update a Student
            $student = $id ? Student::find($id) : new Student();

            // checking student
            if ($id && !$student) return $this->error("No student found with ID $id", 404);

            $student->fill($request->all());
            $student->save();

            return $this->success($id ? "Student updated successfully" : "Student created successfully", $student, $id ? 200 : 201);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function deleteStudent($id)
    {
        try {
            $student = Student::find($id);

            // checking student
            if (!$student) return $this->error("No student found with ID $id", 404);

            $student->delete();

            return $this->success("User deleted successfully", $student);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}
