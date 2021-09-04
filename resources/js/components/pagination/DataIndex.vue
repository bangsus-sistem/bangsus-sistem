<template>
    <p class="text-secondary">
        Menampilkan data {{ numberOrZero(firstItem) }} - {{ numberOrZero(lastItem) }} dari {{ numberOrZero(total) }} data
    </p>
</template>

<script>
export default {
    props: {
        firstItem: {
            default: 0
        },
        lastItem: {
            default: 0
        },
        total: {
            default: 0
        },
    },
    methods: {
        numberOrZero(val) {
            return Number.isNaN(parseInt(val)) ? 0 : val
        }
    },
}
</script>