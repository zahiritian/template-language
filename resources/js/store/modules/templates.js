import * as TemplateApi from '../../api/templates';

const freshState = () => ({
    //
});


const mutations = {
    //
};

const actions = {
    /**
     * Get template output
     * 
     * @param {Object} template
     * 
     * @return {Promise}
     */
     templateResult(context, template) {
        return TemplateApi.TemplateResult(template);
    }
};

export default {
    namespaced: true,
    state: freshState(),
    mutations,
    actions
};