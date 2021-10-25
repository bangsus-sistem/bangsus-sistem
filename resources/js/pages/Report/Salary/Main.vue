<template>
    <Layout :breadcrumbs="msc.breadcrumbs" active="report">
        <!-- Mobile -->
        <template v-slot:mobile>

        </template>
        <!-- Desktop -->
        <template v-slot:desktop>
            <form action="/ajax/report/salary" target="_blank">
                <bsb-form-group>
                    <label>Bulan</label>
                    <bsb-input type="month" name="month" />
                </bsb-form-group>
                <bsb-button>Download</bsb-button>
            </form>
        </template>
    </Layout>
</template>

<script>
import Layout from '../../../layouts/Application'
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
                    },
                    {
                        label: 'Gaji',
                    },
                ]
            },
        }
    },
}
</script>