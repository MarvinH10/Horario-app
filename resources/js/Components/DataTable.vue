<script setup lang="ts">
import { defineProps, computed } from 'vue';

const props = defineProps({
    data: Array
});

const columns = computed(() => {
    return props.data.length > 0 ? Object.keys(props.data[0]) : [];
});

const estadoColumn = computed(() => {
    return columns.value.find(col => col.toLowerCase().includes('estado'));
});
</script>

<template>
    <div class="p-4">
        <div class="overflow-x-auto">
            <table class="w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-[#333333] text-white">
                    <tr>
                        <th v-for="col in columns" :key="col" class="py-3 px-5 text-center capitalize">
                            {{ col.replace(/_/g, ' ') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(row, index) in data" :key="index"
                        class="border-b hover:bg-gray-100 transition text-[#333333]">
                        <td v-for="col in columns" :key="col" class="py-3 px-5 text-center">
                            <template v-if="col === estadoColumn">
                                <span class="px-3 py-1 rounded-full text-white text-sm font-semibold"
                                    :class="row[col] === 'Activo' ? 'bg-green-500' : 'bg-red-500'">
                                    {{ row[col] }}
                                </span>
                            </template>
                            <template v-else>
                                {{ row[col] }}
                            </template>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
