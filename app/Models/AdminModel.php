<?php

namespace App\Models;

use App\Models\CityModel;
use App\Models\StudentModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminModel extends Model
{
    use HasFactory;

    protected $table = "admin";

    protected $guarded = ['id'];

    public function students(){
        return $this->hasMany(StudentModel::class, 'admin_id', 'id');
    }

    public function cities()
    {
        return $this->hasMany(CityModel::class, 'admin_id' , 'id');
    }
}
