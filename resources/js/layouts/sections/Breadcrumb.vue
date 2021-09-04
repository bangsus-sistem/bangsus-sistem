<template>
    <cb-row class="mx-2">
        <cb-breadcrumb>
            <template v-for="(breadcrumb, i) in breadcrumbs">
                <cb-breadcrumb-item :key="i" v-if="breadcrumb.route">
                    <router-link :to="{name: breadcrumb.route}">
                        {{ breadcrumb.label }}
                    </router-link>
                </cb-breadcrumb-item>
                <cb-breadcrumb-item :key="i" v-else :active="true">
                    {{ breadcrumb.label }}
                </cb-breadcrumb-item>
            </template>
        </cb-breadcrumb>
    </cb-row>
</template>

<script>
export default {
    props: {
        breadcrumbs: {
            required: true,
            type: Array,
        },
    }
}
</script>