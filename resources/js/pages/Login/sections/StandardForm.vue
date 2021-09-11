<template>
    <form
        class="my-4"
        @submit.prevent="login"
    >
        <div class="form-group">
            <label>Username</label>
            <bsb-input-errors type="text" v-model="form.data.username" :errors="form.errors.username" />
        </div>
        <div class="form-group">
            <label>Password</label>
            <bsb-input-errors type="password" v-model="form.data.password" :errors="form.errors.password" />
        </div>
        <bsb-button-spinner class="mt-4" color="primary" type="submit" :block="true" :loading="state.form.loading">
            Login
        </bsb-button-spinner>
    </form>
</template>

<script>
import mixins from '../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            form: {
                data: {
                    username: '',
                    password: '',
                },
                errors: {
                    username: [],
                    password: [],
                },
            },
            state: {
                form: {
                    loading: false,
                },
            },
        }
    },
    methods: {
        login() {
            this.initiateForm()
            axios.get('/ajax/utils/csrf_cookie')
                .then(res => {
                    this.submitForm('/ajax/log/authentication_log/login', 'post', {
                        resolve: true,
                        reject: false
                    }).then(() => {
                        axios.get('/ajax/utils/authorization')
                            .then(res => {
                                this.$store.dispatch('utils/auth/setFeatures', res.data.features)
                                this.$store.dispatch('utils/auth/setWidgets', res.data.widgets)
                                this.$router.push({ name: 'dashboard' })
                            })
                    })
                })
                .catch(err => this.handleResultError(err))
                .finally(() => this.stopFormLoading())
        }
    }
}
</script>