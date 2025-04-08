<?php

namespace App\Repository;

interface StudentRepositoryInterface
{
    public function create();


    public function Get_classrooms($id);


    public function Get_Sections($id);

    public function Store_Student($request);

    public function student_edit($id);

    public function Students_update($request);

    public function Students_destroy($request);

    public function student_show($id);


    public function Upload_attachment($request);


    public function Download_attachment($name , $filename);

    public function Delete_attachment($request);



    

}
