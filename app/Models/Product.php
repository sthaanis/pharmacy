<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function medicine_type(){
        return $this->belongsTo(MedicineType::class);
    }
}

