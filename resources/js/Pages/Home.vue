<template>
    <Head title="Home" />

    <GuestLayout>
        <div class="bg-white py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-4xl sm:text-center">
                    <p class="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">Hello There</p>
                </div>
                <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-gray-600 sm:text-center">Register a user, then visit the packages page to make the booking!</p>
                <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-gray-600 sm:text-center">If you are an administrator, you will see the administration portal!</p>
            </div>
        </div>

    </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>