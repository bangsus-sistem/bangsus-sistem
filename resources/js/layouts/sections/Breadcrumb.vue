<template>
    <bsb-row class="mx-2">
        <bsb-breadcrumb>
            <template v-for="(breadcrumb, i) in breadcrumbs">
                <bsb-breadcrumb-item :key="i" v-if="breadcrumb.route">
                    <router-link :to="{name: breadcrumb.route}">
                        {{ breadcrumb.label }}
                    </router-link>
                </bsb-breadcrumb-item>
                <bsb-breadcrumb-item :key="i" v-else :active="true">
                    {{ breadcrumb.label }}
                </bsb-breadcrumb-item>
            </template>
        </bsb-breadcrumb>
    </bsb-row>
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