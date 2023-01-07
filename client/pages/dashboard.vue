<script setup lang="ts">
import { ref } from 'vue';
import { useCounterStore } from '../stores/test.js'

definePageMeta({ middleware: ["auth"] });
const store = useCounterStore();
store.increment();
store.increment();
console.log(store.doubleCount);

const dialog = ref(null);
</script>

<template>
  <NuxtLayout name="app-layout">
    <Head>
      <Title>Laravel - Dashboard</Title>
    </Head>

    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard
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
      <v-switch label="Switch"></v-switch>
      <div class="text-center">
          <v-dialog
              v-model="dialog"
          >
              <template v-slot:activator="{ props }">
                  <v-btn
                      color="primary"
                      v-bind="props"
                  >
                      Open Dialog
                  </v-btn>
              </template>

              <v-card>
                  <v-card-text>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                  </v-card-text>
                  <v-card-actions>
                      <v-btn color="primary" block @click="dialog = false">Close Dialog</v-btn>
                  </v-card-actions>
              </v-card>
          </v-dialog>
      </div>
  </NuxtLayout>
</template>
