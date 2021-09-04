<template>
    <cb-screen>
        <template v-slot:desktop>
            <tr>
                <cb-td>{{ num }}</cb-td>
                <cb-td v-if="flWithUser">{{ item['user']['full_name'] }}</cb-td>
                <cb-td justify="center">
                    {{ standardDatetime(item['created_at']) }}
                </cb-td>
                <cb-td justify="center">
                    <cb-badge>
                        {{ translateActivityLogType(item['activity_log_type']) }}
                    </cb-badge>
                </cb-td>
                <cb-td justify="center">
                    <template v-if="item['activity_log_type'] == 'feature'">
                        <cb-badge color="info">
                            {{ item['feature']['module']['ref'] }}
                        </cb-badge>
                        <cb-badge color="secondary">
                            {{ item['feature']['action']['ref'] }}
                        </cb-badge>
                    </template>
                    <template v-else-if="item['activity_log_type'] == 'widget'">
                        <cb-badge color="info">
                            {{ item['widget']['ref'] }}
                        </cb-badge>
                    </template>
                    <template v-else-if="item['activity_log_type'] == 'report'">
                        <cb-badge color="info">
                            {{ item['report']['ref'] }}
                        </cb-badge>
                    </template>
                </cb-td>
                <cb-td justify="center">
                    <cb-access-wrapper module-ref="activity_log" action-ref="read">
                        <cb-button-router-link-read :to="{ name: 'log.activityLog.read', params: { id: item['id'] } }" />
                    </cb-access-wrapper>
                    <cb-access-wrapper module-ref="activity_log" action-ref="delete">
                        <cb-button-delete @click="$emit('delete')" />
                    </cb-access-wrapper>
                </cb-td>
            </tr>
        </template>
        <template v-slot:mobile>
            <cb-list-group-item>
                <cb-list-group-item-content>
                    <template v-slot:content>
                        <h6 class="m-0" v-if="flWithUser">{{ item['user']['full_name'] }}</h6>
                        <small>{{ standardDatetime(item['created_at']) }}</small>
                    </template>
                    <template v-slot:right>
                        <cb-access-wrapper module-ref="activity_log" action-ref="read">
                            <cb-button-router-link-read :to="{ name: 'log.activityLog.read', params: { id: item['id'] } }" />
                        </cb-access-wrapper>
                        <cb-access-wrapper module-ref="activity_log" action-ref="delete">
                            <cb-button-delete @click="$emit('delete')" v-if="!item['locked']" />
                        </cb-access-wrapper>
                    </template>
                    <template v-slot:footer>
                        <cb-badge>
                            {{ translateActivityLogType(item['activity_log_type']) }}
                        </cb-badge>
                        <template v-if="item['activity_log_type'] == 'feature'">
                            <cb-badge color="info">
                                {{ item['feature']['module']['ref'] }}
                            </cb-badge>
                            <cb-badge color="secondary">
                                {{ item['feature']['action']['ref'] }}
                            </cb-badge>
                        </template>
                        <template v-else-if="item['activity_log_type'] == 'widget'">
                            <cb-badge color="info">
                                {{ item['widget']['ref'] }}
                            </cb-badge>
                        </template>
                        <template v-else-if="item['activity_log_type'] == 'report'">
                            <cb-badge color="info">
                                {{ item['report']['ref'] }}
                            </cb-badge>
                        </template>
                    </template>
                </cb-list-group-item-content>
            </cb-list-group-item>
        </template>
    </cb-screen>
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