<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContractInstallment extends Model
{
    use HasFactory;
     protected $fillable = [
        'contract_id',
		 'amount',
        'due_date',
        'status',
        'paid_at',
    ];

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}
