<template>
  <div class="min-h-screen bg-gray-50 flex items-center justify-center p-4 font-sans">

    <div v-if="!userLoggedIn" class="bg-white p-10 rounded-3xl shadow-2xl w-full max-w-md border border-gray-100">
      <div class="text-center mb-10">
        <h1 class="text-4xl font-black text-gray-900 tracking-tighter">
          Talemy<span class="text-orange-500">Edu</span>
        </h1>
        <p class="text-gray-400 mt-3 font-medium text-sm">Quản trị đào tạo 1-1 chuyên sâu</p>
      </div>

      <form @submit.prevent="handleLogin" class="space-y-6">
        <div>
          <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Tài khoản</label>
          <input v-model="form.email" type="email" placeholder="admin@talemy.vn" required
                 class="w-full px-5 py-4 rounded-2xl bg-gray-50 border border-gray-200 focus:ring-2 focus:ring-orange-500 focus:bg-white outline-none transition-all duration-200" />
        </div>

        <div>
          <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Mật khẩu</label>
          <input v-model="form.password" type="password" placeholder="••••••••" required
                 class="w-full px-5 py-4 rounded-2xl bg-gray-50 border border-gray-200 focus:ring-2 focus:ring-orange-500 focus:bg-white outline-none transition-all duration-200" />
        </div>

        <button type="submit" :disabled="loading"
                class="w-full bg-black hover:bg-orange-600 disabled:bg-gray-400 text-white font-black py-4 rounded-2xl shadow-lg shadow-gray-200 transition-all duration-300 transform active:scale-95">
          {{ loading ? 'ĐANG XỬ LÝ...' : 'ĐĂNG NHẬP' }}
        </button>
      </form>
    </div>

    <div v-else class="bg-white p-10 rounded-3xl shadow-2xl w-full max-w-4xl border border-gray-100 text-center">
      <h2 class="text-2xl font-bold mb-4 text-green-600">Đăng nhập thành công!</h2>
      <p class="text-gray-600 mb-6">Bạn đang truy cập với quyền: <span class="font-bold text-black">{{ userLoggedIn.role }}</span></p>

      <div class="p-6 bg-gray-100 rounded-2xl mb-6 text-left">
        <h3 class="font-bold mb-2">Chức năng khả dụng:</h3>
        <ul class="list-disc ml-5 space-y-1 text-sm">
          <li v-for="permission in getPermissions(userLoggedIn.role)" :key="permission">{{ permission }}</li>
        </ul>
      </div>

      <button @click="logout" class="text-orange-600 font-bold hover:underline">Đăng xuất để test Role khác</button>
    </div>

  </div>
</template>

<script setup>
import { ref, reactive } from 'vue'

const loading = ref(false)
const userLoggedIn = ref(null)

const form = reactive({
  email: '',
  password: ''
})

// Danh sách tài khoản test cho 4 Roles chính
const testAccounts = [
  { email: 'admin@talemy.vn', pass: '12345678', role: 'Admin' },
  { email: 'sale@talemy.vn', pass: '12345678', role: 'Sales' },
  { email: 'finance@talemy.vn', pass: '12345678', role: 'Finance' },
  { email: 'teacher@talemy.vn', pass: '12345678', role: 'Teacher' }
]

const handleLogin = () => {
  loading.value = true

  setTimeout(() => {
    const user = testAccounts.find(u => u.email === form.email && u.pass === form.password)

    if (user) {
      userLoggedIn.value = user
      localStorage.setItem('user_role', user.role) // Lưu role vào máy để sau này dùng
    } else {
      alert("Sai tài khoản hoặc mật khẩu! (Thử: admin@talemy.vn / 12345678)")
    }
    loading.value = false
  }, 800)
}

const logout = () => {
  userLoggedIn.value = null
  localStorage.removeItem('user_role')
}

// Hàm lấy danh sách chức năng theo Role
const getPermissions = (role) => {
  const perms = {
    'Admin': ['Toàn quyền hệ thống', 'Quản lý nhân viên', 'Cấu hình hoa hồng', 'Xem báo cáo tài chính'],
    'Sales': ['Quản lý Lead Board', 'Chăm sóc khách hàng', 'Chuyển Lead sang Học viên'],
    'Finance': ['Quản lý Hóa đơn/Enrollment', 'Theo dõi công nợ', 'Xác nhận thanh toán'],
    'Teacher': ['Xem thời khóa biểu cá nhân', 'Điểm danh học viên', 'Quản lý tài liệu lớp học']
  }
  return perms[role] || []
}
</script>