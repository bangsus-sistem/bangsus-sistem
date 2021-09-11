<template>
    <Layout :breadcrumbs="msc.breadcrumbs" active="dashboard">
        <!-- Mobile -->
        <template v-slot:mobile>
            <h3>Dashboard</h3>
            <bsb-row class="mt-3">

            </bsb-row>
        </template>
        <!-- Desktop -->
        <template v-slot:desktop>
            <h3>Dashboard</h3>
            <h4 class="mt-4">Log</h4>
            <bsb-row>
                <LatestAuthenticationLog class="my-3" />
                <AuthenticationLogTraffic class="my-3" />
                <LatestActivityLog class="my-3" />
                <ActivityLogTraffic class="my-3" />
            </bsb-row>
        </template>
    </Layout>
</template>

<script>
import Layout from '../../layouts/Application'
import LatestAuthenticationLog from '../../widgets/log/LatestAuthenticationLog'
import AuthenticationLogTraffic from '../../widgets/log/AuthenticationLogTraffic'
import LatestActivityLog from '../../widgets/log/LatestActivityLog'
import ActivityLogTraffic from '../../widgets/log/ActivityLogTraffic'

export default {
    components: {
        Layout,
        LatestAuthenticationLog,
        AuthenticationLogTraffic,
        LatestActivityLog,
        ActivityLogTraffic,
    },
    data() {
        return {
            msc: {
                breadcrumbs: [
                    {
                        label: 'Dashboard',
                    },
                ]
            }
        }
    }
}
</script>