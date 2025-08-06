<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs'; // Ensure the correct table name

    protected $fillable = [
        'customer_id',
        'mobile_number',
        'email',
        'city',
        'state',
        'country',
        'zip_code',
    ];

    // Define relationship with the Customer model
    public function customer()
    {
        return $this->belongsTo(User::class, 'id', 'customer_id');
    }
}
