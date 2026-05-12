<script setup></script>

<template>
    <div class="top-page">
        <div class="top-card">
            <h1>買取状況確認ページ</h1>

            <p>
                買取番号札に印字されているQRコードを読み取って、
                現在の買取状況をご確認ください。
            </p>
        </div>
    </div>
</template>

<style scoped>
.top-page {
    min-height: 100vh;
    padding: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f5f7fb;
}

.top-card {
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
