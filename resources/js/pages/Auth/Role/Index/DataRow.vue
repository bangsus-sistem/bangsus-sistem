<template>
    <cb-screen>
        <template v-slot:desktop>
            <tr>
                <cb-td>{{ num }}</cb-td>
                <cb-td>{{ item['code'] }}</cb-td>
                <cb-td>{{ item['name'] }}</cb-td>
                <cb-td justify="center">
                    <cb-switch-badge :condition="item['active']" true-label="Aktif" false-label="Tidak Aktif"/>
                </cb-td>
                <cb-td justify="center">
                    <cb-switch-badge :condition="item['all_features']" true-label="Tak Terbatas" false-label="Terbatas"/>
                </cb-td>
                <cb-td justify="center">
                    <cb-switch-badge :condition="item['all_widgets']" true-label="Tak Terbatas" false-label="Terbatas"/>
                </cb-td>
                <cb-td justify="center">
                    <cb-switch-badge :condition="item['all_reports']" true-label="Tak Terbatas" false-label="Terbatas"/>
                </cb-td>
                <cb-td justify="center">
                    <cb-access-wrapper module-ref="role" action-ref="read">
                        <cb-button-router-link-read :to="{ name: 'auth.role.read', params: { id: item['id'] } }" />
                    </cb-access-wrapper>
                    <cb-access-wrapper module-ref="role" action-ref="update">
                        <cb-button-router-link-update :to="{ name: 'auth.role.update', params: { id: item['id'] } }" v-if="!item['locked']" />
                        <template v-if="!item['locked']">
                            <cb-button-activate v-if="!item['active']" @click="$emit('activate')" />
                            <cb-button-deactivate v-else @click="$emit('deactivate')" />
                        </template>
                    </cb-access-wrapper>
                    <cb-access-wrapper module-ref="role" action-ref="delete">
                        <cb-button-delete @click="$emit('delete')" v-if="!item['active']" />
                    </cb-access-wrapper>
                </cb-td>
            </tr>
        </template>
        <template v-slot:mobile>
            <cb-list-group-item>
                <cb-list-group-item-content>
                    <template v-slot:content>
                        <small>{{ item['code'] }}</small>
                        <h6>{{ item['name'] }}</h6>
                    </template>
                    <template v-slot:right>
                        <cb-access-wrapper module-ref="role" action-ref="read">
                            <cb-button-router-link-read :to="{ name: 'auth.role.read', params: { id: item['id'] } }" />
                        </cb-access-wrapper>
                        <cb-access-wrapper module-ref="role" action-ref="update">
                            <cb-button-router-link-update :to="{ name: 'auth.role.update', params: { id: item['id'] } }" v-if="!item['locked']" />
                            <template v-if="!item['locked']">
                                <cb-button-activate v-if="!item['active']" @click="$emit('activate')" />
                                <cb-button-deactivate v-else @click="$emit('deactivate')" />
                            </template>
                        </cb-access-wrapper>
                        <cb-access-wrapper module-ref="role" action-ref="delete">
                            <cb-button-delete @click="$emit('delete')" v-if="!item['locked']" />
                        </cb-access-wrapper>
                    </template>
                    <template v-slot:footer>
                        <cb-switch-badge :condition="item['active']" true-label="Aktif" false-label="Tidak Aktif"/>
                        <cb-switch-badge :condition="item['all_features']" true-label="Fitur Tak Terbatas" false-label="Fitur Terbatas"/>
                        <cb-switch-badge :condition="item['all_widgets']" true-label="Widget Tak Terbatas" false-label="Widget Terbatas"/>
                        <cb-switch-badge :condition="item['all_reports']" true-label="Laporan Tak Terbatas" false-label="Laporan Terbatas"/>
                    </template>
                </cb-list-group-item-content>
            </cb-list-group-item>
        </template>
    </cb-screen>
</template>

<script>
import mixin from '../../../mixins/data-row-section-mixin'

export default {
    mixins: [mixin],
}
</script>