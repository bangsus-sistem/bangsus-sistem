<template>
    <bsb-screen>
        <template v-slot:desktop>
            <tr>
                <bsb-td>{{ num }}</bsb-td>
                <bsb-td>{{ item['code'] }}</bsb-td>
                <bsb-td>{{ item['name'] }}</bsb-td>
                <bsb-td justify="center" v-if="flWithDivision">
                    {{ item['division']['code'] }} - {{ item['division']['name'] }}
                </bsb-td>
                <bsb-td justify="center">
                    <bsb-switch-badge :condition="item['active']" true-label="Aktif" false-label="Tidak Aktif"/>
                </bsb-td>
                <bsb-td justify="center">
                    <bsb-access-wrapper module-ref="job_title" action-ref="read">
                        <bsb-button-router-link-read :to="{ name: 'hrm.jobTitle.read', params: { id: item['id'] } }" />
                    </bsb-access-wrapper>
                    <bsb-access-wrapper module-ref="job_title" action-ref="update">
                        <bsb-button-router-link-update :to="{ name: 'hrm.jobTitle.update', params: { id: item['id'] } }" />
                        <bsb-button-activate v-if="!item['active']" @click="$emit('activate')" />
                        <bsb-button-deactivate v-else @click="$emit('deactivate')" />
                    </bsb-access-wrapper>
                    <bsb-access-wrapper module-ref="job_title" action-ref="delete">
                        <bsb-button-delete @click="$emit('delete')" />
                    </bsb-access-wrapper>
                </bsb-td>
            </tr>
        </template>
        <template v-slot:mobile>
            <bsb-list-group-item>
                <bsb-list-group-item-content>
                    <template v-slot:content>
                        <small>{{ item['code'] }}</small>
                        <h6>{{ item['name'] }}</h6>
                        <small v-if="flWithDivision"><b>{{ item['division']['code'] }} - {{ item['division']['name'] }}</b></small>
                    </template>
                    <template v-slot:right>
                        <bsb-access-wrapper module-ref="job_title" action-ref="read">
                            <bsb-button-router-link-read :to="{ name: 'hrm.jobTitle.read', params: { id: item['id'] } }" />
                        </bsb-access-wrapper>
                        <bsb-access-wrapper module-ref="job_title" action-ref="update">
                            <bsb-button-router-link-update :to="{ name: 'hrm.jobTitle.update', params: { id: item['id'] } }" />
                            <bsb-button-activate v-if="!item['active']" @click="$emit('activate')" />
                            <bsb-button-deactivate v-else @click="$emit('deactivate')" />
                        </bsb-access-wrapper>
                        <bsb-access-wrapper module-ref="job_title" action-ref="delete">
                            <bsb-button-delete @click="$emit('delete')" />
                        </bsb-access-wrapper>
                    </template>
                    <template v-slot:footer>
                        <bsb-switch-badge :condition="item['active']" true-label="Aktif" false-label="Tidak Aktif"/>
                        <bsb-switch-badge :condition="item['required']" true-label="Harus Diisi" false-label="Tidak Harus Diisi"/>
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
    props: {
        flWithDivision: {
            type: Boolean,
            default: true,
        },
    },
}
</script>