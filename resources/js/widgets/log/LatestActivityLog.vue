<template>
    <WidgetWrapper
        widget-ref="latest_activity_log"
        class="col-md-12 col-lg-8 col-xl-6"
        :loading="state.widget.loading"
        title="Log Aktivitas Terakhir"
    >
        <div class="table-responsive">
            <table class="table table-hover table-sm">
                <thead>
                    <th>#</th>
                    <th>Nama Lengkap</th>
                    <bsb-th justify="center">Tipe</bsb-th>
                    <bsb-th justify="center">Akses</bsb-th>
                    <th>Waktu</th>
                </thead>
                <tbody>
                    <tr v-for="(activityLog, i) in data" :key="i">
                        <bsb-td>{{ i + 1 }}</bsb-td>
                        <bsb-td>{{ activityLog['user']['full_name'] }}</bsb-td>
                        <bsb-td justify="center">
                            <bsb-badge>
                                {{ translateActivityLogType(activityLog['activity_log_type']) }}
                            </bsb-badge>
                        </bsb-td>
                        <bsb-td justify="center">
                            <template v-if="activityLog['activity_log_type'] == 'feature'">
                                <bsb-badge color="info">
                                    {{ activityLog['acivity_log']['module']['ref'] }}
                                </bsb-badge>
                                <bsb-badge color="secondary">
                                    {{ activityLog['acivity_log']['action']['ref'] }}
                                </bsb-badge>
                            </template>
                            <template v-else-if="activityLog['activity_log_type'] == 'widget'">
                                <bsb-badge color="info">
                                    {{ activityLog['activity_log']['ref'] }}
                                </bsb-badge>
                            </template>
                            <template v-else-if="activityLog['activity_log_type'] == 'report'">
                                <bsb-badge color="info">
                                    {{ activityLog['activity_log']['ref'] }}
                                </bsb-badge>
                            </template>
                        </bsb-td>
                        <bsb-td>{{ standardDatetime(activityLog['created_at']) }}</bsb-td>
                    </tr>
                </tbody>
            </table>
        </div>
    </WidgetWrapper>
</template>

<script>
import WidgetWrapper from '../sections/WidgetWrapper'
import mixins from '../mixins'
import activityLogTypeMixin from '../../pages/Log/ActivityLog/common/activity-log-type-mixin'

export default {
    components: {
        WidgetWrapper,
    },
    data() {
        return {
            meta: {
                source: '/ajax/log/activity_log/widget/latest'
            },
            data: {},
        }
    },
    mixins: [mixins, activityLogTypeMixin]
}
</script>