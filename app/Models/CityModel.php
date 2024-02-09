<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityModel extends Model
{
    use HasFactory;

    protected $table = 'city';
    protected $guarded = ['id'];

    public function admin()
    {
        return $this->belongsTo(AdminModel::class, 'admin_id', 'id');
    }
}
