<template>
  <div class="min-h-screen bg-gray-50 flex font-sans text-gray-900">

    <aside class="w-64 bg-[#1e293b] text-white flex flex-col sticky top-0 h-screen shadow-xl">
      <div class="p-6 border-b border-gray-700">
        <h1 class="text-2xl font-black tracking-tighter italic">Talemy<span class="text-orange-500">Edu</span></h1>
      </div>

      <nav class="flex-1 p-4 space-y-2 mt-4">
        <button @click="currentTab = 'home'"
                :class="currentTab === 'home' ? 'bg-orange-600 text-white shadow-lg' : 'text-gray-400 hover:bg-gray-800'"
                class="w-full flex items-center space-x-3 px-4 py-3 rounded-xl transition-all duration-200">
          <i class="fas fa-calendar-alt w-5"></i>
          <span class="text-sm font-bold tracking-wide">Quản lý lịch dạy</span>
        </button>

        <button @click="currentTab = 'calendar'"
                :class="currentTab === 'calendar' ? 'bg-orange-600 text-white shadow-lg' : 'text-gray-400 hover:bg-gray-800'"
                class="w-full flex items-center space-x-3 px-4 py-3 rounded-xl transition-all duration-200">
          <i class="fas fa-clock w-5"></i>
          <span class="text-sm font-bold tracking-wide">Đăng ký lịch rảnh</span>
        </button>

        <button @click="currentTab = 'profile'"
                :class="currentTab === 'profile' ? 'bg-orange-600 text-white shadow-lg' : 'text-gray-400 hover:bg-gray-800'"
                class="w-full flex items-center space-x-3 px-4 py-3 rounded-xl transition-all duration-200">
          <i class="fas fa-id-card w-5"></i>
          <span class="text-sm font-bold tracking-wide">Hồ sơ & Học viên</span>
        </button>
      </nav>

      <div class="p-4 border-t border-gray-700 bg-[#0f172a]">
        <div class="flex items-center space-x-3 mb-4 p-2">
          <div class="w-10 h-10 bg-orange-500 rounded-xl flex items-center justify-center font-black italic text-white shadow-lg">MH</div>
          <div class="overflow-hidden">
            <p class="text-xs font-black truncate">Mạnh Huy</p>
            <p class="text-[10px] text-gray-500 truncate italic font-bold uppercase">{{ isClassMatched ? 'In Class' : 'Available' }}</p>
          </div>
        </div>
        <button @click="$emit('logout')" class="w-full flex items-center space-x-3 px-4 py-3 rounded-xl text-red-400 hover:bg-red-500/10 transition-all font-bold text-xs uppercase tracking-widest">
          <i class="fas fa-sign-out-alt"></i>
          <span>Đăng xuất</span>
        </button>
      </div>
    </aside>

    <main class="flex-1 h-screen overflow-y-auto">
      <header class="bg-white/80 backdrop-blur-md p-4 sticky top-0 z-10 border-b border-gray-100 flex justify-between items-center px-8">
        <h2 class="text-sm font-black text-gray-400 uppercase tracking-[0.2em]">{{ currentTab }}</h2>
        <div class="flex items-center space-x-4">
          <span :class="isClassMatched ? 'bg-blue-50 text-blue-600 border-blue-100' : 'bg-green-50 text-green-600 border-green-100'"
                class="text-[10px] font-bold px-4 py-1.5 rounded-full uppercase italic border transition-colors duration-500">
            <i class="fas fa-circle text-[6px] mr-2 animate-pulse"></i>
            Trạng thái: {{ isClassMatched ? 'Đã ghép lớp 1-1' : 'Đang rảnh' }}
          </span>
        </div>
      </header>

      <div class="p-8 max-w-5xl mx-auto">

        <div v-if="currentTab === 'home'" class="space-y-8 animate-fade-in">
          <h2 class="text-3xl font-black text-gray-900 tracking-tighter italic">Lịch dạy trực tuyến</h2>
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div v-for="day in scheduleWeek" :key="day.dateLabel" class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm">
              <p class="text-[10px] font-black text-orange-500 uppercase tracking-widest mb-4 border-b border-orange-50 pb-2">{{ day.fullDate }}</p>
              <div v-if="day.classes.length === 0" class="py-10 text-center opacity-30 italic text-xs font-bold uppercase tracking-widest">Trống</div>
              <div v-for="cls in day.classes" :key="cls.id" class="space-y-4">
                <div class="bg-gray-50 p-4 rounded-2xl border border-gray-100 space-y-2">
                  <span class="text-[9px] font-black bg-black text-white px-2 py-0.5 rounded">{{ cls.time }}</span>
                  <h3 class="font-bold text-sm">{{ cls.className }}</h3>
                  <p class="text-[10px] text-gray-500 font-bold italic">HV: {{ cls.student }}</p>
                  <div class="flex space-x-2 pt-2">
                    <a :href="cls.link" target="_blank" class="flex-1 text-center bg-blue-600 text-white py-2 rounded-xl text-[9px] font-bold shadow-md">VÀO LỚP</a>
                    <button @click="handleAttendance(cls.student)" class="flex-1 bg-white border border-gray-200 text-black py-2 rounded-xl text-[9px] font-bold">ĐIỂM DANH</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div v-if="currentTab === 'calendar'" class="space-y-8 animate-fade-in">
          <div class="bg-black p-8 rounded-[3rem] text-white shadow-2xl flex justify-between items-center">
            <div><h2 class="text-3xl font-black italic tracking-tighter">Đăng ký lịch rảnh</h2></div>
          </div>
          <div class="bg-white p-8 rounded-[3rem] border border-gray-100 shadow-sm">
            <div v-for="day in scheduleWeek" :key="day.dateLabel" class="grid grid-cols-3 gap-4 mb-4 items-center">
              <div class="text-left py-2 px-4 rounded-2xl"><p class="text-lg font-black text-gray-800 leading-none">{{ day.dateLabel }}</p></div>
              <button @click="toggleSlot(day.dateLabel, 'Sáng')" :class="isAvailable(day.dateLabel, 'Sáng') ? 'bg-orange-500 text-white shadow-md' : 'bg-gray-50 text-gray-300 border-gray-100'" class="py-5 rounded-[1.5rem] border text-[11px] font-black transition-all">SÁNG</button>
              <button @click="toggleSlot(day.dateLabel, 'Chiều')" :class="isAvailable(day.dateLabel, 'Chiều') ? 'bg-orange-500 text-white shadow-md' : 'bg-gray-50 text-gray-300 border-gray-100'" class="py-5 rounded-[1.5rem] border text-[11px] font-black transition-all">CHIỀU</button>
            </div>
            <button @click="saveSchedule" class="w-full mt-8 bg-orange-600 text-white py-5 rounded-2xl font-black text-xs uppercase shadow-xl hover:bg-orange-700 transition-all">CẬP NHẬT LỊCH BOOKING</button>
          </div>
        </div>

        <div v-if="currentTab === 'profile'" class="space-y-8 animate-fade-in max-w-5xl">
          <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

            <div class="lg:col-span-4 space-y-6">
              <div class="bg-white p-8 rounded-[3rem] border border-gray-100 shadow-sm text-center">
                <div class="w-24 h-24 bg-orange-100 text-orange-600 rounded-[2.5rem] mx-auto flex items-center justify-center text-3xl font-black mb-4 italic">MH</div>
                <h2 class="text-2xl font-black text-gray-900 italic">Mạnh Huy</h2>
                <button @click="copyBookingLink" class="mt-4 bg-black text-white px-6 py-3 rounded-full text-[9px] font-black uppercase tracking-widest shadow-xl hover:bg-orange-600 transition-all">
                  SAO CHÉP LINK BOOKING
                </button>
              </div>

              <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm space-y-5">
                <div v-for="(info, i) in teacherDetails" :key="i" class="border-b border-gray-50 last:border-0 pb-3 last:pb-0">
                  <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest">{{ info.label }}</p>
                  <p class="text-xs font-black text-gray-900 mt-1">{{ info.value }}</p>
                </div>
              </div>
            </div>

            <div class="lg:col-span-8 space-y-6">
              <div class="bg-white p-8 rounded-[3rem] border border-gray-100 shadow-sm min-h-[500px]">
                <h3 class="text-xl font-black text-gray-900 tracking-tighter mb-8 flex items-center">
                  <i class="fas fa-users-class mr-3 text-orange-500"></i>
                  Học viên đang phụ trách
                </h3>

                <div v-if="uniqueStudents.length === 0" class="py-20 text-center border-2 border-dashed border-gray-100 rounded-[3rem]">
                  <p class="text-sm text-gray-300 italic font-bold uppercase tracking-widest">Chưa có học viên nào</p>
                </div>

                <div v-else class="space-y-4">
                  <div v-for="student in uniqueStudents" :key="student.name"
                       class="p-8 bg-white rounded-[2.5rem] border border-gray-100 shadow-sm hover:border-orange-200 transition-all flex flex-col md:flex-row md:items-center justify-between gap-6">

                    <div class="flex items-center space-x-6">
                      <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-[1.5rem] flex items-center justify-center text-xl font-black italic shadow-inner">HV</div>
                      <div>
                        <div class="flex items-center space-x-3">
                          <h4 class="text-base font-black text-gray-900">{{ student.name }}</h4>
                          <span class="text-[9px] font-black bg-green-100 text-green-600 px-3 py-1 rounded-full uppercase tracking-tighter">Đang học</span>
                        </div>

                        <div class="mt-3 flex flex-wrap items-center gap-x-6 gap-y-2">
                          <p class="text-[11px] text-gray-400 font-bold flex items-center">
                            <i class="fas fa-phone mr-2"></i> 0987.xxx.xxx
                          </p>
                          <p class="text-[11px] text-gray-400 font-bold flex items-center">
                            <i class="fas fa-bullseye mr-2"></i> IELTS 7.0
                          </p>
                          <div class="flex items-center space-x-2 bg-orange-50 px-3 py-1.5 rounded-xl border border-orange-100">
                            <span class="text-[10px] font-black text-orange-600 uppercase italic">Số buổi còn lại:</span>
                            <span class="text-xs font-black text-orange-600">{{ 24 - student.sessions.length }}/24</span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="flex items-center space-x-3">
                      <button class="bg-black text-white text-[10px] font-black px-6 py-4 rounded-2xl uppercase tracking-[0.1em] shadow-xl shadow-gray-200 active:scale-95 transition-all">
                        Nhắn tin
                      </button>
                      <button class="bg-white border border-gray-200 text-gray-400 w-12 h-12 rounded-2xl flex items-center justify-center hover:text-orange-500 hover:border-orange-500 transition-all">
                        <i class="fas fa-ellipsis-h"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>
    </main>
  </div>
</template>

<script setup>
import { ref, reactive, onMounted, watch, computed } from 'vue'

const currentTab = ref('home')
const availability = reactive([])
const scheduleWeek = ref([])
const studentEnrollments = ref([])

// Khai báo emits để App.vue nhận được lệnh Logout
defineEmits(['logout'])

// --- LOGIC GOM NHÓM HỌC VIÊN DUY NHẤT ---
const uniqueStudents = computed(() => {
  const map = new Map();
  studentEnrollments.value.forEach(item => {
    if (!map.has(item.student)) {
      map.set(item.student, { name: item.student, sessions: [] });
    }
    const sess = `${item.day} (${item.time})`;
    if (!map.get(item.student).sessions.includes(sess)) {
      map.get(item.student).sessions.push(sess);
    }
  });
  return Array.from(map.values());
});

// Logic kiểm tra trạng thái lớp học (Dùng cho Sidebar và Topbar)
const isClassMatched = computed(() => studentEnrollments.value.length > 0)

const teacherDetails = [
  { label: 'Chứng chỉ', value: 'IELTS 8.5 / TESOL' },
  { label: 'Thù lao', value: '280.000 VNĐ / h' },
  { label: 'Mã số GV', value: 'TAL-2026-HUY' }
]

const loadAllData = () => {
  scheduleWeek.value = generateWeekData()
  const savedAvail = localStorage.getItem('talemy_shared_schedule')
  if (savedAvail) availability.splice(0, availability.length, ...JSON.parse(savedAvail))

  const savedEnrollments = localStorage.getItem('shared_enrollments')
  if (savedEnrollments) {
    const enrollments = JSON.parse(savedEnrollments)
    studentEnrollments.value = enrollments
    enrollments.forEach(item => {
      const dayData = scheduleWeek.value.find(d => d.dateLabel === item.day)
      if (dayData) {
        if (!dayData.classes.find(c => c.id === item.id)) {
          dayData.classes.push(item)
        }
      }
    })
  }
}

const generateWeekData = () => {
  const days = ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', 'CN']
  const curr = new Date()
  const first = curr.getDate() - curr.getDay() + (curr.getDay() === 0 ? -6 : 1)
  return days.map((label, index) => {
    const date = new Date(new Date().setDate(first + index))
    const d = String(date.getDate()).padStart(2, '0')
    const m = String(date.getMonth() + 1).padStart(2, '0')
    const y = date.getFullYear()
    return { dateLabel: label, shortDate: `${d}/${m}`, fullDate: `${label} - ${d}/${m}/${y}`, classes: [] }
  })
}

onMounted(loadAllData)
watch(currentTab, (newTab) => { if (newTab === 'home' || newTab === 'profile') loadAllData() })

const isAvailable = (day, period) => availability.includes(`${day}-${period}`)
const toggleSlot = (day, period) => {
  const key = `${day}-${period}`; const idx = availability.indexOf(key)
  idx > -1 ? availability.splice(idx, 1) : availability.push(key)
}

const saveSchedule = () => {
  localStorage.setItem('talemy_shared_schedule', JSON.stringify([...availability]))
  alert("✅ Đã cập nhật lịch rảnh!")
}

const handleAttendance = (name) => alert(`✅ Đã điểm danh: ${name}`)

const copyBookingLink = () => {
  const bookingUrl = `${window.location.origin}/?mode=student&teacher=manhhuy`;
  navigator.clipboard.writeText(bookingUrl);
  alert("🔗 Đã sao chép link đặt lịch gửi học viên!");
}
</script>

<style>
main::-webkit-scrollbar { display: none; }
.animate-fade-in { animation: fadeIn 0.4s ease-out; }
@keyframes fadeIn { from { opacity: 0; transform: translateX(20px); } to { opacity: 1; transform: translateX(0); } }
</style>