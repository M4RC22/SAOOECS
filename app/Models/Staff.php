<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    use Uuid;

    protected $guarded = [];

    // BELONGS TO
    public function facultyUser()
    {
        return $this->belongsTo(User::class);
    }

    public function staffUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function staffDepartment()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function formsSao(){
        
        return $this->hasMany(Form::class, 'sao_staff_id');
    }

}
