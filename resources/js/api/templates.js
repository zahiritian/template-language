import axios from 'axios';

/**
 * Get template output
 * 
 * @param {Object} template
 * 
 * @return {Promise}
 */

 export const TemplateResult = (template) => axios.post('/template/get-result', template);