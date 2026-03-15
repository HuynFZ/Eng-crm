<template>
  <div class="min-h-screen bg-white flex font-sans text-gray-900">
    <aside class="w-64 bg-[#0f172a] text-white flex flex-col h-screen sticky top-0 shadow-2xl">
      <div class="p-6 border-b border-slate-700">
        <h1 class="text-xl font-black italic text-white">Talemy<span class="text-orange-500">Edu</span></h1>
        <p class="text-[9px] font-bold text-slate-500 mt-1 uppercase tracking-widest">Product Quality Control</p>
      </div>

      <nav class="flex-1 p-4 space-y-2 mt-4">
        <div class="px-4 py-2 text-[10px] font-black text-slate-500 uppercase tracking-widest">Menu</div>

        <button @click="currentTab = 'monitor'"
                :class="currentTab === 'monitor' ? 'bg-slate-800 text-white shadow-lg' : 'text-slate-400 hover:bg-slate-800/50'"
                class="w-full flex items-center space-x-3 px-4 py-3 rounded-xl transition-all">
          <i class="fas fa-desktop text-xs" :class="currentTab === 'monitor' ? 'text-blue-400' : ''"></i>
          <span class="text-xs font-bold uppercase tracking-wide">Giám sát lớp học</span>
        </button>

        <button @click="currentTab = 'profile'"
                :class="currentTab === 'profile' ? 'bg-slate-800 text-white shadow-lg' : 'text-slate-400 hover:bg-slate-800/50'"
                class="w-full flex items-center space-x-3 px-4 py-3 rounded-xl transition-all">
          <i class="fas fa-user-shield text-xs" :class="currentTab === 'profile' ? 'text-blue-400' : ''"></i>
          <span class="text-xs font-bold uppercase tracking-wide">Hồ sơ cá nhân</span>
        </button>
      </nav>

      <div class="p-4 border-t border-slate-800 bg-slate-900/50">
        <div class="flex items-center space-x-3 mb-4 p-2">
          <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center font-black italic text-[10px]">PT</div>
          <div>
            <p class="text-[10px] font-black uppercase">PT_Staff_01</p>
            <p class="text-[8px] text-green-500 font-bold uppercase animate-pulse">Online</p>
          </div>
        </div>
        <button @click="$emit('logout')" class="w-full py-3 rounded-xl text-[10px] font-black text-red-400 hover:bg-red-500/10 border border-transparent hover:border-red-500/20 transition-all uppercase tracking-widest">
          Đăng xuất
        </button>
      </div>
    </aside>

    <main class="flex-1 p-8 bg-gray-50/50 overflow-y-auto">

      <div v-if="currentTab === 'monitor'" class="animate-fade-in">
        <header class="flex justify-between items-end mb-10">
          <div>
            <h2 class="text-3xl font-black italic tracking-tighter text-slate-900">Monitoring Room</h2>
            <p class="text-xs text-gray-400 font-bold uppercase tracking-widest mt-1">Theo dõi tiến độ ghép cặp & chất lượng giảng dạy</p>
          </div>
        </header>

        <div class="space-y-4">
          <div v-if="allClasses.length === 0" class="py-24 text-center border-2 border-dashed border-gray-200 rounded-[3rem] bg-white">
            <p class="text-sm text-gray-300 font-bold uppercase tracking-widest">Hiện chưa có lớp học nào</p>
          </div>

          <div v-for="cls in allClasses" :key="cls.id"
               class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm flex flex-col lg:flex-row lg:items-center justify-between group hover:border-blue-400 transition-all gap-6">
            <div class="flex flex-1 items-center space-x-8">
              <div class="text-center">
                <div class="w-14 h-14 bg-orange-100 text-orange-600 rounded-2xl flex items-center justify-center font-black italic mb-2 mx-auto">MH</div>
                <p class="text-[10px] font-black text-gray-900">Mạnh Huy</p>
              </div>
              <div class="flex flex-col items-center">
                <div class="w-16 h-[2px] bg-gradient-to-r from-orange-200 to-blue-500 relative"></div>
              </div>
              <div class="text-center">
                <div class="w-14 h-14 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center font-black italic mb-2 mx-auto">HV</div>
                <p class="text-[10px] font-black text-gray-900">{{ cls.student }}</p>
              </div>
              <div class="hidden xl:block border-l border-gray-100 pl-8">
                <h4 class="text-sm font-black text-gray-800">{{ cls.className }}</h4>
                <p class="text-[10px] font-bold text-gray-400 uppercase italic">{{ cls.day }} | {{ cls.time }}</p>
              </div>
            </div>
            <a :href="cls.link" target="_blank" class="bg-blue-600 text-white px-8 py-4 rounded-2xl text-[10px] font-black uppercase shadow-xl shadow-blue-100 transition-all flex items-center justify-center">
              <i class="fas fa-headset mr-2"></i> Dự thính
            </a>
          </div>
        </div>
      </div>

      <div v-if="currentTab === 'profile'" class="animate-fade-in max-w-3xl mx-auto">
        <header class="mb-10">
          <h2 class="text-3xl font-black italic tracking-tighter text-slate-900">Hồ sơ nhân sự PT</h2>
          <p class="text-xs text-gray-400 font-bold uppercase tracking-widest mt-1">Thông tin quản lý nội bộ Product Team</p>
        </header>

        <div class="grid grid-cols-1 gap-6">
          <div class="bg-white p-10 rounded-[3rem] border border-gray-100 shadow-sm flex items-center space-x-8">
            <div class="w-32 h-32 bg-blue-600 text-white rounded-[2rem] flex items-center justify-center text-4xl font-black italic shadow-2xl">PT</div>
            <div class="space-y-2">
              <h3 class="text-2xl font-black text-gray-900 italic">Nguyễn Văn PT</h3>
              <p class="text-xs font-bold text-blue-600 bg-blue-50 px-4 py-1.5 rounded-full inline-block uppercase tracking-widest">Cấp bậc: Senior PT Manager</p>
              <div class="flex space-x-4 pt-2">
                <span class="text-[10px] font-bold text-gray-400"><i class="fas fa-id-badge mr-1"></i> ID: PT-001</span>
                <span class="text-[10px] font-bold text-gray-400"><i class="fas fa-calendar-check mr-1"></i> Join: 2024</span>
              </div>
            </div>
          </div>

          <div class="grid grid-cols-2 gap-4">
            <div v-for="(item, i) in ptInfo" :key="i" class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm hover:border-blue-200 transition-all">
              <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-1">{{ item.label }}</p>
              <p class="text-sm font-black" :class="item.color || 'text-gray-900'">{{ item.value }}</p>
            </div>
          </div>

          <div class="bg-slate-900 p-8 rounded-[2.5rem] text-white shadow-xl relative overflow-hidden">
            <h4 class="text-xs font-black uppercase tracking-widest mb-4 opacity-50">Nhiệm vụ trọng tâm tháng {{ new Date().getMonth() + 1 }}</h4>
            <ul class="space-y-3">
              <li class="flex items-center text-xs font-bold"><i class="fas fa-check-circle text-green-400 mr-3"></i> Giám sát 100% các lớp Trial mới</li>
              <li class="flex items-center text-xs font-bold"><i class="fas fa-check-circle text-green-400 mr-3"></i> Đánh giá chất lượng Tutor Mạnh Huy</li>
              <li class="flex items-center text-xs font-bold opacity-40"><i class="far fa-circle mr-3"></i> Báo cáo doanh thu khóa học mới</li>
            </ul>
            <i class="fas fa-shield-alt absolute -right-4 -bottom-4 text-7xl opacity-10"></i>
          </div>
        </div>
      </div>

    </main>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'

const currentTab = ref('monitor')
const allClasses = ref([])

// THÔNG TIN CHI TIẾT PT
const ptInfo = [
  { label: 'Họ và tên', value: 'Nguyễn Văn PT' },
  { label: 'Tuổi', value: '26 tuổi' },
  { label: 'Lương cơ bản', value: '15.000.000 VNĐ', color: 'text-green-600' },
  { label: 'KPI Tháng', value: '98%', color: 'text-blue-600' },
  { label: 'Chuyên môn', value: 'Đảm bảo chất lượng (QA)' },
  { label: 'Phòng ban', value: 'Product Development' }
]

onMounted(() => {
  const saved = localStorage.getItem('shared_enrollments')
  if (saved) allClasses.value = JSON.parse(saved)
})

defineEmits(['logout'])
</script>

<style>
main::-webkit-scrollbar { display: none; }
.animate-fade-in { animation: fadeIn 0.4s ease-out; }
@keyframes fadeIn { from { opacity: 0; transform: translateX(20px); } to { opacity: 1; transform: translateX(0); } }
</style>