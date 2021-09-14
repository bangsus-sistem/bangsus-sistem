<template>
    <fragment>
        <h3>Karyawan</h3>
        <bsb-mobile-card-spinner-error
            class="mt-3"
            :loading="state.page.loading"
            :error="state.page.error"
            :error-message="state.page.message"
        >
            <h5 class="mb-3">Daftar Karyawan</h5>
            <bsb-access-wrapper module-ref="employee" action-ref="create">
                <bsb-button-router-link-create :to="{ name: 'hrm.employee.create' }" />
            </bsb-access-wrapper>
            <EmployeeDataQuery
                :loading="state.result.loading"
                @search="search"
                v-model="query"
                :resources="resources"
            />
            <bsb-item-count
                :options="meta.counts"
                v-model="query.count"
                @input="search"
                class="mt-3"
            />
            <bsb-list-group-empty class="mt-3 shadow-sm" :items="result.items">
                <EmployeeDataRow
                    v-for="(item, i) in result.items"
                    :key="i"
                    :num="i + 1"
                    :item="item"
                    @admit="showModalForm('employee', 'admit', { id: item['id'] })"
                    @delete="showModalForm('employee', 'delete', { id: item['id'] })"
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
        <EmployeeModalForms ref="employee" @success="search" />
    </fragment>
</template>

<script>
import mixin from './mixin'
import EmployeeDataQuery from './DataQuery'
import EmployeeDataRow from './DataRow'
import EmployeeModalForms from './ModalForms'

export default {
    mixins: [mixin],
    components: { EmployeeDataQuery, EmployeeDataRow, EmployeeModalForms },
}
</script>