<template>
    <bsb-screen>
        <template v-slot:desktop>
            <tr>
                <bsb-td>{{ num }}</bsb-td>
                <bsb-td>{{ item['code'] }}</bsb-td>
                <bsb-td>{{ standardDatetime(item['transaction_datetime']) }}</bsb-td>
                <bsb-td>{{ item['branch']['code'] }} - {{ item['branch']['name'] }}</bsb-td>
                <bsb-td>{{ item['month'] }}</bsb-td>
                <bsb-td>{{ item['total'] }}</bsb-td>
                <bsb-td justify="center">
                    <bsb-access-wrapper module-ref="common_penalty" action-ref="read">
                        <bsb-button-router-link-read :to="{ name: 'penalty.commonPenalty.read', params: { id: item['id'] } }" />
                    </bsb-access-wrapper>
                    <bsb-access-wrapper module-ref="common_penalty" action-ref="update">
                        <bsb-button-router-link-update :to="{ name: 'penalty.commonPenalty.update', params: { id: item['id'] } }" />
                    </bsb-access-wrapper>
                    <bsb-access-wrapper module-ref="common_penalty" action-ref="delete">
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
                        <h6>{{ item['total'] }}</h6>
                        <small>{{ item['branch']['code'] }} - {{ item['branch']['name'] }}</small><br>
                        <small>{{ item['month'] }}</small>
                    </template>
                    <template v-slot:right>
                        <bsb-access-wrapper module-ref="common_penalty" action-ref="read">
                            <bsb-button-router-link-read :to="{ name: 'penalty.commonPenalty.read', params: { id: item['id'] } }" />
                        </bsb-access-wrapper>
                        <bsb-access-wrapper module-ref="common_penalty" action-ref="update">
                            <bsb-button-router-link-update :to="{ name: 'penalty.commonPenalty.update', params: { id: item['id'] } }" />
                        </bsb-access-wrapper>
                        <bsb-access-wrapper module-ref="common_penalty" action-ref="delete">
                            <bsb-button-delete @click="$emit('delete')" />
                        </bsb-access-wrapper>
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