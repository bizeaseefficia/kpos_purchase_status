<?php

namespace App\Http\Controllers;

use App\Models\PurchaseStatus;

use Inertia\Inertia;

class StatusController extends Controller
{
    public function show(string $token): Response
    {
        $purchaseStatus = PurchaseStatus::where('public_token', $token)->first();

        if (!$purchaseStatus) {
            return Inertia::render('PurchaseStatus/NotFound');
        }

        if ($purchaseStatus->isExpired()) {
            return Inertia::render('PurchaseStatus/Expired');
        }

        return Inertia::render('PurchaseStatus/Show', [
            'purchaseStatus' => [
                'purchase_no' => $purchaseStatus->purchase_no,
                'status_code' => $purchaseStatus->status_code,
                'status_label' => $purchaseStatus->status_label,
                'message' => $purchaseStatus->message,
                'last_synced_at' => optional($purchaseStatus->last_synced_at)->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
