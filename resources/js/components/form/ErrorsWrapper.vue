<template>
    <ul class="text-danger">
        <template v-for="(msg, i) in errors">
            <li :key="i" v-if="typeof msg == 'string'">
                {{ msg }}
            </li>
        </template>
    </ul>
</template>

<script>
export default {
    props: {
        errors: {
            type: Array,
            default() {
                return []
            },
        }
    }
}
</script>