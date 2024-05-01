<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function offer()
    {
        return $this->hasOne(Offer::class);
    }
}
