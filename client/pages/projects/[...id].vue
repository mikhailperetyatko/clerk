<script setup lang="ts">
import { ref, onMounted, watch } from 'vue';
import { useProjectStore } from '../../stores/project.js'

definePageMeta({ middleware: ["auth"] });

const projectStore = useProjectStore();

onMounted(() => {
    projectStore.addAction({});
    watch(
        () => projectStore.addIsError,
        (value) => console?.log(value, projectStore.addError),
        { immediate: true }
    );
});

</script>

<template>
    <NuxtLayout name="app-layout">
        <Head>
            <Title>Laravel - Dashboard</Title>
        </Head>

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard222
            </h2>
        </template>

        <div class="my-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        You're logged in!
                    </div>
                </div>
            </div>
        </div>
    </NuxtLayout>
</template>
