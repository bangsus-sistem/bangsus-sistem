<template>
    <fragment>
        <h3>Tipe Denda Foto Operasional</h3>
        <bsb-mobile-card-spinner-error-back
            class="mt-3"
            :loading="state.page.loading"
            :error="state.page.error"
            :error-message="state.page.message"
            :default-back="{ name: 'master.operationalPhotoType' }"
        >
            <h5 class="mb-3">Daftar Tipe Denda Foto Operasional</h5>
            <bsb-access-wrapper module-ref="operational_photo_penalty_type" action-ref="create">
                <bsb-button-router-link-create :to="{ name: 'master.operationalPhotoPenaltyType.create' }" />
            </bsb-access-wrapper>
            <OperationalPhotoPenaltyTypeDataQuery
                :loading="state.result.loading"
                @search="search"
                v-model="query"
                :fl-with-operational-photo-type="false"
            />
            <bsb-item-count
                :options="meta.counts"
                v-model="query.count"
                @input="search"
                class="mt-3"
            />
            <bsb-list-group-empty class="mt-3 shadow-sm" :items="result.items">
                <OperationalPhotoPenaltyTypeDataRow
                    v-for="(item, i) in result.items"
                    :key="i"
                    :num="i + 1"
                    :item="item"
                    :fl-with-operational-photo-type="false"
                    @activate="showModalForm('operationalPhotoPenaltyType', 'activate', { id: item['id'] })"
                    @deactivate="showModalForm('operationalPhotoPenaltyType', 'deactivate', { id: item['id'] })"
                    @delete="showModalForm('operationalPhotoPenaltyType', 'delete', { id: item['id'] })"
                />
            </bsb-list-group-empty>
            <div class="mt-3 text-center">
                <bsb-data-index
                    :first-item="result.meta['first_item']"
                    :last-item="result.meta['last_item']"
                    :total="result.meta['total']"
                />
                <bsb-page-button-group v-model="query.page" :last-page="result.meta['last_page']" @changed="search" />
            </div>
        </bsb-mobile-card-spinner-error-back>
        <!-- Modal Form -->
        <OperationalPhotoPenaltyTypeModalForms ref="operationalPhotoPenaltyType" @success="search" />
    </fragment>
</template>

<script>
import mixin from './mixin'
import OperationalPhotoPenaltyTypeDataQuery from './DataQuery'
import OperationalPhotoPenaltyTypeDataRow from './DataRow'
import OperationalPhotoPenaltyTypeModalForms from './ModalForms'

export default {
    mixins: [mixin],
    components: { OperationalPhotoPenaltyTypeDataQuery, OperationalPhotoPenaltyTypeDataRow, OperationalPhotoPenaltyTypeModalForms },
}
</script>