<script setup lang="ts">
import { computed } from 'vue';
import { usePage, router } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import DataTable from '@/Components/DataTable.vue';

interface Empresa {
    id: number;
    nombre_empresa: string;
    ruc_empresa: string;
    estado_empresa: boolean;
}

interface EmpresaResponse {
    current_page: number;
    data: Empresa[];
    first_page_url: string;
    last_page: number;
    total: number;
    next_page_url: string | null;
    prev_page_url: string | null;
}

const page = usePage();
const empresasResponse = computed(() => page.props.empresas as EmpresaResponse);
const empresas = computed(() => empresasResponse.value?.data ?? []);

const changePage = (url: string | null) => {
    if (url) {
        router.get(url, {}, { preserveState: true });
    }
};
</script>

<template>
    <AppLayout title="Empresas">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Empresas
            </h2>
        </template>

        <div class="py-6 sm:py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <DataTable :data="empresas" />
                </div>
                <div class="flex justify-between items-center mt-4">
                    <button :disabled="!empresasResponse.prev_page_url"
                        @click="changePage(empresasResponse.prev_page_url)"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded disabled:opacity-50">
                        Anterior
                    </button>

                    <span class="text-gray-700">
                        Página {{ empresasResponse.current_page }} de {{ empresasResponse.last_page }}
                    </span>

                    <button :disabled="!empresasResponse.next_page_url"
                        @click="changePage(empresasResponse.next_page_url)"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded disabled:opacity-50">
                        Siguiente
                    </button>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
