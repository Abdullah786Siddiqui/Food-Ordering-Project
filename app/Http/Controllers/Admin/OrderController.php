<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Paginated orders for display
        $orders = Order::with('items', 'address', 'payment', 'user', 'restaurant')->paginate(20);

        // Aggregated stats
        $totalOrders = Order::count();
        $ordersToday = Order::whereDate('created_at', Carbon::today())->count();
        $ordersThisMonth = Order::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->count();

        $pendingOrders = Order::where('status', 'pending')->count();
        $deliveredOrders = Order::where('status', 'delivered')->count();
        $cancelledOrders = Order::where('status', 'cancelled')->count();

        // Revenue: delivered orders sum
        $totalRevenue = (float) Order::where('status', 'delivered')->sum('total_amount');
        $revenueThisMonth = (float) Order::where('status', 'delivered')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('total_amount');

        // $avgOrderValue = (float) Order::avg('total_amount') ?? 0;

        // $ordersByStatus = Order::select('status', DB::raw('count(*) as total'))->groupBy('status')->pluck('total', 'status');

        return view('Admin.orders', compact(
            'orders',
            'totalOrders',
            'ordersToday',
            'ordersThisMonth',
            'pendingOrders',
            'deliveredOrders',
            'cancelledOrders',
            'totalRevenue',
            'revenueThisMonth',
        ));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
