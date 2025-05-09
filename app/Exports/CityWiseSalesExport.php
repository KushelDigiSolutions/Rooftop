<?php

namespace App\Exports;

use App\Models\Appointment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CityWiseSalesExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $request;
    public function __construct($request)
    {
        $this->request = $request;
    }
    public function collection()
    {
        $statusMap = [
            1 => 'Pending',
            2 => 'Processing',
            3 => 'Hold',
            4 => 'Completed',
        ];

        $query = Appointment::query();

        if ($this->request->state && $this->request->state !== 'All') {
            $query->where('state', $this->request->state);
        }

        if ($this->request->city && $this->request->city !== 'All') {
            $query->where('city', $this->request->city);
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

        return $query->get()->map(function ($appointment) use ($statusMap) {
            return [
                'Appointment ID' => $appointment->uniqueid,
                'Name' => $appointment->name,
                'Mobile' => $appointment->mobile,
                'State' => $appointment->state,
                'City' => $appointment->city,
                'Pincode' => $appointment->pincode,
                'Status' => $statusMap[$appointment->status] ?? 'Unknown',
                'Created At' => $appointment->created_at->format('Y-m-d'),
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Appointment ID',
            'Name',
            'Mobile',
            'State',
            'City',
            'Pincode',
            'Status',
            'Created At',
        ];
    }
}
