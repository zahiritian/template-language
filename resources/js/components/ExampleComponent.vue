<template>
    <div class="row">
        <div class="col-md-12">
            <h2>Example 1</h2>
                <div class="form-group">
                    <label for="exampleTemplateInput">Template Input</label>
                    <input  v-model="example1.templateInput" type="text" class="form-control" id="exampleTemplateInput" placeholder="Template Input">
                    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleDataInput">Data Input</label>
                    <input v-model="example1.dataInput" type="text" class="form-control" id="exampleDataInput" placeholder="Data Input">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Output</label>
                    <textarea v-model="example1.output" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <button class="btn btn-primary mt-3" @click="getResult(example1, 'example1')">Submit</button>
            <div class="form-group mt-5 mb-5">
                <label for="exampleResult">Example 1 Output</label>
                <h1 id="exampleResult">{{ example1.result }}</h1>
            </div>
        </div>
        <div class="col-md-12">
            <h2>Example 2</h2>
            <div class="form-group">
                <label for="exampleTemplateInput">Template Input</label>
                <input  v-model="example2.templateInput" type="text" class="form-control" id="exampleTemplateInput" placeholder="Template Input">
                <small class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleDataInput">Data Input</label>
                <input v-model="example2.dataInput" type="text" class="form-control" id="exampleDataInput" placeholder="Data Input">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Output</label>
                <textarea v-model="example2.output" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button class="btn btn-primary mt-3" @click="getResult(example2, 'example2')">Submit</button>
            <div class="form-group mt-5">
                <label for="exampleResult">Example 2 Output</label>
                <h1 id="exampleResult">{{ example2.result }}</h1>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapActions } from 'vuex';
    import { renderTemplate } from '../utils/templateEngine';

    export default {
        data: _ => ({
            example1: {
                templateInput: 'name',
                dataInput: 'Zahir Khan',
                output: 'Hi, my name is <%name%>.',
                result: ''
            },
            example2: {
                templateInput: 'isWeekend',
                dataInput: 'true',
                output: 'Its <%if(isWeekend) {%> not <%}%>the Weekkend.',
                result: ''
            },
        }),

        mounted() {
            //
        },

        methods: {
            ...mapActions('templates', {
                templateResult: 'templateResult'
            }),

            getResult(example, type) {
                this.templateResult(example)
                    .then(response => {
                        if (type == 'example1') {
                            this.example1.result = renderTemplate(example.output, response.data);
                        } else {
                            this.example2.result = renderTemplate(example.output, response.data);
                        }
                    });
            }
        }
    }
</script>
