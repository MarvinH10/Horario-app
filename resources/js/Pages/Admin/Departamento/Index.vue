<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import DataTable from '@/Components/DataTable.vue';
import { ref } from 'vue';

const departamentos = ref([
    { id: 1, empresa_id: 1, nombre_departamento: 'Departamento A', descripcion_departamento: 'Descripcion 1', estado_departamento: 'Activo' },
    { id: 2, empresa_id: 1, nombre_departamento: 'Departamento B', descripcion_departamento: 'Descripcion 2', estado_departamento: 'Inactivo' },
    { id: 3, empresa_id: 1, nombre_departamento: 'Departamento C', descripcion_departamento: 'Descripcion 3', estado_departamento: 'Activo' },
]);
</script>

<template>
    <AppLayout title="Departamentos">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Departamentos
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <DataTable :data="departamentos" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
