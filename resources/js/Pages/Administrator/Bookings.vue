<template>
    <Head title="Dashboard" />

    <AdministratorLayout>
        
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Bookings</h2>
        <div v-if="$page.props.flash.success" class="bg-green-500 text-white font-bold py-2 px-4 rounded mt-2">
            {{ $page.props.flash.success }}
        </div>
        <div v-if="$page.props.flash.error" class="bg-red-500 text-white font-bold py-2 px-4 rounded mt-2">
            {{ $page.props.flash.error }}
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Search input -->
                <input v-model="search" type="text" placeholder="Search bookings..." />
                
                <!-- Datatable -->
                <div class="flex flex-col py-10">
                    <div class="flex justify-between font-bold">
                        <div class="w-10 p-2">ID</div>
                        <div class="flex-1 p-2 text-cutoff">User</div>
                        <div class="flex-1 p-2 text-cutoff">Package</div>
                        <div class="flex-1 p-2 text-cutoff">Start Date</div>
                    </div>
                    <div class="flex flex-col">
                        <div v-for="booking in filteredBookings" :key="booking.id" class="flex justify-between items-center py-2 border-t border-gray-300">
                            <div class="w-10 p-2">{{ booking.id }}</div>
                            <div class="flex-1 p-2 text-cutoff">{{ booking.user.name }}</div>
                            <div class="flex-1 p-2 text-cutoff">{{ booking.package.name }}</div>
                            <div class="flex-1 p-2 text-cutoff">{{ booking.start_date }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdministratorLayout>
</template>

<script setup>
import AdministratorLayout from '@/Layouts/AdministratorLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { defineProps, ref, computed } from 'vue';

const props = defineProps({
    bookings: {
        type: Array,
        required: true
    }
});

const search = ref('');

const filteredBookings = computed(() => {
  return props.bookings.filter(booking =>
    booking.user.name.toLowerCase().includes(search.value.toLowerCase()) ||
    booking.package.name.toLowerCase().includes(search.value.toLowerCase())
  );
});

</script>

<style scoped>
.text-cutoff {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  max-width: 20ch;
}
</style>