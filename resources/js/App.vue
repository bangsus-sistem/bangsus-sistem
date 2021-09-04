<template>
    <div>
        <template v-if="state.page.loading">
            <Loading />
        </template>
        <template v-else>
            <router-view />
            <div class="app-version-wrapper">
                {{ appVersionComputed }}
            </div>
        </template>
    </div>
</template>

<script>
import Loading from './Loading'

export default {
    components: {
        Loading,
    },
    props: {
        appVersion: {
            type: String,
            required: true,
        },
        laravelVersion: {
            type: String,
            required: true,
        },
        phpVersion: {
            type: String,
            required: true,
        },
    },
    computed: {
        appVersionComputed() {
            return 'v' + this.appVersion
        },
        laravelVersionComputed() {
            return 'v' + this.laravelVersion
        },
        phpVersionComputed() {
            return 'v' + this.phpVersion
        },
    },
    data() {
        return {
            state: {
                page: {
                    loading: true,
                },
            }
        }
    },
    created() {
        this.$store.dispatch('utils/versionControl/setAppVersion', this.appVersion)
        axios.get('/ajax/utils/language_resources')
            .then(res => {
                this.$store.dispatch('utils/lang/setSrc', res.data)
                axios.get('/ajax/utils/authorization')
                    .then(res => {
                        this.$store.dispatch('utils/auth/setFeatures', res.data.features)
                        this.$store.dispatch('utils/auth/setWidgets', res.data.widgets)
                        this.state.page.loading = false
                    })
                    .catch(err => {
                        if (err.response.status == 401) {
                            this.state.page.loading = false
                        }
                    })
            })
    },
}
</script>