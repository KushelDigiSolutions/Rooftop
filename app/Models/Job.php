<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Job extends Model
{
	 use HasFactory;
     protected $fillable = [
        'quotation_id',
		 'subContract_id',
        'job_code',
        'start_date',
        'end_date',
		 'lead_id',
		 'beforeWorkRemark',
		 'beforeImage',
		 'afterWorkRemark',
		 'afterImage',
		 'remarks',
        'status'
    ];
	
	public function bid(){
        return $this->belongsto(Quotation::class, 'quotation_id', 'id'); 
    }

    public function appointment(){
        return $this->belongsto(Appointment::class, 'lead_id', 'id'); 
    }
	
	 public function subcontract(){
        return $this->belongsto(Subcontractor::class, 'subContract_id', 'id'); 
    }
	
}
