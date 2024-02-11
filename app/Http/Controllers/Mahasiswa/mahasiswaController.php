<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Charts\StudentFromBornYearChart;
use App\Charts\StudentfromCity;
use App\Charts\StudentfromGenderChart;
use App\Http\Controllers\Controller;
use App\Models\CityModel;
use App\Models\StudentModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class mahasiswaController extends Controller
{
    public function index(StudentfromCity $studentfromCity, StudentfromGenderChart $studentfromGenderChart, StudentFromBornYearChart $studentFromBornYearChart)
    {
        $mahasiswa = StudentModel::get()->groupBy('sex');
        $value_data = [];
        $i = 0;
        $data = [];
        foreach ($mahasiswa as $item) {
            array_push($value_data, $item);
            array_push($data, count($value_data[$i]));
            $i++;
        }

        return view('dashboard.home', [
            "data" => $data,
            "studentfromCity" => $studentfromCity->build(),
            "studentfromGender" => $studentfromGenderChart->build(),
            "studentfromBornYear" => $studentFromBornYearChart->build()
        ]);
    }

    public function GetDataMahasiswa()
    {
        $data = StudentModel::with('city')->get();
        // dd($data);
        return view('dashboard.student.home', [
            "data" => $data
        ]);
    }

    public function AddData()
    {
        $data = CityModel::all();

        return view('dashboard.student.addData', [
            "data" => $data
        ]);
    }

    public function submitAddData(Request $request)
    {

        $validated = $request->validate([
            "nim" => ["required", "max:15", Rule::unique('mahasiswa', 'nim')],
            "name" => ["required", "string"],
            "date" => ["required", "date"],
            "gender" => ["required"],
            "city" => "required",
            "address" => ["required", "min:8"]
        ]);

        $admin = session()->get('id');

        $data = [
            "admin_id" => $admin,
            "city_id" => $validated['city'],
            "nim" => $validated['nim'],
            "name" => $validated['name'],
            "sex" => $validated['gender'],
            "date_of_birth" => $validated['date'],
            "address" => $validated['address']
        ];

        StudentModel::create($data);

        return redirect()->route('GetDataMahasiswa')->with("success", "Student Data Succesfully created!");
    }

    public function editData($id)
    {
        $data = StudentModel::with('city')->where('id', $id)->first();
        $city = CityModel::all();

        return view('dashboard.student.editData', [
            "data" => $data,
            "city" => $city
        ]);
    }

    public function submitEditData(Request $request, $id)
    {

        $mahasiswa = StudentModel::find($id);

        $validated = $request->validate([
            "nim" => ["required", "max:15", Rule::unique('mahasiswa', 'nim')->ignore($id, 'id')],
            "name" => ["required", "string"],
            "date" => ["required", "date"],
            "gender" => ["required"],
            "city" => "required",
            "address" => ["required", "min:8"]
        ]);

        $data = [
            "city_id" => $validated['city'],
            "nim" => $validated['nim'],
            "name" => $validated['name'],
            "date_of_birth" => $validated['date'],
            "sex" => $validated['gender'],
            "address" => $validated['address']
        ];

        $mahasiswa->update($data);

        return redirect()->route('GetDataMahasiswa')->with("success", "Student Data Succesfully updated!");
    }

    public function delete($id)
    {
        $mahasiswa = StudentModel::find($id);

        $mahasiswa->delete();

        return redirect()->route('GetDataMahasiswa')->with("success", "Student Data Succesfully deleted!");
    }
}
