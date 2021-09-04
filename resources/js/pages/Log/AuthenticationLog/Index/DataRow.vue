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
                    <cb-switch-badge :condition="item['state']" true-label="Login" false-label="Logout"/>
                </cb-td>
                <cb-td justify="center">
                    <cb-access-wrapper module-ref="authentication_log" action-ref="read">
                        <cb-button-router-link-read :to="{ name: 'log.authenticationLog.read', params: { id: item['id'] } }" />
                    </cb-access-wrapper>
                    <cb-access-wrapper module-ref="authentication_log" action-ref="delete">
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
                        <cb-access-wrapper module-ref="authentication_log" action-ref="read">
                            <cb-button-router-link-read :to="{ name: 'log.authenticationLog.read', params: { id: item['id'] } }" />
                        </cb-access-wrapper>
                        <cb-access-wrapper module-ref="authentication_log" action-ref="delete">
                            <cb-button-delete @click="$emit('delete')" v-if="!item['locked']" />
                        </cb-access-wrapper>
                    </template>
                    <template v-slot:footer>
                        <cb-switch-badge :condition="item['state']" true-label="Login" false-label="Logout"/>
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
    props: {
        flWithUser: {
            type: Boolean,
            default: true,
        },
    },
}
</script>