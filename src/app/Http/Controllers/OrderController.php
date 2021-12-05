<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::where('id_user', auth()->user()->id)->get();
        return view('order.index', compact('orders'));
    }

    public function cancel(Request $request) {
        $order = Order::findOrFail($request->id_order);

        try {
            DB::beginTransaction();

            $order->update([
                'status' => Order::STATUS_CANCELED,
            ]);

            DB::commit();
            return redirect()->route('order.index')->with('success', 'Order berhasil dibatalkan.');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()
                    ->route('index')
                    ->with('error', 'Ada kesalahan dalam sistem pada saat membatalkan order.');
        }
    }
}