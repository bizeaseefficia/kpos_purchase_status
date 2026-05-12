<script setup>
defineProps({
    purchaseStatus: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <div class="purchase-status-page">
        <div class="purchase-status-card">
            <div class="purchase-status-header">
                <div class="purchase-status-subtitle">買取状況確認</div>
                <h1>受付番号 {{ purchaseStatus.purchase_no }}</h1>
            </div>

            <div class="status-box">
                <div class="status-label">現在の状況</div>
                <div class="status-value">
                    {{ purchaseStatus.status_label }}
                </div>
            </div>

            <p v-if="purchaseStatus.message" class="message">
                {{ purchaseStatus.message }}
            </p>

            <p v-if="purchaseStatus.last_synced_at" class="synced-at">
                最終更新：{{ purchaseStatus.last_synced_at }}
            </p>
        </div>
    </div>
</template>

<style scoped>
.purchase-status-page {
    min-height: 100vh;
    padding: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f5f7fb;
}

.purchase-status-card {
    width: 100%;
    max-width: 520px;
    padding: 28px;
    border-radius: 16px;
    background: #ffffff;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
}

.purchase-status-header {
    margin-bottom: 24px;
    text-align: center;
}

.purchase-status-subtitle {
    margin-bottom: 8px;
    font-size: 14px;
    color: #666666;
}

h1 {
    margin: 0;
    font-size: 26px;
    color: #222222;
}

.status-box {
    padding: 24px;
    border-radius: 14px;
    background: #f0f4ff;
    text-align: center;
}

.status-label {
    margin-bottom: 8px;
    font-size: 14px;
    color: #555555;
}

.status-value {
    font-size: 32px;
    font-weight: bold;
    color: #1f3a8a;
}

.message {
    margin: 24px 0 0;
    font-size: 16px;
    line-height: 1.8;
    color: #333333;
    text-align: center;
}

.note {
    margin: 24px 0 0;
    font-size: 13px;
    color: #777777;
    text-align: center;
}

.synced-at {
    margin: 12px 0 0;
    font-size: 12px;
    color: #999999;
    text-align: center;
}
</style>
