<template>
    <Layout :breadcrumbs="msc.breadcrumbs" active="report">
        <!-- Mobile -->
        <template v-slot:mobile>
            <bsb-button-router-link :to="{ name: 'report.salary' }">Laporan Gaji</bsb-button-router-link>
        </template>
        <!-- Desktop -->
        <template v-slot:desktop>
            <bsb-button-router-link :to="{ name: 'report.salary' }">Laporan Gaji</bsb-button-router-link>
        </template>
    </Layout>
</template>

<script>
import Layout from '../../layouts/Application'
// import Desktop from './Desktop'
// import Mobile from './Mobile'

export default {
    components: {
        Layout,
        // Desktop,
        // Mobile,
    },
    data() {
        return {
            msc: {
                breadcrumbs: [
                    {
                        label: 'Laporan',
                    }
                ]
            },
        }
    },
}
</script>