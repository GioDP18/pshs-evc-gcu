import { createStore } from 'vuex';

export default createStore({
  state: {
        loading: false,
        sendingCerts: false,
        warning: null,
    },
    mutations: {
        setLoading(state, value) {
            state.loading = value;
        },
        setSendingCerts(state, value) {
            state.sendingCerts = value;
        },
        setWarning(state, value) {
            state.warning = value;
        },
    }
});
