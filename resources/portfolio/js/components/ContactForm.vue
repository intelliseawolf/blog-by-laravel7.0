<template>
    <div>
        <form class="Form contact-form" @submit.prevent="onSubmit">
            <slot></slot>
            <div class="buttons-group">
                <button class="btn btn-white" :class="{'btn-disabled': waiting}" type="submit">
                    <i v-if="waiting" class="icon-refresh spinning"></i>
                    <span v-html="sendMessage"></span>
                </button>
            </div>
        </form>
        <transition name="slide-fade">
            <div v-if="success" class="Form__success">
                <span v-html="success"></span>
            </div>
        </transition>
        <transition name="slide-fade">
            <div v-if="serverError" class="Form__error">
                <span v-html="serverError"></span>
            </div>
        </transition>
    </div>
</template>
<script>
    export default{
        props: {
            buttontext: null,
            successmsg: null,
            servererrormsg: null
        },
        data() {
            return{
                sendMessage: this.buttontext,
                values: {},
                errors: {},
                success: false,
                waiting: false,
                serverError: false,
            }
        },
        methods: {
            onSubmit() {
                var self = this;
                if(self.waiting == false){
                    self.errors = {};
                    self.waiting = true;
                    self.success = false;
                    self.serverError = false;
                    axios.post('/homeContact', self.values).then(response => {
                        self.success = this.successmsg;
                        self.waiting = false;
                        Event.fire('clear-values', true);
                    }).catch(error => {
                        if (error.response.status === 422) {
                            self.errors = error.response.data.errors || {};
                            self.assignerrors(error.response.data.errors);
                            let jsonObject = error.response.data.errors;
                            let errorHtml = '';
                            for (let errorItem in jsonObject) {
                                errorHtml += jsonObject[errorItem] + '<br />';
                            }
                            self.serverError = errorHtml;
                        } else {
                            self.serverError = this.servererrormsg;
                            self.errors = this.servererrormsg;
                            self.assignerrors(this.servererrormsg);
                        }
                        self.waiting = false;
                    });

                }
            },
            assignerrors(errors) {
                Event.fire('contact-form-error', errors);
            },
        }
    }
</script>
<style lang="scss" scoped>
    .Form{
        .btn{
            i{
                margin-right: 10px;
                font-size: 1.2em;
            }
        }
    }
</style>
