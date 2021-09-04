<template>
    <div class="text-secondary">
        Ditambahkan oleh <b>{{ userCreate['full_name'] }}</b> pada <b>{{ computedCreatedAt }}</b>
    </div>
</template>

<script>
export default {
    props: {
        userCreate: {
            type: Object,
            required: true,
        },
        createdAt: {
            required: true
        },
    },
    computed: {
        computedCreatedAt() {
            moment.locale('id')
            return moment(this.createdAt).format('dddd, Do MMMM YYYY H:mm:ss')
        }
    }
}
</script>