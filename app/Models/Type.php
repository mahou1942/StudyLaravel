<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' ,
        'sort'
    ];

    public function animals(){
        // hasMany(類別名稱, 參照欄位, 主鍵)
        return $this->hasMany('App\Models\Animal', 'type_id', 'id');
    }
}
