<template>
    <bsb-screen>
        <template v-slot:desktop>
            <tr>
                <bsb-td>{{ num }}</bsb-td>
                <bsb-td justify="center">{{ item['employee']['code'] }}</bsb-td>
                <bsb-td justify="center">{{ item['employee']['full_name'] }}</bsb-td>
                <bsb-td justify="center">{{ item['branch']['code'] }} - {{ item['branch']['name'] }}</bsb-td>
                <bsb-td justify="center">{{ standardDate(item['attendance_date']) }}</bsb-td>
                <bsb-td justify="center">{{ item['attendance_type']['ref'] }} - {{ item['attendance_type']['name'] }}</bsb-td>
                <bsb-td justify="center">{{ standardDatetime(item['schedule_in_datetime']) }}</bsb-td>
                <bsb-td justify="center">{{ standardDatetime(item['attendance_in_datetime']) }}</bsb-td>
                <bsb-td justify="center">{{ standardDatetime(item['schedule_out_datetime']) }}</bsb-td>
                <bsb-td justify="center">{{ standardDatetime(item['attendance_out_datetime']) }}</bsb-td>
                <bsb-td justify="center">
                    <template v-if="item['image_in'] != null">
                        <bsb-image-viewer mode="link" :id="item['image_in']['id']" />
                    </template>
                </bsb-td>
                <bsb-td justify="center">
                    <template v-if="item['image_out'] != null">
                        <bsb-image-viewer mode="link" :id="item['image_out']['id']" />
                    </template>
                </bsb-td>
                <bsb-td justify="center">
                    <bsb-access-wrapper module-ref="attendance" action-ref="read">
                        <bsb-button-router-link-read :to="{ name: 'hrm.attendance.read', params: { id: item['id'] } }" />
                    </bsb-access-wrapper>
                    <bsb-access-wrapper module-ref="attendance" action-ref="update">
                        <bsb-button-router-link-update :to="{ name: 'hrm.attendance.update', params: { id: item['id'] } }" />
                    </bsb-access-wrapper>
                    <bsb-access-wrapper module-ref="attendance" action-ref="delete">
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
                        <bsb-access-wrapper module-ref="attendance" action-ref="read">
                            <bsb-button-router-link-read :to="{ name: 'hrm.attendance.read', params: { id: item['id'] } }" />
                        </bsb-access-wrapper>
                        <bsb-access-wrapper module-ref="attendance" action-ref="update">
                            <bsb-button-router-link-update :to="{ name: 'hrm.attendance.update', params: { id: item['id'] } }" />
                        </bsb-access-wrapper>
                        <bsb-access-wrapper module-ref="attendance" action-ref="delete">
                            <bsb-button-delete @click="$emit('delete')" />
                        </bsb-access-wrapper>
                    </template>
                    <template v-slot:footer>
                        {{ standardDate(item['attendance_date']) }}<br>
                        <small>Jadwal Masuk: <b>{{ standardDatetime(item['schedule_in_datetime']) }}</b></small><br>
                        <small>Jadwal Keluar: <b>{{ standardDatetime(item['schedule_out_datetime']) }}</b></small><br>
                        <small>Absensi Masuk: <b>{{ standardDatetime(item['attendance_in_datetime']) }}</b></small><br>
                        <small>Absensi Keluar: <b>{{ standardDatetime(item['attendance_out_datetime']) }}</b></small><br>
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