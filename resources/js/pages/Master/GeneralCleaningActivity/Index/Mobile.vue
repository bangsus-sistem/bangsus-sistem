<template>
    <fragment>
        <h3>Aktivitas General Cleaning</h3>
        <bsb-mobile-card-spinner-error
            class="mt-3"
            :loading="state.page.loading"
            :error="state.page.error"
            :error-message="state.page.message"
        >
            <h5 class="mb-3">Daftar Aktivitas General Cleaning</h5>
            <bsb-access-wrapper module-ref="general_cleaning_activity" action-ref="create">
                <bsb-button-router-link-create :to="{ name: 'master.generalCleaningActivity.create' }" />
            </bsb-access-wrapper>
            <GeneralCleaningActivityDataQuery
                :loading="state.result.loading"
                @search="search"
                v-model="query"
            />
            <bsb-item-count
                :options="meta.counts"
                v-model="query.count"
                @input="search"
                class="mt-3"
            />
            <bsb-list-group-empty class="mt-3 shadow-sm" :items="result.items">
                <GeneralCleaningActivityDataRow
                    v-for="(item, i) in result.items"
                    :key="i"
                    :num="i + 1"
                    :item="item"
                    @activate="showModalForm('generalCleaningActivity', 'activate', { id: item['id'] })"
                    @deactivate="showModalForm('generalCleaningActivity', 'deactivate', { id: item['id'] })"
                    @delete="showModalForm('generalCleaningActivity', 'delete', { id: item['id'] })"
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
        </bsb-mobile-card-spinner-error>
        <!-- Modal Form -->
        <GeneralCleaningActivityModalForms ref="generalCleaningActivity" @success="search" />
    </fragment>
</template>

<script>
import mixin from './mixin'
import GeneralCleaningActivityDataQuery from './DataQuery'
import GeneralCleaningActivityDataRow from './DataRow'
import GeneralCleaningActivityModalForms from './ModalForms'

export default {
    mixins: [mixin],
    components: { GeneralCleaningActivityDataQuery, GeneralCleaningActivityDataRow, GeneralCleaningActivityModalForms },
}
</script>