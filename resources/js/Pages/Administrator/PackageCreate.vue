<template>
    <Head title="Dashboard" />

    <AdministratorLayout>
        
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Packages</h2>
        <div v-if="$page.props.flash.success" class="bg-green-500 text-white font-bold py-2 px-4 rounded mt-2">
            {{ $page.props.flash.success }}
        </div>
        <div v-if="$page.props.flash.error" class="bg-red-500 text-white font-bold py-2 px-4 rounded mt-2">
            {{ $page.props.flash.error }}
        </div>
        <div class="py-12">
            <form @submit.prevent="form.post(route('admin.package.create'))" method="post" class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
                <input type="hidden" name="_token" :value="$page.props.csrf_token" />

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
                    <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Create Package</button>
                </div>
            </form>

        </div>
    </AdministratorLayout>
</template>

<script setup>
import AdministratorLayout from '@/Layouts/AdministratorLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
  name: null,
  days: null,
  expiry: null,
})

</script>