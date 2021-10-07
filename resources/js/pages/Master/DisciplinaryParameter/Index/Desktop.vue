<template>
    <fragment>
        <h3>Parameter Kedisiplinan</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
            >
                <h5 class="mb-3">Daftar Parameter Kedisiplinan</h5>
                <bsb-access-wrapper module-ref="disciplinary_parameter" action-ref="create">
                    <bsb-button-router-link-create :to="{ name: 'master.disciplinaryParameter.create' }" />
                </bsb-access-wrapper>
                <bsb-table-responsive class="p-1 mt-3">
                    <bsb-table-responsive-header>
                        <bsb-item-count :options="meta.counts" v-model="query.count" @input="search" />
                    </bsb-table-responsive-header>
                    <bsb-table :hover="true">
                        <thead class="thead-light">
                            <DisciplinaryParameterDataQuery
                                :loading="state.result.loading"
                                @search="search"
                                v-model="query"
                            />
                            <bsb-tr-sort
                                :sort-orders="meta.sortOrders"
                                :sort="query['sort']"
                                :order="query['order']"
                                v-model="query"
                                @sort="changeSortOrder"
                            />
                        </thead>
                        <bsb-tbody-empty :items="result.items" :col="meta.sortOrders.length">
                            <DisciplinaryParameterDataRow
                                v-for="(item, i) in result.items"
                                :key="i"
                                :num="i + 1"
                                :item="item"
                                @activate="showModalForm('disciplinaryParameter', 'activate', { id: item['id'] })"
                                @deactivate="showModalForm('disciplinaryParameter', 'deactivate', { id: item['id'] })"
                                @delete="showModalForm('disciplinaryParameter', 'delete', { id: item['id'] })"
                            />
                        </bsb-tbody-empty>
                    </bsb-table>
                    <bsb-table-responsive-footer>
                        <bsb-data-index
                            :first-item="result.meta['first_item']"
                            :last-item="result.meta['last_item']"
                            :total="result.meta['total']"
                        />
                        <bsb-page-button-group v-model="query.page" :last-page="result.meta['last_page']" @changed="search" />
                    </bsb-table-responsive-footer>
                </bsb-table-responsive>
            </bsb-card-body-spinner-error>
        </bsb-card>
        <!-- Modal Form -->
        <DisciplinaryParameterModalForms ref="disciplinaryParameter" @success="search" />
    </fragment>
</template>

<script>
import mixin from './mixin'
import DisciplinaryParameterDataQuery from './DataQuery'
import DisciplinaryParameterDataRow from './DataRow'
import DisciplinaryParameterModalForms from './ModalForms'

export default {
    mixins: [mixin],
    components: { DisciplinaryParameterDataQuery, DisciplinaryParameterDataRow, DisciplinaryParameterModalForms },
}
</script>