<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;


    /**
     * create a has many relationship to orders table
     *
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}