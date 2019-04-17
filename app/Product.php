<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Denna array säger till produkten vilket fält som man kan ändra. 

    protected $fillable = [
        'name', 'description', 'image', 'price', 'type'
    ];

// . $sammanfogar /concatenates sek och value

public function getPriceAttribute($value) {

      return $value;
 }
}