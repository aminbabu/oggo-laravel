<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'payment_system',
        'first_name',
        'last_name',
        'email',
        'country',
        'city',
        'state',
        'zip_code',
        'street'
    ];

    /**
     * create a belongs to relationship to package table
     *
     */
    public function package()
    {
        return $this->belongsTo(Package::class);
    }


    /**
     * create a has one relationship to invoice table
     *
     */
    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
}