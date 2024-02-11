<?php

namespace App\Http\Controllers\City;

use App\Http\Controllers\Controller;
use App\Models\CityModel;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $data = CityModel::all();

        return view('dashboard.city.home', [
            'data' => $data
        ]);
    }

    public function addData()
    {
        return view('dashboard.city.addData');
    }

    public function submitAddData(Request $request)
    {

        $admin_id = session()->get('id');

        $data = [
            "admin_id" => $admin_id,
            "name" => $request->name
        ];

        $city = CityModel::create($data);

        return redirect()->route('GetDataCity')->with('succes', 'Data for City succesfully Added!');
    }

    public function editData($id){
        $data = CityModel::find($id);

        return view('dashboard.city.editData', [
            'data' => $data
        ]);
    }

    public function submitEditData(Request $request, $id){

        $city = CityModel::find($id);

        $data = [
            "name" => $request->name
        ];

        $city->update($data);

        return redirect()->route("GetDataCity")->with('success', "Data City succesfully updated!");
    }

    public function delete($id){
        $city = CityModel::find($id);

        $city->delete();

        return redirect()->route("GetDataCity")->with('success', "Data City succesfully deleted!");
    }
}
