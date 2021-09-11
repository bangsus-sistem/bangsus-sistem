<template>
    <WidgetWrapper
        widget-ref="latest_authentication_log"
        class="col-md-12 col-lg-8 col-xl-6"
        :loading="state.widget.loading"
        title="Log Autentikasi Terakhir"
    >
        <div class="table-responsive">
            <table class="table table-hover table-sm">
                <thead>
                    <th>#</th>
                    <th>Nama Lengkap</th>
                    <bsb-th justify="center">Status</bsb-th>
                    <th>Waktu</th>
                </thead>
                <tbody>
                    <tr v-for="(authenticationLog, i) in data" :key="i">
                        <bsb-td>{{ i + 1 }}</bsb-td>
                        <bsb-td>{{ authenticationLog['user']['full_name'] }}</bsb-td>
                        <bsb-td justify="center">
                            <bsb-switch-badge :condition="authenticationLog['state']" true-label="Login" false-label="Logout"/>
                        </bsb-td>
                        <bsb-td>{{ standardDatetime(authenticationLog['created_at']) }}</bsb-td>
                    </tr>
                </tbody>
            </table>
        </div>
    </WidgetWrapper>
</template>

<script>
import WidgetWrapper from '../sections/WidgetWrapper'
import mixins from '../mixins'

export default {
    components: {
        WidgetWrapper,
    },
    data() {
        return {
            meta: {
                source: '/ajax/log/authentication_log/widget/latest'
            },
            data: {},
        }
    },
    mixins: [ mixins ]
}
</script>