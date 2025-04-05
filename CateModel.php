<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cateModel extends Model
{
    use HasFactory;

    protected $primarykey = "id";
    protected $table = "category_models";
    protected $fillable =
     [
            'cate_name',
            'cate_image',
            'description'
    ];

    public function menuItems()
    {
        return $this->hasMany(MenuModel::class, 'category_id');
    }
}
