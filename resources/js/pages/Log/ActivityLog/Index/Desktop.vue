<template>
    <fragment>
        <h3>Log Aktivitas</h3>
        <cb-card class="my-3">
            <cb-card-body-spinner-error
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
            >
                <h5 class="mb-3">Daftar Log Aktivitas</h5>
                <cb-table-responsive class="p-1 mt-3">
                    <cb-table-responsive-header>
                        <cb-item-count :options="meta.counts" v-model="query.count" @input="search" />
                    </cb-table-responsive-header>
                    <cb-table :hover="true">
                        <thead class="thead-light">
                            <ActivityLogDataQuery
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
                            <ActivityLogDataRow
                                v-for="(item, i) in result.items"
                                :key="i"
                                :num="i + 1"
                                :item="item"
                                @activate="showModalForm('activityLog', 'activate', { id: item['id'] })"
                                @deactivate="showModalForm('activityLog', 'deactivate', { id: item['id'] })"
                                @delete="showModalForm('activityLog', 'delete', { id: item['id'] })"
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
        <ActivityLogModalForms ref="activityLog" @success="search" />
    </fragment>
</template>

<script>
import mixin from './mixin'
import ActivityLogDataQuery from './DataQuery'
import ActivityLogDataRow from './DataRow'
import ActivityLogModalForms from './ModalForms'

export default {
    mixins: [mixin],
    components: { ActivityLogDataQuery, ActivityLogDataRow, ActivityLogModalForms },
}
</script>