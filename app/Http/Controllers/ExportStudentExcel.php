<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Exports\StudentExcel;
use Maatwebsite\Excel\Facades\Excel;


class ExportStudentExcel extends Controller
{
    public function export(){
        return Excel::download(new StudentExcel, 'student_data.xlsx');
    }
}
