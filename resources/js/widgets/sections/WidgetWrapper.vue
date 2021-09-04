<template>
    <div v-if="state.widget.show">
        <cb-card>
            <cb-card-body>
                <div class="text-center" v-if="loading">
                    <cb-spinner/>
                </div>
                <div v-else>
                    <h5 class="card-title">{{ title }}</h5>
                    <slot/>
                </div>
            </cb-card-body>
        </cb-card>
    </div>
</template>

<script>
export default {
    props: {
        widgetRef: {
            required: true,
            type: String,
        },
        loading: {
            type: Boolean,
            default: false,
        },
        title: {
            type: String,
            required: true,
        },
    },
    data() {
        return {
            state: {
                widget: {
                    show: false,
                }
            }
        }
    },
    created() {
        const widgetRef = this.widgetRef
        const widgetAuth = this.$store.getters['utils/auth/widgets']
        const widget = lodash.find(widgetAuth, (widget) => {
            return widget['ref'] == widgetRef
        })

        this.state.widget.show = widget != undefined
    }
}
</script>