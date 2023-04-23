<template>
    <Head title="Dashboard" />

    <MainLayout>
        <template #header>
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Packages</h1>
        </template>

        <div v-for="x in packages" :key="x.id" class="w-full text-black p-10">
            <h1 class="">{{ x.name }}</h1>
        </div>
    </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
import { defineProps } from 'vue';

const props = defineProps({
    packages: {
        type: Array,
        required: true
    }
});
</script>