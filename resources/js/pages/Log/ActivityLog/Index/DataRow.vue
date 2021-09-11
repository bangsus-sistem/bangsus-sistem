<template>
    <dbsb-screen>
        <template v-slot:desktop>
            <tr>
                <dbsb-td>{{ num }}</dbsb-td>
                <dbsb-td v-if="flWithUser">{{ item['user']['full_name'] }}</dbsb-td>
                <dbsb-td justify="center">
                    {{ standardDatetime(item['created_at']) }}
                </dbsb-td>
                <dbsb-td justify="center">
                    <dbsb-badge>
                        {{ translateActivityLogType(item['activity_log_type']) }}
                    </dbsb-badge>
                </dbsb-td>
                <dbsb-td justify="center">
                    <template v-if="item['activity_log_type'] == 'feature'">
                        <dbsb-badge color="info">
                            {{ item['feature']['module']['ref'] }}
                        </dbsb-badge>
                        <dbsb-badge color="secondary">
                            {{ item['feature']['action']['ref'] }}
                        </dbsb-badge>
                    </template>
                    <template v-else-if="item['activity_log_type'] == 'widget'">
                        <dbsb-badge color="info">
                            {{ item['widget']['ref'] }}
                        </dbsb-badge>
                    </template>
                    <template v-else-if="item['activity_log_type'] == 'report'">
                        <dbsb-badge color="info">
                            {{ item['report']['ref'] }}
                        </dbsb-badge>
                    </template>
                </dbsb-td>
                <dbsb-td justify="center">
                    <dbsb-access-wrapper module-ref="activity_log" action-ref="read">
                        <dbsb-button-router-link-read :to="{ name: 'log.activityLog.read', params: { id: item['id'] } }" />
                    </dbsb-access-wrapper>
                    <dbsb-access-wrapper module-ref="activity_log" action-ref="delete">
                        <dbsb-button-delete @click="$emit('delete')" />
                    </dbsb-access-wrapper>
                </dbsb-td>
            </tr>
        </template>
        <template v-slot:mobile>
            <dbsb-list-group-item>
                <dbsb-list-group-item-content>
                    <template v-slot:content>
                        <h6 class="m-0" v-if="flWithUser">{{ item['user']['full_name'] }}</h6>
                        <small>{{ standardDatetime(item['created_at']) }}</small>
                    </template>
                    <template v-slot:right>
                        <dbsb-access-wrapper module-ref="activity_log" action-ref="read">
                            <dbsb-button-router-link-read :to="{ name: 'log.activityLog.read', params: { id: item['id'] } }" />
                        </dbsb-access-wrapper>
                        <dbsb-access-wrapper module-ref="activity_log" action-ref="delete">
                            <dbsb-button-delete @click="$emit('delete')" v-if="!item['locked']" />
                        </dbsb-access-wrapper>
                    </template>
                    <template v-slot:footer>
                        <dbsb-badge>
                            {{ translateActivityLogType(item['activity_log_type']) }}
                        </dbsb-badge>
                        <template v-if="item['activity_log_type'] == 'feature'">
                            <dbsb-badge color="info">
                                {{ item['feature']['module']['ref'] }}
                            </dbsb-badge>
                            <dbsb-badge color="secondary">
                                {{ item['feature']['action']['ref'] }}
                            </dbsb-badge>
                        </template>
                        <template v-else-if="item['activity_log_type'] == 'widget'">
                            <dbsb-badge color="info">
                                {{ item['widget']['ref'] }}
                            </dbsb-badge>
                        </template>
                        <template v-else-if="item['activity_log_type'] == 'report'">
                            <dbsb-badge color="info">
                                {{ item['report']['ref'] }}
                            </dbsb-badge>
                        </template>
                    </template>
                </dbsb-list-group-item-content>
            </dbsb-list-group-item>
        </template>
    </dbsb-screen>
</template>

<script>
import mixin from '../../../mixins/data-row-section-mixin'
import activityLogTypeMixin from '../common/activity-log-type-mixin'

export default {
    mixins: [mixin, activityLogTypeMixin],
    props: {
        flWithUser: {
            type: Boolean,
            default: true,
        },
    },
}
</script>