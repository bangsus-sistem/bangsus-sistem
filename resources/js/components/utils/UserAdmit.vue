<template>
    <div class="text-secondary">
        <span v-if="userAdmit">
            Diadmit oleh <b>{{ userCreate['full_name'] }}</b> pada <b>{{ computedAdmittedAt }}</b>
        </span>
        <span v-else>
            Belum diadmit
        </span>
    </div>
</template>

<script>
export default {
    props: {
        userCreate: {
            type: Object,
            required: true,
        },
        admittedAt: {
            required: true
        },
    },
    computed: {
        computedAdmittedAt() {
            moment.locale('id')
            return moment(this.admittedAt).format('dddd, Do MMMM YYYY H:mm:ss')
        }
    }
}
</script>