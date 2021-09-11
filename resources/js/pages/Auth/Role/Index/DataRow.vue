<template>
    <bsb-screen>
        <template v-slot:desktop>
            <tr>
                <bsb-td>{{ num }}</bsb-td>
                <bsb-td>{{ item['code'] }}</bsb-td>
                <bsb-td>{{ item['name'] }}</bsb-td>
                <bsb-td justify="center">
                    <bsb-switch-badge :condition="item['active']" true-label="Aktif" false-label="Tidak Aktif"/>
                </bsb-td>
                <bsb-td justify="center">
                    <bsb-switch-badge :condition="item['all_features']" true-label="Tak Terbatas" false-label="Terbatas"/>
                </bsb-td>
                <bsb-td justify="center">
                    <bsb-switch-badge :condition="item['all_widgets']" true-label="Tak Terbatas" false-label="Terbatas"/>
                </bsb-td>
                <bsb-td justify="center">
                    <bsb-switch-badge :condition="item['all_reports']" true-label="Tak Terbatas" false-label="Terbatas"/>
                </bsb-td>
                <bsb-td justify="center">
                    <bsb-access-wrapper module-ref="role" action-ref="read">
                        <bsb-button-router-link-read :to="{ name: 'auth.role.read', params: { id: item['id'] } }" />
                    </bsb-access-wrapper>
                    <bsb-access-wrapper module-ref="role" action-ref="update">
                        <bsb-button-router-link-update :to="{ name: 'auth.role.update', params: { id: item['id'] } }" v-if="!item['locked']" />
                        <template v-if="!item['locked']">
                            <bsb-button-activate v-if="!item['active']" @click="$emit('activate')" />
                            <bsb-button-deactivate v-else @click="$emit('deactivate')" />
                        </template>
                    </bsb-access-wrapper>
                    <bsb-access-wrapper module-ref="role" action-ref="delete">
                        <bsb-button-delete @click="$emit('delete')" v-if="!item['active']" />
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
                    </template>
                    <template v-slot:right>
                        <bsb-access-wrapper module-ref="role" action-ref="read">
                            <bsb-button-router-link-read :to="{ name: 'auth.role.read', params: { id: item['id'] } }" />
                        </bsb-access-wrapper>
                        <bsb-access-wrapper module-ref="role" action-ref="update">
                            <bsb-button-router-link-update :to="{ name: 'auth.role.update', params: { id: item['id'] } }" v-if="!item['locked']" />
                            <template v-if="!item['locked']">
                                <bsb-button-activate v-if="!item['active']" @click="$emit('activate')" />
                                <bsb-button-deactivate v-else @click="$emit('deactivate')" />
                            </template>
                        </bsb-access-wrapper>
                        <bsb-access-wrapper module-ref="role" action-ref="delete">
                            <bsb-button-delete @click="$emit('delete')" v-if="!item['locked']" />
                        </bsb-access-wrapper>
                    </template>
                    <template v-slot:footer>
                        <bsb-switch-badge :condition="item['active']" true-label="Aktif" false-label="Tidak Aktif"/>
                        <bsb-switch-badge :condition="item['all_features']" true-label="Fitur Tak Terbatas" false-label="Fitur Terbatas"/>
                        <bsb-switch-badge :condition="item['all_widgets']" true-label="Widget Tak Terbatas" false-label="Widget Terbatas"/>
                        <bsb-switch-badge :condition="item['all_reports']" true-label="Laporan Tak Terbatas" false-label="Laporan Terbatas"/>
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