<?php

namespace App\Exports;

use App\Models\Appointment;
use App\Models\Order;
use App\Models\QuotationItem;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderReportExport implements FromCollection, WithHeadings
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
        $city = $this->request->city ?? 'All';
        $status = $this->request->status ?? 'All';
        $dateRange = $this->request->date_range ?? 'All';
        $startDate = $this->request->start_date;
        $endDate = $this->request->end_date;
    
        $query = Appointment::whereIn('id', Order::pluck('appointment_id')->unique())
            ->where('status', '!=', '0');
    
        if ($city !== 'All') {
            $query->where('city', $city);
        }
    
        if ($status !== 'All') {
            $query->where('status', $status);
        }
    
        if ($dateRange === 'Custom' && $startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        } elseif ($dateRange !== 'All') {
            switch ($dateRange) {
                case 'Today':
                    $query->whereDate('created_at', now());
                    break;
                case 'This Week':
                    $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                    break;
                case 'This Month':
                    $query->whereMonth('created_at', now()->month)->whereYear('created_at', now()->year);
                    break;
                case 'This Quarter':
                    $query->whereBetween('created_at', [now()->startOfQuarter(), now()->endOfQuarter()]);
                    break;
                case 'This Year':
                    $query->whereYear('created_at', now()->year);
                    break;
            }
        }
    
        return $query->get()->map(function ($appointment) {
            return [
                'Appointment ID' => $appointment->uniqueid,
                'Name' => $appointment->name,
                'Mobile' => $appointment->mobile,
                'State' => $appointment->state ?? 'N/A',
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
            'Name',
            'Mobile',
            'State',
            'City',
            'Pincode',
            'Status',
            'Created At'
        ];
    }
}
