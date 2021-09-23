<template>
    <bsb-screen>
        <template v-slot:desktop>
            <tr>
                <bsb-td>{{ num }}</bsb-td>
                <bsb-td justify="center">{{ item['employee']['code'] }}</bsb-td>
                <bsb-td justify="center">{{ item['employee']['full_name'] }}</bsb-td>
                <bsb-td justify="center">{{ item['branch']['code'] }} - {{ item['branch']['name'] }}</bsb-td>
                <bsb-td justify="center">{{ standardDate(item['schedule_date']) }}</bsb-td>
                <bsb-td justify="center">{{ item['attendance_type']['ref'] }} - {{ item['attendance_type']['name'] }}</bsb-td>
                <bsb-td justify="center">{{ standardDatetime(item['schedule_in_datetime']) }}</bsb-td>
                <bsb-td justify="center">{{ standardDatetime(item['schedule_out_datetime']) }}</bsb-td>
                <bsb-td justify="center">
                    <bsb-switch-badge :condition="item['admitted']" true-label="Disetujui" false-label="Menunggu Persetujuan"/>
                </bsb-td>
                <bsb-td justify="center">
                    <bsb-access-wrapper module-ref="schedule_submission" action-ref="read">
                        <bsb-button-router-link-read :to="{ name: 'hrm.scheduleSubmission.read', params: { id: item['id'] } }" />
                    </bsb-access-wrapper>
                    <bsb-access-wrapper module-ref="schedule_submission" action-ref="update">
                        <bsb-button-router-link-update :to="{ name: 'hrm.scheduleSubmission.update', params: { id: item['id'] } }" />
                    </bsb-access-wrapper>
                    <bsb-access-wrapper module-ref="schedule_submission" action-ref="admit">
                        <bsb-button-admit @click="$emit('admit')" v-if="!item['admitted']" />
                    </bsb-access-wrapper>
                    <bsb-access-wrapper module-ref="schedule_submission" action-ref="delete">
                        <bsb-button-delete @click="$emit('delete')" />
                    </bsb-access-wrapper>
                </bsb-td>
            </tr>
        </template>
        <template v-slot:mobile>
            <bsb-list-group-item>
                <bsb-list-group-item-content>
                    <template v-slot:content>
                        <small>{{ item['branch']['code'] }} - {{ item['branch']['name'] }}</small>
                        <h6>{{ item['employee']['code'] }}</h6>
                        <h5>{{ item['employee']['full_name'] }}</h5>
                        <small>{{ item['attendance_type']['ref'] }} - {{ item['attendance_type']['name'] }}</small>
                    </template>
                    <template v-slot:right>
                        <bsb-access-wrapper module-ref="schedule_submission" action-ref="read">
                            <bsb-button-router-link-read :to="{ name: 'hrm.scheduleSubmission.read', params: { id: item['id'] } }" />
                        </bsb-access-wrapper>
                        <bsb-access-wrapper module-ref="schedule_submission" action-ref="update">
                            <bsb-button-router-link-update :to="{ name: 'hrm.scheduleSubmission.update', params: { id: item['id'] } }" />
                        </bsb-access-wrapper>
                        <bsb-access-wrapper module-ref="schedule_submission" action-ref="admit">
                            <bsb-button-admit @click="$emit('admit')" v-if="!item['admitted']" />
                        </bsb-access-wrapper>
                        <bsb-access-wrapper module-ref="schedule_submission" action-ref="delete">
                            <bsb-button-delete @click="$emit('delete')" />
                        </bsb-access-wrapper>
                    </template>
                    <template v-slot:footer>
                        {{ standardDate(item['schedule_date']) }}<br>
                        <small>Jadwal Masuk: <b>{{ standardDatetime(item['schedule_in_datetime']) }}</b></small><br>
                        <small>Jadwal Keluar: <b>{{ standardDatetime(item['schedule_out_datetime']) }}</b></small><br>
                    </template>
                </bsb-list-group-item-content>
            </bsb-list-group-item>
        </template>
    </bsb-screen>
</template>

<script>
import mixin from '../../../mixins/data-row-section-mixin'

export default {
    mixins: [mixin],
}
</script>