<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('purchase_statuses', function (Blueprint $table) {
            $table->id();

            // 店舗識別
            $table->string('store_key', 50)->comment('店舗キー');

            // KPOS側の買取番号
            $table->string('purchase_no', 50)->comment('買取番号');

            // QRコードURLに使用する公開用トークン
            $table->string('public_token', 100)->comment('公開用トークン');

            // 状況
            $table->string('status_code', 50)->comment('状況コード');
            $table->string('status_label', 100)->comment('状況表示名');

            // お客様向け補足メッセージ
            $table->string('message', 255)->nullable()->comment('表示メッセージ');

            // 同期・有効期限
            $table->timestamp('last_synced_at')->nullable()->comment('最終同期日時');
            $table->timestamp('expired_at')->nullable()->comment('確認期限');

            $table->timestamps();

            // 同一店舗内の買取番号は一意
            $table->unique(['store_key', 'purchase_no'], 'uq_purchase_status_store_purchase');

            // QRコードからの検索用
            $table->unique('public_token', 'uq_purchase_status_public_token');

            // 店舗ごとの検索・管理用
            $table->index('store_key', 'idx_purchase_status_store_key');

            // 期限切れ削除などで使う
            $table->index('expired_at', 'idx_purchase_status_expired_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_statuses');
    }
};
