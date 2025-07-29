<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function franchise(){
        return $this->belongsto(Franchise::class, 'franchise_id', 'id'); 
    }

    public function local_franchise(){
        return $this->hasMany(Subcontractor::class, 'city', 'city'); 
    }
	
	 public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function quotation(){
        return $this->hasMany(Quotation::class,'appointment_id');
    }

    public function getCreatedAtFormattedAttribute()
    {
        return $this->created_at->format('d-m-Y'); // Change the format as needed
    }

    public function contracts()
    {
        // return $this->hasMany(Contract::class);
        return $this->belongsto(Contract::class, 'lead_id');
    }
    
}
