<template>
  <div class="min-h-screen bg-gray-50 flex items-center justify-center p-4">
    <div class="bg-white p-10 rounded-3xl shadow-2xl w-full max-w-md border border-gray-100">
      <div class="text-center mb-10">
        <h1 class="text-4xl font-black text-gray-900 tracking-tighter">
          Talemy<span class="text-orange-500">Edu</span>
        </h1>
        <p class="text-gray-400 mt-3 font-medium text-sm">Hệ thống quản trị đào tạo 1-1</p>
      </div>

      <form @submit.prevent="handleLogin" class="space-y-6">
        <div>
          <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Tài khoản</label>
          <input v-model="form.email" type="email" placeholder="teacher@talemy.vn" required
                 class="w-full px-5 py-4 rounded-2xl bg-gray-50 border border-gray-200 focus:ring-2 focus:ring-orange-500 focus:bg-white outline-none transition-all duration-200" />
        </div>
        <div>
          <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Mật khẩu</label>
          <input v-model="form.password" type="password" placeholder="••••••••" required
                 class="w-full px-5 py-4 rounded-2xl bg-gray-50 border border-gray-200 focus:ring-2 focus:ring-orange-500 focus:bg-white outline-none transition-all duration-200" />
        </div>
        <button type="submit" :disabled="loading"
                class="w-full bg-black hover:bg-orange-600 disabled:bg-gray-400 text-white font-black py-4 rounded-2xl shadow-lg transition-all duration-300 transform active:scale-95">
          {{ loading ? 'ĐANG XỬ LÝ...' : 'ĐĂNG NHẬP' }}
        </button>
      </form>
    </div>
  </div>
</template>

<script setup>
import { reactive, ref } from 'vue'

const emit = defineEmits(['login-success'])
const loading = ref(false)
const form = reactive({ email: '', password: '' })

const testAccounts = [
  { email: 'admin@talemy.vn', pass: '12345678', role: 'Admin' },
  { email: 'teacher@talemy.vn', pass: '12345678', role: 'Teacher' }
]

const handleLogin = () => {
  loading.value = true
  setTimeout(() => {
    const user = testAccounts.find(u => u.email === form.email && u.pass === form.password)
    if (user) {
      emit('login-success', user)
    } else {
      alert("Sai tài khoản hoặc mật khẩu!")
    }
    loading.value = false
  }, 800)
}
</script>