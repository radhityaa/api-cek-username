<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Game;
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
        $game = Game::where('slug', 'mobile-legends')->first();

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

        if ($result['errorCode'] || !$result['success']) {
            return response()->json([
                'success' => false,
                'message' => 'User Not Found!',
            ]);
        }

        History::create([
            'user_id' => $user->id,
            'game_id' => $game->id,
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

    public function freeFire(Request $request)
    {
        $apiKey = $request->header('API-KEY');
        $apiId = $request->header('API-ID');

        $user = User::where('api_key', $apiKey)->where('api_id', $apiId)->first();
        $game = Game::where('slug', 'free-fire')->first();

        $playerId = $request->playerId;

        $endpoint = getEndpoint();
        $body = [
            'voucherPricePoint.id' => 8050,
            'voucherPricePoint.price' => 1000,
            'voucherPricePoint.variablePrice' => 0,
            'user.userId' => $playerId,
            'voucherTypeName' => 'FREEFIRE',
            'shopLang' => 'id_ID',
            'voucherTypeId' => 1,
            'gvtId' => 1,
        ];

        $response = Http::asForm()->post($endpoint, $body);
        $result = $response->json();

        if ($result['errorMsg'] === 'Invalid user ID') {
            return response()->json([
                'success' => false,
                'message' => 'User Not Found!',
            ]);
        } else {
            if (!$result['success']) {
                return response()->json([
                    'success' => false,
                    'message' => 'User Not Found!',
                ]);
            }

            History::create([
                'user_id' => $user->id,
                'game_id' => $game->id,
                'playerId' => $playerId,
                'username' => $result['confirmationFields']['username'],
            ]);

            return response()->json([
                'success' => true,
                'message' => 'User Has Been Obtained',
                'data' => [
                    'game' => $result['confirmationFields']['productName'],
                    'country' => $result['confirmationFields']['country'],
                    'playerId' => $playerId,
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

    public function Aov(Request $request)
    {
        $apiKey = $request->header('API-KEY');
        $apiId = $request->header('API-ID');

        $user = User::where('api_key', $apiKey)->where('api_id', $apiId)->first();
        $game = Game::where('slug', 'arena-of-valor')->first();

        $playerId = $request->playerId;

        $endpoint = getEndpoint();
        $body = [
            'voucherPricePoint.id' => 7946,
            'voucherPricePoint.price' => 10000,
            'voucherPricePoint.variablePrice' => 0,
            'user.userId' => $playerId,
            'voucherTypeName' => 'AOV',
            'shopLang' => 'id_ID',
            'voucherTypeId' => 1,
            'gvtId' => 1,
        ];

        $response = Http::asForm()->post($endpoint, $body);
        $result = $response->json();

        if ($result['errorMsg'] === 'Invalid user ID') {
            return response()->json([
                'success' => false,
                'message' => 'User Not Found!',
            ]);
        } else {
            if (!$result['success']) {
                return response()->json([
                    'success' => false,
                    'message' => 'User Not Found!',
                ]);
            }

            History::create([
                'user_id' => $user->id,
                'game_id' => $game->id,
                'playerId' => $playerId,
                'username' => $result['confirmationFields']['username'],
            ]);

            return response()->json([
                'success' => true,
                'message' => 'User Has Been Obtained',
                'data' => [
                    'game' => $result['confirmationFields']['productName'],
                    'country' => $result['confirmationFields']['country'],
                    'playerId' => $playerId,
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

    public function Valorant(Request $request)
    {
        $apiKey = $request->header('API-KEY');
        $apiId = $request->header('API-ID');

        $user = User::where('api_key', $apiKey)->where('api_id', $apiId)->first();
        $game = Game::where('slug', 'valorant')->first();

        $playerId = $request->playerId;

        $endpoint = getEndpoint();
        $body = [
            'voucherPricePoint.id' => 973634,
            'voucherPricePoint.price' => 56000,
            'voucherPricePoint.variablePrice' => 0,
            'user.userId' => $playerId,
            'voucherTypeName' => 'VALORANT',
            'shopLang' => 'id_ID',
            'voucherTypeId' => 109,
            'gvtId' => 139,
        ];

        $response = Http::asForm()->post($endpoint, $body);
        $result = $response->json();

        if ($result['errorMsg'] === 'Invalid user ID') {
            return response()->json([
                'success' => false,
                'message' => 'User Not Found!',
            ]);
        } else {
            if (!$result['success']) {
                return response()->json([
                    'success' => false,
                    'message' => 'User Not Found!',
                ]);
            }

            History::create([
                'user_id' => $user->id,
                'game_id' => $game->id,
                'playerId' => $playerId,
                'username' => $result['confirmationFields']['username'],
            ]);

            return response()->json([
                'success' => true,
                'message' => 'User Has Been Obtained',
                'data' => [
                    'game' => $result['confirmationFields']['productName'],
                    'country' => $result['confirmationFields']['country'],
                    'playerId' => $playerId,
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

    public function Cod(Request $request)
    {
        $apiKey = $request->header('API-KEY');
        $apiId = $request->header('API-ID');

        $user = User::where('api_key', $apiKey)->where('api_id', $apiId)->first();
        $game = Game::where('slug', 'call-of-duty-mobile')->first();

        $playerId = $request->playerId;

        $endpoint = getEndpoint();
        $body = [
            'voucherPricePoint.id' => 46114,
            'voucherPricePoint.price' => 5000,
            'voucherPricePoint.variablePrice' => 0,
            'user.userId' => $playerId,
            'voucherTypeName' => 'CALL_OF_DUTY',
            'shopLang' => 'id_ID',
            'voucherTypeId' => 1,
            'gvtId' => 1,
        ];

        $response = Http::asForm()->post($endpoint, $body);
        $result = $response->json();

        if ($result['errorMsg'] === 'Invalid user ID') {
            return response()->json([
                'success' => false,
                'message' => 'User Not Found!',
            ]);
        } else {
            if (!$result['success']) {
                return response()->json([
                    'success' => false,
                    'message' => 'User Not Found!',
                ]);
            }

            History::create([
                'user_id' => $user->id,
                'game_id' => $game->id,
                'playerId' => $playerId,
                'username' => $result['confirmationFields']['roles'][0]['role'],
            ]);

            return response()->json([
                'success' => true,
                'message' => 'User Has Been Obtained',
                'data' => [
                    'game' => $result['confirmationFields']['productName'],
                    'country' => $result['confirmationFields']['country'],
                    'playerId' => $playerId,
                    'username' => $result['confirmationFields']['roles'][0]['role'],
                    'userRequest' => [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email
                    ],
                ]
            ]);
        }
    }

    public function Pb(Request $request)
    {
        $apiKey = $request->header('API-KEY');
        $apiId = $request->header('API-ID');

        $user = User::where('api_key', $apiKey)->where('api_id', $apiId)->first();
        $game = Game::where('slug', 'point-blank')->first();

        $playerId = $request->playerId;

        $endpoint = getEndpoint();
        $body = [
            'voucherPricePoint.id' => 54700,
            'voucherPricePoint.price' => 11000,
            'voucherPricePoint.variablePrice' => 0,
            'user.userId' => $playerId,
            'voucherTypeName' => 'POINT_BLANK',
            'shopLang' => 'id_ID',
        ];

        $response = Http::asForm()->post($endpoint, $body);
        $result = $response->json();

        if ($result['errorMsg'] === 'Invalid user ID') {
            return response()->json([
                'success' => false,
                'message' => 'User Not Found!',
            ]);
        } else {
            if (!$result['success']) {
                return response()->json([
                    'success' => false,
                    'message' => 'User Not Found!',
                ]);
            }

            History::create([
                'user_id' => $user->id,
                'game_id' => $game->id,
                'playerId' => $playerId,
                'username' => $result['confirmationFields']['username'],
            ]);

            return response()->json([
                'success' => true,
                'message' => 'User Has Been Obtained',
                'data' => [
                    'game' => $result['confirmationFields']['productName'],
                    'country' => $result['confirmationFields']['country'],
                    'playerId' => $playerId,
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

    public function Sus(Request $request)
    {
        $apiKey = $request->header('API-KEY');
        $apiId = $request->header('API-ID');

        $user = User::where('api_key', $apiKey)->where('api_id', $apiId)->first();
        $game = Game::where('slug', 'super-sus')->first();

        $playerId = $request->playerId;

        $endpoint = getEndpoint();
        $body = [
            'voucherPricePoint.id' => 266077,
            'voucherPricePoint.price' => 13000,
            'voucherPricePoint.variablePrice' => 0,
            'user.userId' => $playerId,
            'voucherTypeName' => 'SUPER_SUS',
            'shopLang' => 'id_ID',
        ];

        $response = Http::asForm()->post($endpoint, $body);
        $result = $response->json();

        if ($result['errorMsg'] === 'Invalid user ID') {
            return response()->json([
                'success' => false,
                'message' => 'User Not Found!',
            ]);
        } else {
            if (!$result['success']) {
                return response()->json([
                    'success' => false,
                    'message' => 'User Not Found!',
                ]);
            }

            History::create([
                'user_id' => $user->id,
                'game_id' => $game->id,
                'playerId' => $playerId,
                'username' => $result['confirmationFields']['username'],
            ]);

            return response()->json([
                'success' => true,
                'message' => 'User Has Been Obtained',
                'data' => [
                    'game' => $result['confirmationFields']['productName'],
                    'country' => $result['confirmationFields']['country'],
                    'playerId' => $playerId,
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
}
