<template>
    <Layout :breadcrumbs="msc.breadcrumbs" active="master.operationalPhotoType">
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
                        label: 'Master',
                    },
                    {
                        label: 'Tipe Foto Operasional',
                    },
                    {
                        label: 'Tambah',
                    },
                ]
            },
        }
    },
}
</script>