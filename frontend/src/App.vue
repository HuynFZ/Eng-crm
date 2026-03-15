<template>
  <div class="min-h-screen bg-gray-50">
    <div class="animate-fade-in">
      <LoginScreen v-if="!isLoggedIn" @login-success="handleLoginSuccess" />

      <template v-else>
        <TeacherDashboard v-if="viewMode === 'teacher'" @logout="handleLogout" />

        <PT v-else-if="viewMode === 'pt'" @logout="handleLogout" />

        <StudentBooking v-else-if="viewMode === 'student'" />
      </template>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import LoginScreen from './Login.vue'
import TeacherDashboard from './Teacher.vue'
import StudentBooking from './StudentBooking.vue'
import PT from './PT.vue'

const isLoggedIn = ref(false)
const viewMode = ref('') // Để trống để chờ login gán vào

onMounted(() => {
  const params = new URLSearchParams(window.location.search);
  if (params.get('mode') === 'student') {
    viewMode.value = 'student';
    isLoggedIn.value = true;
  }
})

// SỬA TẠI ĐÂY: Nhận dữ liệu từ Login gửi sang
const handleLoginSuccess = (userData) => {
  isLoggedIn.value = true

  // Kiểm tra nếu userData là object (từ file Login mới của ông) hay là string
  const role = typeof userData === 'object' ? userData.role : userData

  // Chuyển về chữ thường để so sánh với v-if ở trên
  viewMode.value = role.toLowerCase()
}

const handleLogout = () => {
  if (confirm("Huy muốn đăng xuất khỏi hệ thống?")) {
    isLoggedIn.value = false
    viewMode.value = ''
    window.history.replaceState({}, document.title, "/");
  }
}
</script>

<style>
.animate-fade-in { animation: fadeIn 0.4s ease-out; }
@keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
</style>