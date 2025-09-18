<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'type', 'notes'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}

