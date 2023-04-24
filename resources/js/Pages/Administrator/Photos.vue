<template>
    <Head title="Dashboard" />

    <AdministratorLayout>
        
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Photo Details for {{ $page.props.package.name }}</h2>
        <div v-if="$page.props.flash.success" class="bg-green-500 text-white font-bold py-2 px-4 rounded mt-2">
            {{ $page.props.flash.success }}
        </div>
        <div v-if="$page.props.flash.error" class="bg-red-500 text-white font-bold py-2 px-4 rounded mt-2">
            {{ $page.props.flash.error }}
        </div>
        <div class="flex">
            <div class="flex-1 p-4">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Photos</h2>
                <div class="flex flex-wrap">
                    <div class="w-32 p-4" v-for="photo in props.package.photos" :key="photo.id">
                        <img :src="photo.file" :alt="photo.caption" class="w-full">
                        <span>{{ photo.caption }}</span><Link :href="route('admin.package.photo.remove', { id: photo.id })" method="post" as="button" type="button" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Remove</Link>
                    </div>
                </div>
            </div>
            <div class="flex-1 p-4">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add Photo</h2>
                <div class="py-12">
                    <form @submit.prevent="upload">
                        <div class="mb-6">
                            <label for="caption" class="block font-medium text-gray-700">Caption</label>
                            <input type="text" v-model="photoForm.caption" name="caption" id="caption" class="mt-1 px-4 py-2 w-full border-gray-300 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"/>
                            <div v-if="$page.props.errors.caption">{{ $page.props.errors.caption }}</div>
                        </div>
                        <div class="mb-6">
                            <label for="photo" class="block font-medium text-gray-700">Photo</label>
                            <input type="file" @input="photoForm.photo = $event.target.files[0]" class="mt-1 px-4 py-2 w-full border-gray-300 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" />
                            <progress v-if="photoForm.progress" :value="photoForm.progress.percentage" max="100">
                                {{ photoForm.progress.percentage }}%
                            </progress>
                            <div v-if="$page.props.errors.photo">{{ $page.props.errors.photo }}</div>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Add Photo</button>
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
    name: props.package.name,
    days: props.package.days,
    expiry: props.package.expiry,
})

const photoForm = useForm({
    id: props.package.id,
    caption: '',
    photo: null,
})

function upload() {
    photoForm.post(route('admin.package.photo.add'))
}

</script>