<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    use HasFactory;

    protected $table = "mahasiswa";
    protected $guarded = ['id'];

    public function admin()
    {
        return $this->belongsTo(AdminModel::class, 'admin_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(CityModel::class, 'city_id', 'id');
    }
}
