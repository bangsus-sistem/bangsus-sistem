<template>
    <fragment>
        <h3>Role</h3>
        <cb-mobile-card-spinner-error
            class="mt-3"
            :loading="state.page.loading"
            :error="state.page.error"
            :error-message="state.page.message"
        >
            <h5 class="mb-3">Daftar Role</h5>
            <cb-access-wrapper module-ref="role" action-ref="create">
                <cb-button-router-link-create :to="{ name: 'auth.role.create' }" />
            </cb-access-wrapper>
            <RoleDataQuery
                :loading="state.result.loading"
                @search="search"
                v-model="query"
            />
            <cb-item-count
                :options="meta.counts"
                v-model="query.count"
                @input="search"
                class="mt-3"
            />
            <cb-list-group-empty class="mt-3 shadow-sm" :items="result.items">
                <RoleDataRow
                    v-for="(item, i) in result.items"
                    :key="i"
                    :num="i + 1"
                    :item="item"
                    @activate="showModalForm('role', 'activate', { id: item['id'] })"
                    @deactivate="showModalForm('role', 'deactivate', { id: item['id'] })"
                    @delete="showModalForm('role', 'delete', { id: item['id'] })"
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
        <RoleModalForms ref="role" @success="search" />
    </fragment>
</template>

<script>
import mixin from './mixin'
import RoleDataQuery from './DataQuery'
import RoleDataRow from './DataRow'
import RoleModalForms from './ModalForms'

export default {
    mixins: [mixin],
    components: { RoleDataQuery, RoleDataRow, RoleModalForms },
}
</script>