<?php

namespace App\Models\Admin;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function brand()
    {
        return $this->hasMany(Brand::class);
    }

}
