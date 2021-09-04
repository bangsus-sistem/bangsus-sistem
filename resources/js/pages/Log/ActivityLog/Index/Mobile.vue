<template>
    <fragment>
        <h3>Log Aktivitas</h3>
        <cb-mobile-card-spinner-error
            class="mt-3"
            :loading="state.page.loading"
            :error="state.page.error"
            :error-message="state.page.message"
        >
            <h5 class="mb-3">Daftar Log Aktivitas</h5>
            <ActivityLogDataQuery
                :loading="state.result.loading"
                @search="search"
                v-model="query"
                :resources="resources"
            />
            <cb-item-count
                :options="meta.counts"
                v-model="query.count"
                @input="search"
                class="mt-3"
            />
            <cb-list-group-empty class="mt-3 shadow-sm" :items="result.items">
                <ActivityLogDataRow
                    v-for="(item, i) in result.items"
                    :key="i"
                    :num="i + 1"
                    :item="item"
                    @activate="showModalForm('activityLog', 'activate', { id: item['id'] })"
                    @deactivate="showModalForm('activityLog', 'deactivate', { id: item['id'] })"
                    @delete="showModalForm('activityLog', 'delete', { id: item['id'] })"
                />
            </cb-list-group-empty>
            <div class="mt-3 text-center">
                <cb-data-index
                    :first-item="result.meta['first_item']"
                    :last-item="result.meta['last_item']"
                    :total="result.meta['total']"
                />
                <cb-page-button-group v-model="query.page" :last-page="result.meta['last_page']" @changed="search" />
            </div>
        </cb-mobile-card-spinner-error>
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