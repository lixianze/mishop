<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeAttr extends Model
{
    protected $table = 'type_attr';

    public static function AttrFind($where){
        $data = self::where($where)->get(['attr_id']);
        return $data;
    }
}
