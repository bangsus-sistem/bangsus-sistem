<template>
    <Layout :breadcrumbs="msc.breadcrumbs" active="auth.user">
        <!-- Mobile -->
        <template v-slot:mobile>
            <DesktopMobile />
        </template>
        <!-- Desktop -->
        <template v-slot:desktop>
            <DesktopMobile />
        </template>
    </Layout>
</template>

<script>
import Layout from '../../../../layouts/Application'
import DesktopMobile from './DesktopMobile'

export default {
    components: {
        Layout,
        DesktopMobile,
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
                    },
                    {
                        label: 'Ganti Password',
                    },
                ]
            },
        }
    },
}
</script>