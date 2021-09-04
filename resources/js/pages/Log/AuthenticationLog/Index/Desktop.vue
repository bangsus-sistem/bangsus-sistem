<template>
    <fragment>
        <h3>Log Autentikasi</h3>
        <cb-card class="my-3">
            <cb-card-body-spinner-error
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
            >
                <h5 class="mb-3">Daftar Log Autentikasi</h5>
                <cb-table-responsive class="p-1 mt-3">
                    <cb-table-responsive-header>
                        <cb-item-count :options="meta.counts" v-model="query.count" @input="search" />
                    </cb-table-responsive-header>
                    <cb-table :hover="true">
                        <thead class="thead-light">
                            <AuthenticationLogDataQuery
                                :loading="state.result.loading"
                                @search="search"
                                v-model="query"
                            />
                            <cb-tr-sort
                                :sort-orders="meta.sortOrders"
                                :sort="query['sort']"
                                :order="query['order']"
                                v-model="query"
                                @sort="changeSortOrder"
                            />
                        </thead>
                        <cb-tbody-empty :items="result.items" :col="meta.sortOrders.length">
                            <AuthenticationLogDataRow
                                v-for="(item, i) in result.items"
                                :key="i"
                                :num="i + 1"
                                :item="item"
                                @activate="showModalForm('authenticationLog', 'activate', { id: item['id'] })"
                                @deactivate="showModalForm('authenticationLog', 'deactivate', { id: item['id'] })"
                                @delete="showModalForm('authenticationLog', 'delete', { id: item['id'] })"
                            />
                        </cb-tbody-empty>
                    </cb-table>
                    <cb-table-responsive-footer>
                        <cb-data-index
                            :first-item="result.meta['first_item']"
                            :last-item="result.meta['last_item']"
                            :total="result.meta['total']"
                        />
                        <cb-page-button-group v-model="query.page" :last-page="result.meta['last_page']" @changed="search" />
                    </cb-table-responsive-footer>
                </cb-table-responsive>
            </cb-card-body-spinner-error>
        </cb-card>
        <!-- Modal Form -->
        <AuthenticationLogModalForms ref="authenticationLog" @success="search" />
    </fragment>
</template>

<script>
import mixin from './mixin'
import AuthenticationLogDataQuery from './DataQuery'
import AuthenticationLogDataRow from './DataRow'
import AuthenticationLogModalForms from './ModalForms'

export default {
    mixins: [mixin],
    components: { AuthenticationLogDataQuery, AuthenticationLogDataRow, AuthenticationLogModalForms },
}
</script>