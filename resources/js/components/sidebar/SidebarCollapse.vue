<template>
    <div 
        :class="{
            'sidebar-collapse': true,
            'active': collapse,
        }"
    >
        <slot/>
    </div>
</template>

<script>
export default {
    props: {
        collapse: {
            required: true,
        },
    }
}
</script>