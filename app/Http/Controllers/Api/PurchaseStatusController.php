<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PurchaseStatusUpdateRequest;
use App\Models\PurchaseStatus;
use Illuminate\Http\JsonResponse;

class PurchaseStatusController extends Controller
{
    public function update(PurchaseStatusUpdateRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $statusCode = $validated['status_code'];

        $purchaseStatus = PurchaseStatus::firstOrNew([
            'store_key' => $validated['store_key'],
            'purchase_no' => $validated['purchase_no'],
        ]);

        if (!$purchaseStatus->exists) {
            $purchaseStatus->public_token = $validated['public_token'];
        }

        $purchaseStatus->status_code = $statusCode;
        $purchaseStatus->status_label = PurchaseStatus::getStatusLabel($statusCode);
        $purchaseStatus->message = $validated['message'] ?? null;
        $purchaseStatus->last_synced_at = now();
        $purchaseStatus->expired_at = $validated['expired_at'] ?? null;

        $purchaseStatus->save();

        return response()->json([
            'result' => true,
            'data' => [
                'id' => $purchaseStatus->id,
                'store_key' => $purchaseStatus->store_key,
                'purchase_no' => $purchaseStatus->purchase_no,
                'public_token' => $purchaseStatus->public_token,
                'status_code' => $purchaseStatus->status_code,
                'status_label' => $purchaseStatus->status_label,
                'last_synced_at' => optional($purchaseStatus->last_synced_at)->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
