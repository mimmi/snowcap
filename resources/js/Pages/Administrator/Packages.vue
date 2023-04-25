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
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Search input -->
                <input v-model="search" type="text" placeholder="Search packages..." />

                <Link :href="route('admin.package.create')" method="get" as="button" type="button" class="ml-4 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Create Package</Link>

                <!-- Datatable -->
                <div class="flex flex-col py-10">
                    <div class="flex justify-between font-bold">
                        <div class="w-10 p-2">ID</div>
                        <div class="flex-1 p-2 text-cutoff">Name</div>
                        <div class="flex-1 p-2 text-cutoff">Email</div>
                        <div class="flex-1 p-2 text-cutoff">Expiry</div>
                        <div class="flex-1 p-2 text-cutoff">Action</div>
                    </div>
                    <div class="flex flex-col">
                        <div v-for="thisPackage in filteredpackages" :key="thisPackage.id" class="flex justify-between items-center py-2 border-t border-gray-300">
                            <div class="w-10 p-2">{{ thisPackage.id }}</div>
                            <div class="flex-1 p-2 text-cutoff">{{ thisPackage.name }}</div>
                            <div class="flex-1 p-2 text-cutoff">{{ thisPackage.days }}</div>
                            <div class="flex-1 p-2 text-cutoff">{{ thisPackage.expiry }}</div>
                            <div class="flex-1 p-2 text-cutoff">
                                <Link :href="route('admin.package.details', { id: thisPackage.id })" method="get" as="button" type="button" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Details</Link>
                            </div>
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
    packages: {
        type: Array,
        required: true
    }
});

const search = ref('');

const filteredpackages = computed(() => {
  return props.packages.filter(thisPackage =>
    thisPackage.name.toLowerCase().includes(search.value.toLowerCase())
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