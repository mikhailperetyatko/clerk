<template>
    <v-app v-if="isMounted">
        <v-layout>
            <v-app-bar
                color="primary"
                prominent
            >
                <v-app-bar-nav-icon variant="text" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>

                <v-toolbar-title>Клерк</v-toolbar-title>

                <v-spacer></v-spacer>

                <v-btn icon>
                    <v-icon>mdi-export</v-icon>
                </v-btn>
            </v-app-bar>

            <v-navigation-drawer
                v-model="drawer"
                location="left"
                temporary
            >
                <v-expansion-panels
                    v-model="menu"
                >
                    <v-expansion-panel
                        v-for="(item, key) in menus"
                        :key="key"
                    >
                        <v-expansion-panel-title>{{ item.title }}</v-expansion-panel-title>
                        <v-expansion-panel-text>
                            <nuxt-link
                                v-for="(link, linkKey) in item.links"
                                :key="linkKey"
                                :to="link.value">
                                {{ link.title }}
                            </nuxt-link>
                        </v-expansion-panel-text>
                    </v-expansion-panel>
                </v-expansion-panels>
            </v-navigation-drawer>

            <v-main h-screen>
                <v-card-text>
                    The navigation drawer will appear from the bottom on smaller size screens.
                </v-card-text>
            </v-main>
        </v-layout>
    </v-app>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue';

const route = useRoute();
const verified = computed(() => !!route.query.verified);

const drawer = ref(false);
const menu = ref(null);
const menus = [
    {
        title: 'Основные',
        links: [
            {
                title: 'Проекты',
                value: '/projects/',
            }
        ],
    }
];

const isMounted = ref(false);

onMounted(() => isMounted.value = true);
</script>
