<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseStatus extends Model
{
    protected $fillable = [
        'store_key',
        'purchase_no',
        'public_token',
        'status_code',
        'status_label',
        'message',
        'last_synced_at',
        'expired_at',
    ];

    protected $casts = [
        'last_synced_at' => 'datetime',
        'expired_at' => 'datetime',
    ];

    public const STATUS_WAITING = 'waiting';
    public const STATUS_CHECKING = 'checking';
    public const STATUS_COMPLETED = 'completed';
    public const STATUS_CALLED = 'called';
    public const STATUS_CLOSED = 'closed';
    public const STATUS_CANCELLED = 'cancelled';

    public const STATUS_LABELS = [
        self::STATUS_WAITING => '受付済み',
        self::STATUS_CHECKING => '査定中',
        self::STATUS_COMPLETED => '査定完了',
        self::STATUS_CALLED => '呼び出し中',
        self::STATUS_CLOSED => 'お取引完了',
        self::STATUS_CANCELLED => 'キャンセル',
    ];

    public static function getStatusLabel(string $statusCode): string
    {
        return self::STATUS_LABELS[$statusCode] ?? '不明';
    }

    public function isExpired(): bool
    {
        return $this->expired_at !== null
            && now()->greaterThan($this->expired_at);
    }
}
