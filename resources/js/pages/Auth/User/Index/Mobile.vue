<template>
    <fragment>
        <h3>User</h3>
        <bsb-mobile-card-spinner-error
            class="mt-3"
            :loading="state.page.loading"
            :error="state.page.error"
            :error-message="state.page.message"
        >
            <h5 class="mb-3">Daftar User</h5>
            <bsb-access-wrapper module-ref="user" action-ref="create">
                <bsb-button-router-link-create :to="{ name: 'auth.user.create' }" />
            </bsb-access-wrapper>
            <UserDataQuery
                :loading="state.result.loading"
                :resources="resources"
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
                <UserDataRow
                    v-for="(item, i) in result.items"
                    :key="i"
                    :num="i + 1"
                    :item="item"
                    @activate="showModalForm('user', 'activate', { id: item['id'] })"
                    @deactivate="showModalForm('user', 'deactivate', { id: item['id'] })"
                    @delete="showModalForm('user', 'delete', { id: item['id'] })"
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
        <UserModalForms ref="user" @success="search" />
    </fragment>
</template>

<script>
import mixin from './mixin'
import UserDataQuery from './DataQuery'
import UserDataRow from './DataRow'
import UserModalForms from './ModalForms'

export default {
    mixins: [mixin],
    components: { UserDataQuery, UserDataRow, UserModalForms },
}
</script>