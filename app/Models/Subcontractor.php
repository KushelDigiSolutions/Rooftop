<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcontractor extends Model
{
    protected $fillable = [
        'company_name', 'contact_person', 'phone', 'email', 'city', 'state',
        'zip_code', 'specialization', 'license_number', 'insurance_certificate',
        'experience_years', 'availability_status', 'payment_method',
        'contract_signed', 'office_address', 'service_areas', 'bank_details', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function local_appointment()
    {
        return $this->belongsTo(Appointment::class,'city','city');
    }
}
