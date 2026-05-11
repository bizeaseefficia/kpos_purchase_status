<script setup>
const props = defineProps({
    appName: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <div class="page">
        <div class="card">
            <h1>{{ props.appName ?? "not name" }}</h1>
            <p>買取状況確認サイト</p>
        </div>
    </div>
</template>

<style scoped>
.page {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 24px;
    background: #f5f7fb;
}

.card {
    width: 100%;
    max-width: 480px;
    padding: 32px;
    border-radius: 12px;
    background: #ffffff;
    text-align: center;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
}

h1 {
    margin: 0 0 12px;
    font-size: 28px;
}

p {
    margin: 0;
    font-size: 16px;
    color: #666666;
}
</style>
