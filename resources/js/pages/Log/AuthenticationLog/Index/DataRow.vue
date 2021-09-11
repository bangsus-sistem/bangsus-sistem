<template>
    <bsb-screen>
        <template v-slot:desktop>
            <tr>
                <bsb-td>{{ num }}</bsb-td>
                <bsb-td v-if="flWithUser">{{ item['user']['full_name'] }}</bsb-td>
                <bsb-td justify="center">
                    {{ standardDatetime(item['created_at']) }}
                </bsb-td>
                <bsb-td justify="center">
                    <bsb-switch-badge :condition="item['state']" true-label="Login" false-label="Logout"/>
                </bsb-td>
                <bsb-td justify="center">
                    <bsb-access-wrapper module-ref="authentication_log" action-ref="read">
                        <bsb-button-router-link-read :to="{ name: 'log.authenticationLog.read', params: { id: item['id'] } }" />
                    </bsb-access-wrapper>
                    <bsb-access-wrapper module-ref="authentication_log" action-ref="delete">
                        <bsb-button-delete @click="$emit('delete')" />
                    </bsb-access-wrapper>
                </bsb-td>
            </tr>
        </template>
        <template v-slot:mobile>
            <bsb-list-group-item>
                <bsb-list-group-item-content>
                    <template v-slot:content>
                        <h6 class="m-0" v-if="flWithUser">{{ item['user']['full_name'] }}</h6>
                        <small>{{ standardDatetime(item['created_at']) }}</small>
                    </template>
                    <template v-slot:right>
                        <bsb-access-wrapper module-ref="authentication_log" action-ref="read">
                            <bsb-button-router-link-read :to="{ name: 'log.authenticationLog.read', params: { id: item['id'] } }" />
                        </bsb-access-wrapper>
                        <bsb-access-wrapper module-ref="authentication_log" action-ref="delete">
                            <bsb-button-delete @click="$emit('delete')" v-if="!item['locked']" />
                        </bsb-access-wrapper>
                    </template>
                    <template v-slot:footer>
                        <bsb-switch-badge :condition="item['state']" true-label="Login" false-label="Logout"/>
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
        flWithUser: {
            type: Boolean,
            default: true,
        },
    },
}
</script>