<script setup></script>

<template>
    <div class="page">
        <div class="card">
            <h1>確認情報が見つかりません</h1>
            <p>
                QRコードが正しく読み取れていないか、確認情報が登録されていない可能性があります。
                詳細は店舗スタッフまで確認してください。
            </p>
        </div>
    </div>
</template>

<style scoped>
.page {
    min-height: 100vh;
    padding: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f5f7fb;
}

.card {
    width: 100%;
    max-width: 520px;
    padding: 28px;
    border-radius: 16px;
    background: #ffffff;
    text-align: center;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
}

h1 {
    margin: 0 0 16px;
    font-size: 24px;
    color: #222222;
}

p {
    margin: 0;
    font-size: 15px;
    line-height: 1.8;
    color: #555555;
}
</style>
