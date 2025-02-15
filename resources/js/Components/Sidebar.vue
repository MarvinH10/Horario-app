<script setup lang="ts">
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import NavLink from '@/Components/NavLink.vue';
import { route } from 'ziggy-js';

const props = defineProps<{
    isOpen: boolean;
    cellphonesize: boolean;
}>();

interface NavLinkItem {
    name: string;
    routeName: string;
}

const navLinks: NavLinkItem[] = [
    { name: 'Dashboard', routeName: 'dashboard' },
    { name: 'Empresas', routeName: 'empresas' },
    { name: 'Departamentos', routeName: 'departamentos' },
];

const sidebarClasses = computed(() => ({
    'translate-x-0': props.isOpen,
    '-translate-x-full': !props.isOpen,
}));
</script>

<template>
    <div>
        <div v-if="isOpen" class="fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden" @click="$emit('close')"></div>
        <aside
            class="w-64 bg-[#333333] text-white h-screen fixed top-0 left-0 transition-transform duration-300 ease-in-out z-50"
            :class="sidebarClasses">
            <div class="flex justify-center items-center">
                <Link :href="route('dashboard')" class="flex flex-col items-center text-center">
                <ApplicationMark />
                <h3 class="text-lg text-gray-300">Asistencias</h3>
                </Link>
                <button v-if="props.cellphonesize" class="ml-auto" @click="$emit('close')">
                    <ion-icon style="color: rgb(156 163 175 / var(--tw-text-opacity, 1));" name="lock-open-outline"
                        class="w-6 h-6">
                    </ion-icon>
                </button>
            </div>

            <nav class="mt-6">
                <div v-for="link in navLinks" :key="link.routeName" class="block px-4 py-2 text-gray-300">
                    <NavLink :href="route(link.routeName)" :active="route().current(link.routeName)">
                        {{ link.name }}
                    </NavLink>
                </div>
            </nav>
        </aside>
    </div>
</template>
