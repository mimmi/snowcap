<template>
    <Head title="Dashboard" />

    <AdministratorLayout>
        
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Itinerary Details for {{ $page.props.package.name }}</h2>
        <div v-if="$page.props.flash.success" class="bg-green-500 text-white font-bold py-2 px-4 rounded mt-2">
            {{ $page.props.flash.success }}
        </div>
        <div v-if="$page.props.flash.error" class="bg-red-500 text-white font-bold py-2 px-4 rounded mt-2">
            {{ $page.props.flash.error }}
        </div>
        <div class="flex">
            <div class="flex-1 p-4">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Itinerary Items</h2>
                <div class="flex flex-col items-center justify-center space-y-4 mt-4">
                    <div v-for="item in package.itinerary" :key="item.id" class="bg-white border-gray-300 border rounded-md p-4 rounded-lg w-full">
                        <div class="flex items-center">
                            <div class="mr-2">
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold">{{ item.name }}</h4>
                                <p class="text-gray-500 capitalize">{{ item.type }}</p>
                                <Link :href="route('admin.package.itinerary.remove')" :data="{ id: item.id }" method="post" as="button" type="button" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-2">Remove</Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-1 p-4">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add Item</h2>
                <div class="py-12">
                    <form @submit.prevent="form.post(route('admin.package.itinerary.add'))">
                        <div class="mb-6">
                            <label for="name" class="block font-medium text-gray-700">Name</label>
                            <input type="text" v-model="form.name" name="name" id="name" class="mt-1 px-4 py-2 w-full border-gray-300 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"/>
                            <div v-if="$page.props.errors.name">{{ $page.props.errors.name }}</div>
                        </div>

                        <div class="mb-6">
                            <label for="type" class="block font-medium text-gray-700">Type</label>
                            <select v-model="form.type" id="type" class="mt-1 px-4 py-2 w-full border-gray-300 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                <option value="travel">Travel</option>
                                <option value="hotel">Hotel</option>
                                <option value="activity">Activity</option>
                            </select>
                            <div v-if="$page.props.errors.type">{{ $page.props.errors.type }}</div>
                        </div>
                        
                        <div class="flex justify-end">
                            <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Add Item</button>
                        </div>
                    </form>
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
    name: null,
    type: null,
})

</script>