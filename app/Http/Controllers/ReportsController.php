<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Appointment;
use App\Models\Franchise;
use App\Models\MasterCity;
use App\Models\Order;
use App\Models\Quotation;
use App\Models\QuotationItem;
use App\Models\QuotationSection;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;
use App\Models\ZipCode;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FranchiseWiseSalesExport;
use App\Exports\CityWiseSalesExport;
use App\Exports\CustomerDatabaseExport;
use App\Exports\OrderReportExport;

class ReportsController extends Controller
{
    public function cityWiseSales(Request $request)
    {
        // dd($request->all());
        // Get filter parameters
        $state = $request->input('state', 'All');
        $city = $request->input('city', 'All');
        $reportType = $request->input('report_type', 'All');
        $dateRange = $request->input('date_range', 'All');
        $customStartDate = $request->input('start_date');
        $customEndDate = $request->input('end_date');

        // Get list of states and cities (optional for dropdowns)
        $states = ZipCode::select('state')->distinct()->pluck('state');
        $cities = ZipCode::select('city')->distinct()->pluck('city');
        // dd($cities);

        // Build the appointments query with filters
        $appointmentsQuery = Appointment::where('status', '!=', '0')
            ->whereNotNull('city')
            ->whereNotNull('state');

        $franchisesQuery = Franchise::whereNotNull('city')->whereNotNull('state');

        // Apply state filter
        if ($state !== 'All') {
            $appointmentsQuery->where('state', $state);
            $franchisesQuery->where('state', $state);
        }

        // Apply city filter
        if ($city !== 'All') {
            $appointmentsQuery->where('city', $city);
            $franchisesQuery->where('city', $city);
        }

        // Apply status filter
        if ($reportType !== 'All') {
            $appointmentsQuery->where('status', $reportType);
        }

        // Apply date range filter
        if ($dateRange !== 'All') {
            switch ($dateRange) {
                case 'Today':
                    $appointmentsQuery->whereDate('created_at', Carbon::today());
                    $franchisesQuery->whereDate('created_at', Carbon::today());
                    break;
                case 'This Week':
                    $appointmentsQuery->whereBetween('created_at', [
                        Carbon::now()->startOfWeek(),
                        Carbon::now()->endOfWeek()
                    ]);
                    $franchisesQuery->whereBetween('created_at', [
                        Carbon::now()->startOfWeek(),
                        Carbon::now()->endOfWeek()
                    ]);
                    break;
                case 'This Month':
                    $appointmentsQuery->whereBetween('created_at', [
                        Carbon::now()->startOfMonth(),
                        Carbon::now()->endOfMonth()
                    ]);
                    $franchisesQuery->whereBetween('created_at', [
                        Carbon::now()->startOfMonth(),
                        Carbon::now()->endOfMonth()
                    ]);
                    break;
                case 'This Quarter':
                    $appointmentsQuery->whereBetween('created_at', [
                        Carbon::now()->startOfQuarter(),
                        Carbon::now()->endOfQuarter()
                    ]);
                    $franchisesQuery->whereBetween('created_at', [
                        Carbon::now()->startOfQuarter(),
                        Carbon::now()->endOfQuarter()
                    ]);
                    break;
                case 'This Year':
                    $appointmentsQuery->whereBetween('created_at', [
                        Carbon::now()->startOfYear(),
                        Carbon::now()->endOfYear()
                    ]);
                    $franchisesQuery->whereBetween('created_at', [
                        Carbon::now()->startOfYear(),
                        Carbon::now()->endOfYear()
                    ]);
                    break;
                case 'Custom':
                    if ($customStartDate && $customEndDate) {
                        $appointmentsQuery->whereBetween('created_at', [
                            Carbon::parse($customStartDate)->startOfDay(),
                            Carbon::parse($customEndDate)->endOfDay()
                        ]);
                        $franchisesQuery->whereBetween('created_at', [
                            Carbon::parse($customStartDate)->startOfDay(),
                            Carbon::parse($customEndDate)->endOfDay()
                        ]);
                    }
                    break;
            }
        }

        // Get filtered appointments
        $appointments = $appointmentsQuery->get();

        // Get metrics
        $appointmentIds = $appointments->pluck('id');
        $quotationIds = Order::whereIn('appointment_id', $appointmentIds)->pluck('quotation_id')->unique();

        $totalAppointments = $appointments->count();
        $totalSales = Order::whereIn('appointment_id', $appointmentIds)->sum('order_value');
        $totalProductsSold = QuotationItem::whereIn('quotation_id', $quotationIds)->sum('qty');
        $totalOrders = Order::whereIn('appointment_id', $appointmentIds)->count();
        $totalCompletedOrders = Order::whereIn('appointment_id', $appointmentIds)
            ->where('status', '2')->count();

        $totalFranchises =  $franchisesQuery->count();

        return view("admin.reports.city_wise_sales", compact(
            'states',
            'cities',
            'appointments',
            'totalAppointments',
            'totalFranchises',
            'totalSales',
            'totalProductsSold',
            'totalOrders',
            'totalCompletedOrders'
        ));
    }


    public function customerDatabase(Request $request)
{
    // Get filter parameters
    $state = $request->input('state', 'All');
    $city = $request->input('city', 'All');
    $dateRange = $request->input('date_range', 'All');
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    // Base query for appointments
    $query = Appointment::where('status', '!=', '0');
    $states = ZipCode::select('state')->distinct()->pluck('state');
    $cities = ZipCode::select('city')->distinct()->pluck('city');
    // Apply state filter
    if ($state !== 'All') {
        $query->where('state', $state);
    }

    // Apply city filter
    if ($city !== 'All') {
        $query->where('city', $city);
    }

    // Apply date range filter
    if ($dateRange !== 'All') {
        if ($dateRange === 'Custom' && $startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        } else {
            switch ($dateRange) {
                case 'Today':
                    $query->whereDate('created_at', Carbon::today());
                    break;
                case 'This Week':
                    $query->whereBetween('created_at', [
                        Carbon::now()->startOfWeek(),
                        Carbon::now()->endOfWeek()
                    ]);
                    break;
                case 'This Month':
                    $query->whereMonth('created_at', Carbon::now()->month)
                          ->whereYear('created_at', Carbon::now()->year);
                    break;
                case 'This Quarter':
                    $query->whereBetween('created_at', [
                        Carbon::now()->startOfQuarter(),
                        Carbon::now()->endOfQuarter()
                    ]);
                    break;
                case 'This Year':
                    $query->whereYear('created_at', Carbon::now()->year);
                    break;
            }
        }
    }

    // Fetch filtered appointments
    $appointments = $query->get();

    // Fetch franchises (unaffected by filters)
    $franchises = Franchise::all();

    // Calculate summary metrics
    $totalAppointments = $appointments->count();

    // Unique State and City counts after filtering
    $totalStates = $appointments->pluck('state')->filter()->unique()->count();
    $totalCities = $appointments->pluck('city')->filter()->unique()->count();

    return view('admin.reports.customer_database', compact(
        'states',
        'cities',
        'franchises',
        'appointments',
        'totalAppointments',
        'totalStates',
        'totalCities'
    ));
}


    public function franchiseWiseSales(Request $request)
    {
        // Get filter parameters
        $franchiseId = $request->input('franchise', 'All');
        $reportType = $request->input('report_type', 'All');
        $dateRange = $request->input('date_range', 'All');
        $customStartDate = $request->input('start_date');
        $customEndDate = $request->input('end_date');

        // Fetch all franchises
        $franchises = Franchise::all();

        // Build the appointments query with filters
        $appointmentsQuery = Appointment::where('status', '!=', '0')
            ->whereNotNull('franchise_id')
            ->where('franchise_id', '!=', '');

        // Apply franchise filter
        if ($franchiseId !== 'All') {
            $appointmentsQuery->where('franchise_id', $franchiseId);
        }

        // Apply status filter
        if ($reportType !== 'All') {
            $appointmentsQuery->where('status', $reportType);
        }

        // Apply date range filter
        if ($dateRange !== 'All') {
            switch ($dateRange) {
                case 'Today':
                    $appointmentsQuery->whereDate('created_at', Carbon::today());
                    break;
                case 'This Week':
                    $appointmentsQuery->whereBetween('created_at', [
                        Carbon::now()->startOfWeek(),
                        Carbon::now()->endOfWeek()
                    ]);
                    break;
                case 'This Month':
                    $appointmentsQuery->whereBetween('created_at', [
                        Carbon::now()->startOfMonth(),
                        Carbon::now()->endOfMonth()
                    ]);
                    break;
                case 'This Quarter':
                    $appointmentsQuery->whereBetween('created_at', [
                        Carbon::now()->startOfQuarter(),
                        Carbon::now()->endOfQuarter()
                    ]);
                    break;
                case 'This Year':
                    $appointmentsQuery->whereBetween('created_at', [
                        Carbon::now()->startOfYear(),
                        Carbon::now()->endOfYear()
                    ]);
                    break;
                case 'Custom':
                    if ($customStartDate && $customEndDate) {
                        $appointmentsQuery->whereBetween('created_at', [
                            Carbon::parse($customStartDate)->startOfDay(),
                            Carbon::parse($customEndDate)->endOfDay()
                        ]);
                    }
                    break;
            }
        }

        // Execute the appointments query
        $appointments = $appointmentsQuery->get();

        // Fetch related data for metrics
        $quotationIds = Order::whereIn('appointment_id', $appointments->pluck('id'))->pluck('quotation_id')->unique();
        $totalAppointments = $appointments->count();
        $totalSales = Order::whereIn('appointment_id', $appointments->pluck('id'))->sum('order_value');
        $totalProductsSold = QuotationItem::whereIn('quotation_id', $quotationIds)->sum('qty');
        $totalOrders = Order::whereIn('appointment_id', $appointments->pluck('id'))->count();
        $totalCompletedOrders = Order::whereIn('appointment_id', $appointments->pluck('id'))
            ->where('status', '2')
            ->count();

        // Pass data to the view
        return view("admin.reports.franchise_wise_sales", compact(
            'franchises',
            'appointments',
            'totalAppointments',
            'totalSales',
            'totalProductsSold',
            'totalOrders',
            'totalCompletedOrders'
        ));
    }

    public function orderReports(Request $request)
    {
        // Get filter parameters
        $city = $request->input('city', 'All');
        $status = $request->input('status', 'All');
        $dateRange = $request->input('date_range', 'All');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Base query for appointments
        $cities = ZipCode::select('city')->distinct()->pluck('city');
        $query = Appointment::whereIn('id', Order::pluck('appointment_id')->unique())
            ->where('status', '!=', '0');

        // Apply city filter
        if ($city !== 'All') {
            $query->where('city', $city);
        }

        // Apply status filter
        if ($status !== 'All') {
            $query->where('status', $status);
        }

        // Apply date range filter
        if ($dateRange !== 'All') {
            if ($dateRange === 'Custom' && $startDate && $endDate) {
                $query->whereBetween('created_at', [$startDate, $endDate]);
            } else {
                switch ($dateRange) {
                    case 'Today':
                        $query->whereDate('created_at', Carbon::today());
                        break;
                    case 'This Week':
                        $query->whereBetween('created_at', [
                            Carbon::now()->startOfWeek(),
                            Carbon::now()->endOfWeek()
                        ]);
                        break;
                    case 'This Month':
                        $query->whereMonth('created_at', Carbon::now()->month)
                              ->whereYear('created_at', Carbon::now()->year);
                        break;
                    case 'This Quarter':
                        $query->whereBetween('created_at', [
                            Carbon::now()->startOfQuarter(),
                            Carbon::now()->endOfQuarter()
                        ]);
                        break;
                    case 'This Year':
                        $query->whereYear('created_at', Carbon::now()->year);
                        break;
                }
            }
        }

        // Fetch filtered appointments
        $appointments = $query->get();

        // Calculate summary metrics
        $ordersQuery = Order::query();
        if ($city !== 'All' || $status !== 'All' || $dateRange !== 'All') {
            $appointmentIds = $appointments->pluck('id');
            $ordersQuery->whereIn('appointment_id', $appointmentIds);
        }

        $totalSales = $ordersQuery->sum('order_value');
        $totalProductsSold = QuotationItem::whereIn('quotation_id', $ordersQuery->pluck('quotation_id'))
            ->sum('qty');
        $totalOrders = $ordersQuery->count();
        $totalCompletedOrders = $ordersQuery->where('status', '2')->count();

        return view('admin.reports.order_reports', compact(
            'cities',
            'appointments',
            'totalSales',
            'totalProductsSold',
            'totalOrders',
            'totalCompletedOrders'
        ));
    }

    public function exportFranchiseWiseSales(Request $request)
    {
        return Excel::download(new FranchiseWiseSalesExport($request), 'franchise-wise-sales.csv');
    }

    public function exportCityWiseSales(Request $request)
    {
        return Excel::download(new CityWiseSalesExport($request), 'city_wise_sales.csv');
    }

    public function exportCustomerDatabase(Request $request)
    {
        return Excel::download(new CustomerDatabaseExport($request), 'customer-database.csv');
    }

    public function exportOrder(Request $request){
        return Excel::download(new OrderReportExport($request), 'order-reports.csv');
    }

}
