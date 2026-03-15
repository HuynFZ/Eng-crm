<template>
  <div class="min-h-screen bg-gray-50 p-4 font-sans text-gray-900">
    <div class="max-w-md mx-auto bg-white p-6 rounded-3xl shadow-sm border border-gray-100 mb-6 text-center">
      <div class="w-20 h-20 bg-orange-100 text-orange-600 rounded-full mx-auto flex items-center justify-center text-3xl font-black mb-4 italic shadow-inner">MH</div>
      <h1 class="text-xl font-black text-gray-900">Đặt lịch học với Mạnh Huy</h1>
      <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-1">Học Online 1-1 chuyên sâu</p>
      <p class="text-[9px] font-bold text-orange-500 mt-2 bg-orange-50 inline-block px-3 py-1 rounded-full uppercase">
        Tuần: {{ currentWeekRange }}
      </p>
    </div>

    <div class="max-w-md mx-auto bg-white p-6 rounded-3xl shadow-xl border border-gray-100 relative overflow-hidden">
      <div class="absolute -right-4 -top-4 w-16 h-16 bg-orange-500/10 rounded-full"></div>

      <h2 class="text-sm font-black uppercase tracking-widest mb-6 text-gray-400 flex items-center">
        <i class="fas fa-calendar-check mr-2"></i> Lịch trống trong tuần:
      </h2>

      <div class="space-y-6">
        <div v-for="day in weekDaysData" :key="day.label" class="group">
          <div v-if="hasAvailableSlot(day.label)" class="space-y-3">
            <div class="flex justify-between items-end">
              <p class="text-xs font-black text-gray-900 flex items-center">
                <span class="w-1.5 h-4 bg-orange-500 rounded-full mr-2"></span>
                {{ day.label }}
              </p>
              <p class="text-[10px] font-bold text-gray-400 uppercase tracking-tighter">{{ day.fullDate }}</p>
            </div>

            <div class="grid grid-cols-2 gap-2">
              <template v-if="teacherAvailability.includes(`${day.label}-Sáng`)">
                <button
                    v-if="!isSlotBooked(day.label, 'Sáng')"
                    @click="selectSlot(day.label, 'Sáng', day.fullDate)"
                    :class="selectedSlot?.key === `${day.label}-Sáng` ? 'bg-black text-white scale-[1.02]' : 'bg-gray-50 text-gray-600 border-gray-100 hover:bg-orange-50'"
                    class="py-3.5 rounded-2xl border text-[10px] font-black transition-all shadow-sm">
                  SÁNG (08:00 - 12:00)
                </button>
                <div v-else class="py-3.5 rounded-2xl border border-gray-100 bg-gray-100 text-gray-300 text-[10px] font-black flex items-center justify-center cursor-not-allowed italic">
                  <i class="fas fa-lock mr-1"></i> ĐÃ CÓ NGƯỜI ĐẶT
                </div>
              </template>

              <template v-if="teacherAvailability.includes(`${day.label}-Chiều`)">
                <button
                    v-if="!isSlotBooked(day.label, 'Chiều')"
                    @click="selectSlot(day.label, 'Chiều', day.fullDate)"
                    :class="selectedSlot?.key === `${day.label}-Chiều` ? 'bg-black text-white scale-[1.02]' : 'bg-gray-50 text-gray-600 border-gray-100 hover:bg-orange-50'"
                    class="py-3.5 rounded-2xl border text-[10px] font-black transition-all shadow-sm">
                  CHIỀU (13:30 - 21:00)
                </button>
                <div v-else class="py-3.5 rounded-2xl border border-gray-100 bg-gray-100 text-gray-300 text-[10px] font-black flex items-center justify-center cursor-not-allowed italic">
                  <i class="fas fa-lock mr-1"></i> ĐÃ CÓ NGƯỜI ĐẶT
                </div>
              </template>
            </div>
          </div>
        </div>

        <div v-if="teacherAvailability.length === 0" class="text-center py-10">
          <i class="fas fa-calendar-times text-gray-200 text-4xl mb-3"></i>
          <p class="text-xs text-gray-400 italic font-medium">Giảng viên chưa cập nhật lịch tuần này.</p>
        </div>
      </div>

      <button
          @click="confirmBooking"
          :disabled="!selectedSlot"
          class="w-full mt-10 bg-orange-600 text-white py-5 rounded-2xl font-black text-xs tracking-[0.2em] active:scale-95 disabled:bg-gray-100 disabled:text-gray-300 transition-all shadow-lg shadow-orange-200 uppercase">
        {{ selectedSlot ? `XÁC NHẬN HỌC ${selectedSlot.displayDate}` : 'VUI LÒNG CHỌN LỊCH' }}
      </button>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue'

const teacherAvailability = ref([])
const bookedEnrollments = ref([]) // Lưu danh sách các buổi đã được đặt
const selectedSlot = ref(null)
const weekDaysData = ref([])

const generateWeekData = () => {
  const days = ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', 'CN']
  const curr = new Date()
  const first = curr.getDate() - curr.getDay() + (curr.getDay() === 0 ? -6 : 1)
  return days.map((label, index) => {
    const date = new Date(new Date().setDate(first + index))
    const d = String(date.getDate()).padStart(2, '0')
    const m = String(date.getMonth() + 1).padStart(2, '0')
    const y = date.getFullYear()
    return { label, fullDate: `${d}/${m}/${y}` }
  })
}

const currentWeekRange = computed(() => {
  if (weekDaysData.value.length === 0) return ''
  return `${weekDaysData.value[0].fullDate} - ${weekDaysData.value[6].fullDate}`
})

const loadData = () => {
  weekDaysData.value = generateWeekData()

  // 1. Lấy lịch rảnh giảng viên khai báo
  const savedAvail = localStorage.getItem('talemy_shared_schedule')
  if (savedAvail) teacherAvailability.value = JSON.parse(savedAvail)

  // 2. Lấy danh sách các đơn đã book thành công
  const savedEnrollments = localStorage.getItem('shared_enrollments')
  if (savedEnrollments) bookedEnrollments.value = JSON.parse(savedEnrollments)
}

// Kiểm tra xem một slot đã bị ai đặt chưa
const isSlotBooked = (dayLabel, period) => {
  return bookedEnrollments.value.some(enroll => enroll.day === dayLabel && enroll.period === period)
}

onMounted(() => {
  loadData()
  window.addEventListener('storage', (e) => {
    if (e.key === 'talemy_shared_schedule' || e.key === 'shared_enrollments') loadData()
  })
})

const hasAvailableSlot = (dayLabel) => {
  return teacherAvailability.value.some(slot => slot.startsWith(dayLabel))
}

const selectSlot = (dayLabel, period, date) => {
  selectedSlot.value = {
    key: `${dayLabel}-${period}`,
    day: dayLabel,
    period: period,
    displayDate: `${dayLabel} (${date})`
  }
}

const confirmBooking = () => {
  const newClass = {
    id: Date.now(),
    time: selectedSlot.value.period === 'Sáng' ? '08:00 - 09:30' : '14:00 - 15:30',
    day: selectedSlot.value.day,
    period: selectedSlot.value.period, // Lưu thêm period để kiểm tra trùng
    dateLabel: `${selectedSlot.value.day} - ${weekDaysData.value.find(d => d.label === selectedSlot.value.day).fullDate}`,
    className: 'IELTS Online 1-1',
    student: 'Nguyễn Văn Mạnh Huy (Học viên)',
    link: 'https://meet.google.com/talemy-huy-tutor'
  }

  const existingClasses = JSON.parse(localStorage.getItem('shared_enrollments') || '[]')
  existingClasses.push(newClass)
  localStorage.setItem('shared_enrollments', JSON.stringify(existingClasses))

  alert(`🎉 ĐẶT LỊCH THÀNH CÔNG!`)
  selectedSlot.value = null
  loadData() // Load lại để khóa nút vừa đặt
}
</script>