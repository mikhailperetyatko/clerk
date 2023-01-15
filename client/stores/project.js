import {defineStore} from 'pinia';
import {getterStatuses, stateValue, doRequest} from "../utils/helpers";
import {$larafetch} from "../utils/$larafetch";

export const useProjectStore = defineStore('project', {
    state: () => ({
        ...stateValue('add'),
        ...stateValue('update'),
        ...stateValue('delete'),
    }),
    getters: {
        ...getterStatuses('add'),
        ...getterStatuses('update'),
        ...getterStatuses('delete'),
    },
    actions: {
        addAction(body) {
            doRequest(
                this,
                async () => await $larafetch("/api/projects/", { method: 'post', body }),
                'add'
            );
        },
    },
})
