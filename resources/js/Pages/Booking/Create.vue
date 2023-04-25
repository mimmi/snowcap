<template>
    <Head title="Dashboard" />

    <GuestLayout>
        
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Booking</h2>
        <div v-if="$page.props.flash.success" class="bg-green-500 text-white font-bold py-2 px-4 rounded mt-2">
            {{ $page.props.flash.success }}
        </div>
        <div v-if="$page.props.flash.error" class="bg-red-500 text-white font-bold py-2 px-4 rounded mt-2">
            {{ $page.props.flash.error }}
        </div>
        <div class="py-12">
            <form @submit.prevent="form.post(route('booking.create'))" method="post" class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
                <input type="hidden" name="_token" :value="this.$page.props.csrf_token" />

                <div class="mb-6">
                    <label for="name" class="block font-medium text-gray-700">Name</label>
                    <input type="text" :value="$page.props.package.name" name="name" id="name" class="mt-1 px-4 py-2 w-full border-gray-300 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" readonly />
                </div>

                <div class="mb-6">
                    <label for="days" class="block font-medium text-gray-700">Duration (in days)</label>
                    <input type="number" :value="$page.props.package.days" name="days" id="days" class="mt-1 px-4 py-2 w-full border-gray-300 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" readonly />
                </div>

                <div class="mb-6">
                    <label for="start_date" class="block font-medium text-gray-700">Booking Start Date</label>
                    <input type="date" v-model="form.start_date" name="start_date" id="start_date" class="mt-1 px-4 py-2 w-full border-gray-300 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" />
                    <div v-if="$page.props.errors.start_date">{{ $page.props.errors.start_date }}</div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Create Booking</button>
                </div>
            </form>

        </div>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
    package: {
        type: Array,
        required: true
    }
});

const form = useForm({
  package_id: props.package.id,
  start_date: null
})

</script>