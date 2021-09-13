<template>
    <fragment>
        <h3>Tipe Kontak</h3>
        <bsb-mobile-card-spinner-error
            class="mt-3"
            :loading="state.page.loading"
            :error="state.page.error"
            :error-message="state.page.message"
        >
            <h5 class="mb-3">Daftar Tipe Kontak</h5>
            <bsb-access-wrapper module-ref="contact_type" action-ref="create">
                <bsb-button-router-link-create :to="{ name: 'hrm.contactType.create' }" />
            </bsb-access-wrapper>
            <ContactTypeDataQuery
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
                <ContactTypeDataRow
                    v-for="(item, i) in result.items"
                    :key="i"
                    :num="i + 1"
                    :item="item"
                    @activate="showModalForm('contactType', 'activate', { id: item['id'] })"
                    @deactivate="showModalForm('contactType', 'deactivate', { id: item['id'] })"
                    @delete="showModalForm('contactType', 'delete', { id: item['id'] })"
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
        <ContactTypeModalForms ref="contactType" @success="search" />
    </fragment>
</template>

<script>
import mixin from './mixin'
import ContactTypeDataQuery from './DataQuery'
import ContactTypeDataRow from './DataRow'
import ContactTypeModalForms from './ModalForms'

export default {
    mixins: [mixin],
    components: { ContactTypeDataQuery, ContactTypeDataRow, ContactTypeModalForms },
}
</script>