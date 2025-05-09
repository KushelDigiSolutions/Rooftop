<?php

namespace App\Exports;

use App\Models\Appointment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class FranchiseWiseSalesExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $request;
    protected $statusMap = [
        1 => 'Pending',
        2 => 'Processing',
        3 => 'Hold',
        4 => 'Completed',
    ];
    public function __construct($request)
    {
        $this->request = $request;
    }
    public function collection()
    {
        $query = Appointment::with('franchise.user');

        if ($this->request->franchise && $this->request->franchise !== 'All') {
            $query->where('franchise_id', $this->request->franchise);
        }

        if ($this->request->report_type && $this->request->report_type !== 'All') {
            $query->where('status', $this->request->report_type);
        }

        if ($this->request->date_range === 'Custom') {
            $query->whereBetween('created_at', [
                $this->request->start_date,
                $this->request->end_date
            ]);
        }

        // Add more filters as needed...

        return $query->get()->map(function ($appointment) {
            return [
                'Appointment ID' => $appointment->uniqueid,
                'Franchise' => $appointment->franchise->name ?? 'N/A',
                'Mobile' => $appointment->mobile,
                'City' => $appointment->city,
                'Pincode' => $appointment->pincode,
                'Status' => $this->statusMap[$appointment->status] ?? 'Unknown',
                'Created At' => $appointment->created_at->format('Y-m-d'),
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Appointment ID',
            'Franchise',
            'Mobile',
            'City',
            'Pincode',
            'Status',
            'Created At'
        ];
    }
}
