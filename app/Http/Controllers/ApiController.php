<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function setting(Request $request)
    {
        $title = 'Setting API';

        return view('api.setting', compact('title'));
    }

    public function generate(Request $request)
    {
        $apiKey = Str::random(32);
        $apiId = Str::random(10);
        $user = User::find(Auth::user()->id);

        DB::beginTransaction();
        try {
            $user->update([
                'api_key' => $apiKey,
                'api_id' => $apiId
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Berhasil Digenerate',
                'data' => [
                    'api_key' => $apiKey,
                    'api_id' => $apiId
                ]
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Gagal Digenerate',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function documentation()
    {
        $title = 'API Dokumentasi';

        return view('api.documentation', compact('title'));
    }
}
