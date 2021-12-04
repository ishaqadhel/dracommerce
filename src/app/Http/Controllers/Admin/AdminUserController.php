<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role', User::ROLE_USER)->get();
        return view('admin.user.index', compact('users'));
    }

     /**
     * Edit one of the resource.
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        $cities = City::get();
        return view('admin.user.edit', compact(['user', 'cities']));
    }

     /**
     * Update an old created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_city' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'phone' => ['required', 'string', 'max:255'],
            'zip' => ['required', 'integer'],
            'status' => ['required', 'integer']
        ]);

        $user = User::findOrFail($id);

        try {
            DB::beginTransaction();

            $user->update([
                'id_city' => $request->id_city,
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'zip' => $request->zip,
                'status' => $request->status
            ]);

            DB::commit();
            return redirect()->route('admin.user.edit', ['id' => $user->id])->with('success', 'User berhasil di perbarui.');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()
                    ->route('admin.user.edit')
                    ->with('error', 'Ada kesalahan dalam sistem pada saat memperbarui user.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            User::destroy($id);
            DB::commit();
            return redirect()
                    ->route('admin.user.index')
                    ->with('success', 'Berhasil menghapus user.');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()
                    ->route('admin.user.index')
                    ->with('error', 'Ada kesalahan dalam sistem pada saat menghapus user.');
        }
    }
}
