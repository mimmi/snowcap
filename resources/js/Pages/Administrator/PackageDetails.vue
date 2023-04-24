<template>
    <Head title="Dashboard" />

    <AdministratorLayout>
        
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Package Details</h2>
        <div v-if="$page.props.flash.success" class="bg-green-500 text-white font-bold py-2 px-4 rounded mt-2">
            {{ $page.props.flash.success }}
        </div>
        <div v-if="$page.props.flash.error" class="bg-red-500 text-white font-bold py-2 px-4 rounded mt-2">
            {{ $page.props.flash.error }}
        </div>
        <div class="py-12">
            <form @submit.prevent="form.post(route('admin.package.details', {id: form.id}))" method="post" class="mx-auto bg-white p-8 rounded-lg shadow-md">
                <input type="hidden" name="_token" :value="this.$page.props.csrf_token" />

                <div class="mb-6">
                    <label for="id" class="block font-medium text-gray-700">ID</label>
                    <input type="text" v-model="form.id" name="id" id="id" class="mt-1 px-4 py-2 w-full border-gray-300 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" readonly/>
                </div>

                <div class="mb-6">
                    <label for="name" class="block font-medium text-gray-700">Name</label>
                    <input type="text" v-model="form.name" name="name" id="name" class="mt-1 px-4 py-2 w-full border-gray-300 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" />
                    <div v-if="$page.props.errors.name">{{ $page.props.errors.name }}</div>
                </div>

                <div class="mb-6">
                    <label for="days" class="block font-medium text-gray-700">Duration (in days)</label>
                    <input type="number" v-model="form.days" name="days" id="days" class="mt-1 px-4 py-2 w-full border-gray-300 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" />
                    <div v-if="$page.props.errors.days">{{ $page.props.errors.days }}</div>
                </div>

                <div class="mb-6">
                    <label for="expiry" class="block font-medium text-gray-700">Expiry Date</label>
                    <input type="date" v-model="form.expiry" name="expiry" id="expiry" class="mt-1 px-4 py-2 w-full border-gray-300 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" />
                    <div v-if="$page.props.errors.expiry">{{ $page.props.errors.expiry }}</div>
                </div>

                <div class="flex justify-end">
                    <Link :href="route('admin.package.itinerary', { id: form.id })" class="px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Manage Itinerary</Link>
                    <Link :href="route('admin.package.photos', { id: form.id })" class="ml-2 px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Manage Photos</Link>
                    <button type="submit" class="ml-2 px-6 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">Update Package</button>
                </div>
            </form>
        </div>
        <div class="flex">
            <div class="flex-1 p-4">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Photos</h2>
                <div class="flex flex-wrap">
                    <div class="w-48 p-4" v-for="photo in props.package.photos" :key="photo.id">
                        <a :href="photo.file">
                            <img :src="photo.file" :alt="photo.caption" class="w-full">
                        </a>
                        <span>{{ photo.caption }}</span>
                    </div>
                </div>
            </div>
        </div>
    </AdministratorLayout>
</template>

<script setup>
import AdministratorLayout from '@/Layouts/AdministratorLayout.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';

import { defineProps } from 'vue';

const props = defineProps({
    package: {
        type: Array,
        required: true
    }
});

const form = useForm({
    id: props.package.id,
    name: props.package.name,
    days: props.package.days,
    expiry: props.package.expiry,
})

</script>