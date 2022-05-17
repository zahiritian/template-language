import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

import templates from './modules/templates';

export default new Vuex.Store({
    modules: {
        templates
    }
});