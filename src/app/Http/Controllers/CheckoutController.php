<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\City;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCart;
use App\Models\ProductOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = Cart::where('id_user', Auth::user()->id)->first();
        $user = User::findOrFail(Auth::user()->id);
        $cities = City::get();

        if(!$cart) {
            return redirect()
                ->route('index')
                ->with('error', 'Cart masih kosong.');
        }

        return view('checkout.index', compact(['cart', 'user', 'cities']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_city' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'phone' => ['required', 'string', 'max:255'],
            'zip' => ['required', 'integer'],
            'payment' => ['required'],
            'total' => ['required', 'integer']
        ]);

        $cart = Cart::where('id_user', auth()->user()->id)->first();
        
        if($request->note) {
            $note = $request->note;
        } else {
            $note = "-";
        }

        try {
            DB::beginTransaction();

            $order = Order::create([
                'id_user' => auth()->user()->id,
                'id_city' => $request->id_city,
                'id_payment_type' => $request->payment,
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'zip' => $request->zip,
                'note' => $note,
                'total' => $request->total,
                'status' => Order::STATUS_NOT_PAID
            ]);

            foreach($cart->productsCarts as $productCart) {
                ProductOrder::create([
                    'id_product' => $productCart->id_product,
                    'id_order' => $order->id,
                    'quantity' => $productCart->quantity,
                ]);

                $product = Product::where('id', $productCart->id_product)->first();
                
                $product->update([
                    'stock' => $product->stock - $productCart->quantity,
                ]);
            }

            ProductCart::where('id_cart', $cart->id)->delete();

            $cart->update([
                'total' => 0,
            ]);

            DB::commit();
            return redirect()->route('index')->with('success', 'Order berhasil dibuat.');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()
                    ->route('checkout.index')
                    ->with('error', 'Ada kesalahan dalam sistem pada saat membuat order.');
        }
    }

}