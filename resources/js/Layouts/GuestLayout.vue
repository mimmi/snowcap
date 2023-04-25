<template>
	<div class="bg-white">
	  <!-- Header -->
	  <header class="absolute inset-x-0 top-0 z-50">
		<nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
		  <div class="flex lg:flex-1">
			<a href="#" class="-m-1.5 p-1.5">
			  <span class="sr-only">Hummingbird</span>
			  <img class="h-10 w-auto" src="https://hummingbird.travel/wp-content/uploads/2018/06/lgw255.png" alt="" />
			</a>
		  </div>
		  <div class="flex lg:hidden">
			<button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-white" @click="mobileMenuOpen = true">
			  <span class="sr-only">Open main menu</span>
			  <Bars3Icon class="h-6 w-6" aria-hidden="true" />
			</button>
		  </div>
		  <div class="hidden lg:flex lg:gap-x-12">
			<Link v-for="item in navigation" :key="item.name" :href="item.href" class="text-sm font-semibold leading-6 text-white">{{ item.name }}</Link>
		  </div>
		  <div class="hidden lg:flex lg:flex-1 lg:justify-end">
			<Link v-if="$page.props.auth.user" :href="route('logout')" method="post" class="text-sm font-semibold leading-6 text-white">Log out <span aria-hidden="true">&rarr;</span></Link>
			<Link v-else :href="route('login')" class="text-sm font-semibold leading-6 text-white">Log in <span aria-hidden="true">&rarr;</span></Link>
		  </div>
		</nav>
		<Dialog as="div" class="lg:hidden" @close="mobileMenuOpen = false" :open="mobileMenuOpen">
		  <div class="fixed inset-0 z-50" />
		  <DialogPanel class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
			<div class="flex items-center justify-between">
			  <a href="#" class="-m-1.5 p-1.5">
				<span class="sr-only">Hummingbird</span>
				<img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="" />
			  </a>
			  <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700" @click="mobileMenuOpen = false">
				<span class="sr-only">Close menu</span>
				<XMarkIcon class="h-6 w-6" aria-hidden="true" />
			  </button>
			</div>
			<div class="mt-6 flow-root">
			  <div class="-my-6 divide-y divide-gray-500/10">
				<div class="space-y-2 py-6">
				  <Link v-for="item in navigation" :key="item.name" :href="item.href" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">{{ item.name }}</Link>
				</div>
				<div class="py-6">
					<Link v-if="$page.props.auth.user" :href="route('logout')" method="post" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log out <span aria-hidden="true">&rarr;</span></Link>
					<Link v-else :href="route('login')" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log in <span aria-hidden="true">&rarr;</span></Link>
				</div>
			  </div>
			</div>
		  </DialogPanel>
		</Dialog>
	  </header>
  
	  <main class="h-full">
		<!-- Hero section -->
		<div class="relative isolate overflow-hidden bg-gray-900 pb-16 pt-14 sm:pb-20 h-[100px]">
		</div>
		<div class="mx-auto max-w-7xl px-6 lg:px-8 pt-12">
			<slot />
		</div>
		
	  </main>
	</div>
  </template>
  
  <script setup>
  import { ref } from 'vue'
  import { Dialog, DialogPanel } from '@headlessui/vue'
  import { Bars3Icon, XMarkIcon } from '@heroicons/vue/24/outline'
  import { Head, Link } from '@inertiajs/vue3';
  
  const navigation = [
	{ name: 'Home', href: route('dashboard') },
	{ name: 'Packages', href: route('home.packages') },
	{ name: 'About Us', href: 'https://hummingbird.travel' },
	{ name: 'Admin Portal', href: route('admin.dashboard') },
  ]
  const mobileMenuOpen = ref(false)
  </script>