<template>
    <bsb-screen>
        <template v-slot:desktop>
            <tr>
                <bsb-td>{{ num }}</bsb-td>
                <bsb-td>{{ item['code'] }}</bsb-td>
                <bsb-td>{{ item['name'] }}</bsb-td>
                <bsb-td v-if="flWithBranchType">{{ item['branch_type']['code'] }} - {{ item['branch_type']['name'] }}</bsb-td>
                <bsb-td>{{ item['off_day'] }}</bsb-td>
                <bsb-td justify="center">
                    <bsb-switch-badge :condition="item['active']" true-label="Aktif" false-label="Tidak Aktif"/>
                </bsb-td>
                <bsb-td justify="center">
                    <bsb-access-wrapper module-ref="branch" action-ref="read">
                        <bsb-button-router-link-read :to="{ name: 'system.branch.read', params: { id: item['id'] } }" />
                    </bsb-access-wrapper>
                    <bsb-access-wrapper module-ref="branch" action-ref="update">
                        <bsb-button-router-link-update :to="{ name: 'system.branch.update', params: { id: item['id'] } }" />
                        <bsb-button-activate v-if="!item['active']" @click="$emit('activate')" />
                        <bsb-button-deactivate v-else @click="$emit('deactivate')" />
                    </bsb-access-wrapper>
                    <bsb-access-wrapper module-ref="branch" action-ref="delete">
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
                        <small v-if="flWithBranchType">{{ item['branch_type']['code'] }} - {{ item['branch_type']['name'] }}</small><br>
                        <small>{{ item['off_day'] }}</small>
                    </template>
                    <template v-slot:right>
                        <bsb-access-wrapper module-ref="branch" action-ref="read">
                            <bsb-button-router-link-read :to="{ name: 'system.branch.read', params: { id: item['id'] } }" />
                        </bsb-access-wrapper>
                        <bsb-access-wrapper module-ref="branch" action-ref="update">
                            <bsb-button-router-link-update :to="{ name: 'system.branch.update', params: { id: item['id'] } }" />
                            <bsb-button-activate v-if="!item['active']" @click="$emit('activate')" />
                            <bsb-button-deactivate v-else @click="$emit('deactivate')" />
                        </bsb-access-wrapper>
                        <bsb-access-wrapper module-ref="branch" action-ref="delete">
                            <bsb-button-delete @click="$emit('delete')" />
                        </bsb-access-wrapper>
                    </template>
                    <template v-slot:footer>
                        <bsb-switch-badge :condition="item['active']" true-label="Aktif" false-label="Tidak Aktif"/>
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
        flWithBranchType: {
            type: Boolean,
            default: true,
        }
    }
}
</script>