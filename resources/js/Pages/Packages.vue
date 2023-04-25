<template>
    <Head title="Home" />

    <GuestLayout>
        <div class="bg-white py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-4xl sm:text-center">
                    <p class="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">All packages</p>
                </div>
                <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-gray-600 sm:text-center">All of our packages for the season</p>
                <input v-model="search" type="text" placeholder="Search packages..." class="w-full mt-10" />
                <div class="mt-20 flow-root">
                    <div class="isolate -mt-16 grid max-w-sm grid-cols-1 gap-y-16 divide-y divide-gray-100 sm:mx-auto lg:-mx-8 lg:mt-0 lg:max-w-none lg:grid-cols-3 lg:divide-x lg:divide-y-0 xl:-mx-4">
                        <div v-for="x in filteredpackages" :key="x.id" class="pt-16 lg:px-8 lg:pt-0 xl:px-14">
                            <h3 :id="x.id" class="text-base font-semibold leading-7 text-gray-900">{{ x.days }} Days</h3>
                            <p class="mt-6 flex items-baseline gap-x-1">
                                <span class="text-3xl font-bold tracking-tight text-gray-900">{{ x.name }}</span>
                            </p>
                            <!-- <Link v-if="$page.props.auth.user" :href="route('booking.create', { id: x.id })" :aria-describedby="x.id" class="mt-10 block rounded-md bg-cyan-500 px-3 py-2 text-center text-sm font-semibold leading-6 text-white shadow-sm hover:bg-cyan-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-cyan-600">Book Now</Link> -->
                            <Link :href="route('booking.intention', { id: x.id })" :aria-describedby="x.id" class="mt-10 block rounded-md bg-cyan-500 px-3 py-2 text-center text-sm font-semibold leading-6 text-white shadow-sm hover:bg-cyan-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-cyan-600">Book Now</Link>
                            <div class="flex">
                                <div class="flex-1">
                                    <div class="flex flex-wrap">
                                        <div class="w-32 p-2" v-for="photo in x.photos" :key="photo.id">
                                            <a :href="photo.file">
                                                <img :src="photo.file" :alt="photo.caption" class="w-full">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-10 text-sm font-semibold leading-6 text-gray-900">Inclusive Of</p>
                            <ul role="list" class="mt-6 space-y-3 text-sm leading-6 text-gray-600">
                                <li v-for="itineraryItem in x.itinerary" :key="itineraryItem.id" class="flex gap-x-3">
                                    <TruckIcon v-if="itineraryItem.type === 'travel'" class="h-6 w-5 flex-none text-cyan-600" aria-hidden="true" />
                                    <SunIcon v-else-if="itineraryItem.type === 'activity'" class="h-6 w-5 flex-none text-cyan-600" aria-hidden="true" />
                                    <BuildingOfficeIcon v-else class="h-6 w-5 flex-none text-cyan-600" aria-hidden="true" />
                                    {{ itineraryItem.name }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { TruckIcon, BuildingOfficeIcon, SunIcon } from '@heroicons/vue/20/solid'
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