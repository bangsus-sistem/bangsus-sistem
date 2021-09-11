<template>
    <Layout :breadcrumbs="msc.breadcrumbs" active="auth.user">
        <!-- Mobile -->
        <template v-slot:mobile>
            <Mobile />
        </template>
        <!-- Desktop -->
        <template v-slot:desktop>
            <Desktop />
        </template>
    </Layout>
</template>

<script>
import Layout from '../../../../layouts/Application'
import Desktop from './Desktop'
import Mobile from './Mobile'

export default {
    components: {
        Layout,
        Desktop,
        Mobile,
    },
    data() {
        return {
            msc: {
                breadcrumbs: [
                    {
                        label: 'Autentikasi',
                    },
                    {
                        label: 'User',
                    }
                ]
            },
        }
    },
}
</script>