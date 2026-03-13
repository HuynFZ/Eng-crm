<template>
  <div style="text-align: center; margin-top: 50px; font-family: sans-serif;">
    <h1>🚀 Eng-CRM Test Connection</h1>

    <button @click="checkConnection" style="padding: 10px 20px; cursor: pointer;">
      Kiểm tra kết nối Backend
    </button>

    <div v-if="loading" style="margin-top: 20px;">Đang kết nối...</div>

    <div v-if="data" style="margin-top: 20px; color: green; border: 1px solid green; padding: 10px; display: inline-block;">
      <p><strong>Thông báo:</strong> {{ data.message }}</p>
      <p><strong>Thời gian server:</strong> {{ data.server_time }}</p>
      <p><strong>Team members:</strong> {{ data.team.join(', ') }}</p>
    </div>

    <div v-if="error" style="margin-top: 20px; color: red;">
      ❌ Lỗi: {{ error }}
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const data = ref(null)
const loading = ref(false)
const error = ref(null)

const checkConnection = async () => {
  loading.value = true
  error.value = null
  data.value = null

  try {
    // Lưu ý: Port 8000 là port của php artisan serve
    const response = await fetch('http://127.0.0.1:8000/api/test-connection')
    if (!response.ok) throw new Error('Không thể kết nối Backend')

    const result = await response.json()
    data.value = result
  } catch (err) {
    error.value = err.message
  } finally {
    loading.value = false
  }
}
</script>