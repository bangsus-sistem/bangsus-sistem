<template>
    <Layout :breadcrumbs="msc.breadcrumbs" active="hrm.employee">
        <!-- Mobile -->
        <template v-slot:mobile>
            <DekstopMobile />
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
                        label: 'HRM',
                    },
                    {
                        label: 'Karyawan',
                    },
                    {
                        label: 'Penugasan Karyawan',
                    },
                    {
                        label: 'Tambah',
                    }
                ]
            },
        }
    },
}
</script>