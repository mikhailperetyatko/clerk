export const statuses = {
    pending: 'pending',
    success: 'success',
    error: 'error',
}

export const stateValue = (name) => ({
    [name]: {
        status: null,
        data: null,
        error: null,
    },
});

export const getterStatuses = (stateValueName) => ({
    [`${stateValueName}IsPending`]: (state) => state?.[stateValueName]?.status === statuses.pending,
    [`${stateValueName}IsSuccess`]: (state) => state?.[stateValueName]?.status === statuses.success,
    [`${stateValueName}IsError`]: (state) => state?.[stateValueName]?.status === statuses.error,
    [`${stateValueName}IsEmpty`]: (state) => !Object.values(state?.[stateValueName]?.data || {})?.length,
    [`${stateValueName}Status`]: (state) => state?.[stateValueName]?.status,
    [`${stateValueName}Data`]: (state) => state?.[stateValueName]?.data,
    [`${stateValueName}Error`]: (state) => state?.[stateValueName]?.error?._data,
});

export const doRequest = async (state, action, stateValueName, formatter = null) => {
    state[stateValueName].status = statuses.pending;
    state[stateValueName].data = null;
    try {
        state[stateValueName].data = !!formatter
            ? formatter(await action())
            : await action()
        ;
        state[stateValueName].status = statuses.success;
    } catch ({ response }) {
        state[stateValueName].status = statuses.error;
        state[stateValueName].error = response;
    }
};
