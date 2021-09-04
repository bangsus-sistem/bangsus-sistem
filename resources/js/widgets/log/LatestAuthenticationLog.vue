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
                    <cb-th justify="center">Status</cb-th>
                    <th>Waktu</th>
                </thead>
                <tbody>
                    <tr v-for="(authenticationLog, i) in data" :key="i">
                        <cb-td>{{ i + 1 }}</cb-td>
                        <cb-td>{{ authenticationLog['user']['full_name'] }}</cb-td>
                        <cb-td justify="center">
                            <cb-switch-badge :condition="authenticationLog['state']" true-label="Login" false-label="Logout"/>
                        </cb-td>
                        <cb-td>{{ standardDatetime(authenticationLog['created_at']) }}</cb-td>
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