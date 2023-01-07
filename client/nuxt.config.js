import vuetify from "vite-plugin-vuetify";

// eslint-disable-next-line @typescript-eslint/ban-ts-comment
// @ts-ignore
export default defineNuxtConfig({
    css: ["vuetify/styles"], // vuetify ships precompiled css, no need to import sass
    vite: {
        ssr: {
            noExternal: ["vuetify"] // add the vuetify vite plugin
        },
    },
    ssr: false,

    modules: [
        // "@pinia/nuxt",
        "@nuxtjs/tailwindcss",
        // this adds the vuetify vite plugin
        async (options, nuxt) => {
            nuxt.hooks.hook("vite:extendConfig", (config) =>
                // eslint-disable-next-line @typescript-eslint/ban-ts-comment
                // @ts-ignore TODO try to delete this ts-ignore after vuetify will be stable
                config.plugins.push(vuetify())
            );
        }
    ],

    runtimeConfig: {
        public: {
            backendUrl: "http://localhost:8000",
            frontendUrl: "http://localhost:3000",
        },
    },
    imports: {
        dirs: ["./utils"],
    },

    alias: {
        pinia: "/node_modules/@pinia/nuxt/dist/pinia.mjs"
    }
});
