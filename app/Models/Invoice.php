<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'invoice',
    ];


    /**
     * create a has one relationship to orders table
     *
     */
    public function order()
    {
        return $this->hasOne(Order::class);
    }
}