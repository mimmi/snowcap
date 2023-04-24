<template>
    <Head title="Dashboard" />

    <AdministratorLayout>
        
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex flex-row">
                    <div class="flex-1 bg-blue-100 rounded-md p-4 text-center m-4">
                        <span class="text-gray-800 font-bold">{{ stats.users }} Users</span>
                    </div>
                    <div class="flex-1 bg-blue-100 rounded-md p-4 text-center m-4">
                        <span class="text-gray-800 font-bold">{{ stats.bookings }} Bookings</span>
                    </div>
                    <div class="flex-1 bg-blue-100 rounded-md p-4 text-center m-4">
                        <span class="text-gray-800 font-bold">{{ stats.packages }} Packages</span>
                    </div>
                </div>
            </div>
        </div>
    </AdministratorLayout>
</template>

<script setup>
import AdministratorLayout from '@/Layouts/AdministratorLayout.vue';
import { Head } from '@inertiajs/vue3';
import { defineProps } from 'vue';

const props = defineProps({
    stats: {
        type: Array,
        required: true
    }
});

</script>