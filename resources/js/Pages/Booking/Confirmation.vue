<template>
    <Head title="Home" />

    <GuestLayout>
        <div class="bg-white py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-4xl sm:text-center">
                    <p class="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">Booking Confirmation</p>
                </div>
                <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-gray-600 sm:text-center">Booking created for {{ $page.props.booking.start_date }}</p>
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto mt-10">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr
                                class="text-xs font-medium tracking-wide text-left text-gray-500 uppercase bg-gray-100"
                                >
                                <th class="px-4 py-3">Booking ID</th>
                                <th class="px-4 py-3">Guest Name</th>
                                <th class="px-4 py-3">Check-in Date</th>
                                <th class="px-4 py-3">Duration</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr class="text-sm text-gray-500">
                                    <td class="px-4 py-4">{{ $page.props.booking.id }}</td>
                                    <td class="px-4 py-4">{{ $page.props.booking.user.name }}</td>
                                    <td class="px-4 py-4">{{ $page.props.booking.start_date }}</td>
                                    <td class="px-4 py-4">{{ $page.props.booking.package.days }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { CheckCircleIcon, TruckIcon, BuildingOfficeIcon, SunIcon } from '@heroicons/vue/20/solid'
import { defineProps } from 'vue';

const props = defineProps({
    booking: {
        type: Array,
        required: true
    }
});

</script>