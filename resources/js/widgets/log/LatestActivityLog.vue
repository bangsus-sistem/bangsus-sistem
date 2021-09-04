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
                    <cb-th justify="center">Tipe</cb-th>
                    <cb-th justify="center">Akses</cb-th>
                    <th>Waktu</th>
                </thead>
                <tbody>
                    <tr v-for="(activityLog, i) in data" :key="i">
                        <cb-td>{{ i + 1 }}</cb-td>
                        <cb-td>{{ activityLog['user']['full_name'] }}</cb-td>
                        <cb-td justify="center">
                            <cb-badge>
                                {{ translateActivityLogType(activityLog['activity_log_type']) }}
                            </cb-badge>
                        </cb-td>
                        <cb-td justify="center">
                            <template v-if="activityLog['activity_log_type'] == 'feature'">
                                <cb-badge color="info">
                                    {{ activityLog['acivity_log']['module']['ref'] }}
                                </cb-badge>
                                <cb-badge color="secondary">
                                    {{ activityLog['acivity_log']['action']['ref'] }}
                                </cb-badge>
                            </template>
                            <template v-else-if="activityLog['activity_log_type'] == 'widget'">
                                <cb-badge color="info">
                                    {{ activityLog['activity_log']['ref'] }}
                                </cb-badge>
                            </template>
                            <template v-else-if="activityLog['activity_log_type'] == 'report'">
                                <cb-badge color="info">
                                    {{ activityLog['activity_log']['ref'] }}
                                </cb-badge>
                            </template>
                        </cb-td>
                        <cb-td>{{ standardDatetime(activityLog['created_at']) }}</cb-td>
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