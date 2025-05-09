<?php

namespace App\Exports;

use App\Models\Appointment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomerDatabaseExport implements FromCollection , WithHeadings   
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function collection()
    {
        $query = Appointment::query();

        if ($this->request->state && $this->request->state !== 'All') {
            $query->where('state', $this->request->state);
        }

        if ($this->request->city && $this->request->city !== 'All') {
            $query->where('city', $this->request->city);
        }

        if ($this->request->date_range && $this->request->date_range !== 'All') {
            switch ($this->request->date_range) {
                case 'Today':
                    $query->whereDate('created_at', today());
                    break;
                case 'This Week':
                    $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                    break;
                case 'This Month':
                    $query->whereMonth('created_at', now()->month);
                    break;
                case 'This Quarter':
                    $query->whereBetween('created_at', [now()->startOfQuarter(), now()->endOfQuarter()]);
                    break;
                case 'This Year':
                    $query->whereYear('created_at', now()->year);
                    break;
                case 'Custom':
                    $query->whereBetween('created_at', [
                        $this->request->start_date,
                        $this->request->end_date,
                    ]);
                    break;
            }
        }

        return $query->select('uniqueid', 'name', 'mobile', 'state', 'city', 'pincode', 'status')->get();
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
        ];
    }
}
