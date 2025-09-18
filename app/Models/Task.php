<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['customer_id', 'title', 'description', 'due_date', 'status'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
