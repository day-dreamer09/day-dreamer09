<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MenuModel extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    public $incrementing = true;
    protected $keyType = 'int';
    protected $table ="menu_table";
    protected $fillable =[
        'title',
        'category_id',
        'Quantity',
        'Price',
        'Made_by',
        'image',
        'gallery_image',


    ];

    public function category()
    {
        return $this->belongsTo(CateModel::class, 'category_id');
    }


}
