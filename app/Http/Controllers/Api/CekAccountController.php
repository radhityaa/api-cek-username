<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class CekAccountController extends Controller
{
    public function mobileLegends(Request $request)
    {
        $apiKey = $request->header('API-KEY');
        $apiId = $request->header('API-ID');

        $user = User::where('api_key', $apiKey)->where('api_id', $apiId)->first();

        $playerId = $request->playerId;
        $zone = $request->zone;

        $endpoint = getEndpoint();
        $body = [
            'voucherPricePoint.id' => 4150,
            'voucherPricePoint.price' => 1579,
            'voucherPricePoint.variablePrice' => 0,
            'user.userId' => $playerId,
            'user.zoneId' => $zone,
            'voucherTypeName' => 'MOBILE_LEGENDS',
            'shopLang' => 'id_ID',
            'voucherTypeId' => 1,
            'gvtId' => 1,
        ];

        $response = Http::asForm()->post($endpoint, $body);
        $result = $response->json();

        if (!$result['success']) {
            return response()->json([
                'success' => false,
                'message' => 'User Not Found!',
            ]);
        }

        History::create([
            'user_id' => $user->id,
            'game' => $result['confirmationFields']['productName'],
            'playerId' => $playerId,
            'zone' => $zone,
            'username' => $result['confirmationFields']['username'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'User Has Been Obtained',
            'data' => [
                'game' => $result['confirmationFields']['productName'],
                'country' => $result['confirmationFields']['country'],
                'playerId' => $playerId,
                'zone' => $zone,
                'username' => $result['confirmationFields']['username'],
                'userRequest' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email
                ],
            ]
        ]);
    }
}
