<script setup lang="ts">
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import NavLink from '@/Components/NavLink.vue';
import { route } from 'ziggy-js';

const props = defineProps({
    isOpen: Boolean
});

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
    <aside class="w-64 bg-gray-800 text-white h-screen fixed top-0 left-0 transition-transform duration-300 ease-in-out"
        :class="sidebarClasses">
        <div class="p-4">
            <div class="shrink-0 flex items-center">
                <Link :href="route('dashboard')" class="flex items-center">
                <ApplicationMark class="h-9 w-auto" />
                <h2 class="text-2xl font-semibold ml-2">Asistencias</h2>
                </Link>
            </div>
        </div>

        <nav class="mt-6">
            <div v-for="link in navLinks" :key="link.routeName" class="block px-4 py-2 text-gray-300">
                <NavLink :href="route(link.routeName)" :active="route().current(link.routeName)">
                    {{ link.name }}
                </NavLink>
            </div>
        </nav>
    </aside>
</template>
