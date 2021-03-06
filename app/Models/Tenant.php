<?php

namespace App\Models;

use App\Library\MyClass;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    //not deleted users
    public static function realTenants()
    {
        return self::where('deleted' , 0)->orderBy('id', 'desc');
    }

    public function getType()
    {
        return isset(MyClass::$companyTypes[$this->type]) ? MyClass::$companyTypes[$this->type] : "-";
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function msk_type()
    {
        return $this->belongsTo(MskType::class,'type','id');
    }
}
