<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::get();
        return view('admin.order.index', compact('orders'));
    }

    /**
     * Edit one of the resource.
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.order.edit', compact(['order']));
    }

      /**
     * Update an old created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => ['required', 'integer'],
        ]);

        $order = Order::findOrFail($id);

        try {
            DB::beginTransaction();

            $order->update([
                'status' => $request->status
            ]);

            DB::commit();
            return redirect()->route('admin.order.edit', ['id' => $id])->with('success', 'Order berhasil di perbarui.');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()
                    ->route('admin.order.index')
                    ->with('error', 'Ada kesalahan dalam sistem pada saat memperbarui Order.');
        }
    }
}