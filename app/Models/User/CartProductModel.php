<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartProductModel extends Model
{
    use HasFactory;
    public $table ="products"; //tro vao bang product
    public $primaryKey = 'pro_id'; //tro vao pro_id
    public $fillable = 
    [
        'color_id', 'brand_id','pro_ram','pro_oSystem','pro_iMemory','pro_warrantyPeriod','pro_image','pro_image1','pro_image2','pro_image3','pro_image4','pro_quatity','pro_price','pro_reducedPrice','pro_description','pro_origin','pro_name','pro_launchDate'
    ];
    public $timestamps = false; //timestampsa
}
