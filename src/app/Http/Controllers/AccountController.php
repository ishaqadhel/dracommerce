<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\City;
use App\Models\Product;
use App\Models\ProductCart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AccountController extends Controller
{
    public function edit()
    {
        $user = User::findOrFail(auth()->user()->id);
        $cities = City::get();
        return view('account.edit', compact(['user', 'cities']));
    }

    public function update(Request $request) 
    {
        $request->validate([
            'id_city' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'phone' => ['required', 'string', 'max:255'],
            'zip' => ['required', 'integer'],
        ]);

        $user = User::findOrFail(auth()->user()->id);

        try {
            DB::beginTransaction();

            $user->update([
                'id_city' => $request->id_city,
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'zip' => $request->zip,
            ]);

            DB::commit();
            return redirect()->route('account.edit')->with('success', 'Profil berhasil di perbarui.');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()
                    ->route('account.edit')
                    ->with('error', 'Ada kesalahan dalam sistem pada saat memperbarui profil.');
        }
    }
}