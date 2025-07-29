<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contract extends Model
{
    use HasFactory;
     protected $fillable = [
        'lead_id',
		 'roof_type',
        'roof_color',
        'est_start',
        'est_end',
		 'scope_of_work',
        'status',
        'notes',
        'quotation_id',
        'status',
        'signature_img',
        'price'
    ];

    public function customer()
    {
        return $this->belongsTo(Appointment::class, 'lead_id','id');
    }

    public function installments()
    {
        return $this->hasMany(ContractInstallment::class);
    }
}
