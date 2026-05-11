<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\PurchaseStatus;

class PurchaseStatusUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'store_key' => [
                'required',
                'string',
                'max:50',
            ],
            'purchase_no' => [
                'required',
                'string',
                'max:50',
            ],
            'public_token' => [
                'required',
                'string',
                'max:100',
            ],
            'status_code' => [
                'required',
                'string',
                Rule::in(array_keys(PurchaseStatus::STATUS_LABELS)),
            ],
            'message' => [
                'nullable',
                'string',
                'max:255',
            ],
            'expired_at' => [
                'nullable',
                'date',
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'store_key' => '店舗キー',
            'purchase_no' => '買取番号',
            'public_token' => '公開用トークン',
            'status_code' => '状況コード',
            'message' => '表示メッセージ',
            'expired_at' => '確認期限',
        ];
    }
}
