<template>
    <div class="text-secondary">
        <span v-if="userUpdate">
            Terakhir diubah oleh <b>{{ userUpdate['full_name'] }}</b> pada <b>{{ computedUpdatedAt }}</b>
        </span>
        <span v-else>
            Belum pernah diubah
        </span>
    </div>
</template>

<script>
export default {
    props: {
        userUpdate: {
            required: true,
        },
        updatedAt: {
            required: true
        },
    },
    computed: {
        computedUpdatedAt() {
            moment.locale('id')
            return moment(this.updatedAt).format('dddd, Do MMMM YYYY H:mm:ss')
        }
    }
}
</script>