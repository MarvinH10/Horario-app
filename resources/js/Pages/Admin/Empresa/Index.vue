<script setup lang="ts">
import AppLayout from '@/Layouts/AppLayout.vue';
import DataTable from '@/Components/DataTable.vue';
import { ref } from 'vue';

const empresas = ref([
    { id: 1, nombre_empresa: 'Empresa A', ruc_empresa: '1234567890', estado_empresa: 'Activo' },
    { id: 2, nombre_empresa: 'Empresa B', ruc_empresa: '0987654321', estado_empresa: 'Inactivo' },
    { id: 3, nombre_empresa: 'Empresa C', ruc_empresa: '1122334455', estado_empresa: 'Activo' },
]);
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
            </div>
        </div>
    </AppLayout>
</template>
