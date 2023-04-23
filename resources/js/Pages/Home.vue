<template>
    <Head title="Home" />

    <HomeLayout>
        <div class="bg-white py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-4xl sm:text-center">
                    <p class="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">Top packages</p>
                </div>
                <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-gray-600 sm:text-center">Our best selling packages for you and your loved ones</p>
                <div class="mt-20 flow-root">
                    <div class="isolate -mt-16 grid max-w-sm grid-cols-1 gap-y-16 divide-y divide-gray-100 sm:mx-auto lg:-mx-8 lg:mt-0 lg:max-w-none lg:grid-cols-3 lg:divide-x lg:divide-y-0 xl:-mx-4">
                        <div v-for="x in packages" :key="x.id" class="pt-16 lg:px-8 lg:pt-0 xl:px-14">
                            <h3 :id="x.id" class="text-base font-semibold leading-7 text-gray-900">{{ x.days }} Days</h3>
                            <p class="mt-6 flex items-baseline gap-x-1">
                                <span class="text-3xl font-bold tracking-tight text-gray-900">{{ x.name }}</span>
                            </p>
                            <a :href="x.id" :aria-describedby="x.id" class="mt-10 block rounded-md bg-cyan-500 px-3 py-2 text-center text-sm font-semibold leading-6 text-white shadow-sm hover:bg-cyan-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-cyan-600">Book Now</a>
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

    </HomeLayout>
</template>

<script setup>
import HomeLayout from '@/Layouts/HomeLayout.vue';
import { Head } from '@inertiajs/vue3';
import { CheckCircleIcon, TruckIcon, BuildingOfficeIcon, SunIcon } from '@heroicons/vue/20/solid'
import { defineProps } from 'vue';

const props = defineProps({
  packages: {
    type: Array,
    required: true
  }
});

</script>