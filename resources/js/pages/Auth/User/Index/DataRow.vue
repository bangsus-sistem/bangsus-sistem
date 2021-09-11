<template>
    <bsb-screen>
        <template v-slot:desktop>
            <tr>
                <bsb-td>{{ num }}</bsb-td>
                <bsb-td>{{ item['username'] }}</bsb-td>
                <bsb-td>{{ item['full_name'] }}</bsb-td>
                <bsb-td justify="center" v-if="flWithRole">
                    {{ item['role']['code'] }} - {{ item['role']['name'] }}
                </bsb-td>
                <bsb-td justify="center">
                    <bsb-switch-badge :condition="item['active']" true-label="Aktif" false-label="Tidak Aktif"/>
                </bsb-td>
                <bsb-td justify="center">
                    <bsb-switch-badge :condition="item['all_branches']" true-label="Tak Terbatas" false-label="Terbatas"/>
                </bsb-td>
                <bsb-td justify="center">
                    <bsb-access-wrapper module-ref="user" action-ref="read">
                        <bsb-button-router-link-read :to="{ name: 'auth.user.read', params: { id: item['id'] } }" />
                    </bsb-access-wrapper>
                    <bsb-access-wrapper module-ref="user" action-ref="update">
                        <bsb-button-router-link-update :to="{ name: 'auth.user.update', params: { id: item['id'] } }" v-if="!item['locked']" />
                        <bsb-button-router-link
                            size="sm"
                            color="success"
                            :to="{ name: 'auth.user.changePassword', params: { id: item['id'] } }"
                            v-if="!item['locked']"
                        >
                            Ganti Password
                        </bsb-button-router-link>
                        <template v-if="!item['locked']">
                            <bsb-button-activate v-if="!item['active']" @click="$emit('activate')" />
                            <bsb-button-deactivate v-else @click="$emit('deactivate')" />
                        </template>
                    </bsb-access-wrapper>
                    <bsb-access-wrapper module-ref="user" action-ref="delete">
                        <bsb-button-delete @click="$emit('delete')" v-if="!item['locked']" />
                    </bsb-access-wrapper>
                </bsb-td>
            </tr>
        </template>
        <template v-slot:mobile>
            <bsb-list-group-item>
                <bsb-list-group-item-content>
                    <template v-slot:content>
                        <small>{{ item['username'] }}</small>
                        <h6 class="m-0">{{ item['full_name'] }}</h6>
                        <small v-if="flWithRole"><b>{{ item['role']['code'] }} - {{ item['role']['name'] }}</b></small>
                    </template>
                    <template v-slot:right>
                        <bsb-access-wrapper module-ref="user" action-ref="read">
                            <bsb-button-router-link-read :to="{ name: 'auth.user.read', params: { id: item['id'] } }" />
                        </bsb-access-wrapper>
                        <bsb-access-wrapper module-ref="user" action-ref="update">
                            <bsb-button-router-link-update :to="{ name: 'auth.user.update', params: { id: item['id'] } }" v-if="!item['locked']" />
                            <bsb-button-router-link
                                size="sm"
                                color="success"
                                :to="{ name: 'auth.user.changePassword', params: { id: item['id'] } }"
                                v-if="!item['locked']"
                            >
                                Ganti Password
                            </bsb-button-router-link>
                            <template v-if="!item['locked']">
                                <bsb-button-activate v-if="!item['active']" @click="$emit('activate')" />
                                <bsb-button-deactivate v-else @click="$emit('deactivate')" />
                            </template>
                        </bsb-access-wrapper>
                        <bsb-access-wrapper module-ref="user" action-ref="delete">
                            <bsb-button-delete @click="$emit('delete')" v-if="!item['locked']" />
                        </bsb-access-wrapper>
                    </template>
                    <template v-slot:footer>
                        <bsb-switch-badge :condition="item['active']" true-label="Aktif" false-label="Tidak Aktif"/>
                        <bsb-switch-badge :condition="item['all_branches']" true-label="Cabang Tak Terbatas" false-label="Cabang Terbatas"/>
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
        flWithRole: {
            type: Boolean,
            default: true,
        }
    }
}
</script>