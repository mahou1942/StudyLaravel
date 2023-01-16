<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Animal extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     *
     * @var array
     */
    protected $fillable = [
        'type_id',
        'name',
        'birthday',
        'area',
        'fix',
        'description',
        'personality',
        'user_id',
    ];

    /**
     * 取得動物的分類
     */
    public function type(){
        // belongsTo(類別名稱, 參照欄位, 主鍵)
        return $this->belongsTo('App\Models\Type');
    }

    public function getAgeAttribute(){
        $diff = Carbon::now()->diff($this->birthday);
        return "{$diff->y}歲{$diff->m}月";
    }
}
