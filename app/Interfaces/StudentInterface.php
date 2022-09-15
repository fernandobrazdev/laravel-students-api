<?php

namespace App\Interfaces;

use App\Http\Requests\StudentRequest;

interface StudentInterface
{
    /**
     * Get all students
     *
     * @method  GET api/students
     * @access  public
     */
    public function getAllStudents();

    /**
     * Get Student By ID
     *
     * @param   integer     $id
     *
     * @method  GET api/students/{id}
     * @access  public
     */
    public function getStudentById($id);

    /**
     * Create | Update student
     *
     * @param   \App\Http\Requests\StudentRequest    $request
     * @param   integer                           $id
     *
     * @method  POST    api/students       For Create
     * @method  PUT     api/students/{id}  For Update
     * @access  public
     */
    public function requestStudent(StudentRequest $request, $id = null);

    /**
     * Delete student
     *
     * @param   integer     $id
     *
     * @method  DELETE  api/students/{id}
     * @access  public
     */
    public function deleteStudent($id);
}
