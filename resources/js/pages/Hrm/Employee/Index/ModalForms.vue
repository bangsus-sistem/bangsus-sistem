<template>
    <fragment>
        <bsb-access-wrapper module-ref="employee" action-ref="admit">
            <bsb-modal-form
                title="Terima Pengajuan Karyawan"
                message="Apakah anda yakin?"
                ref="admit"
                link="/ajax/hrm/employee/admit"
                method="patch"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
        <bsb-access-wrapper module-ref="employee" action-ref="delete">
            <bsb-modal-form
                title="Hapus Karyawan"
                message="Apakah anda yakin?"
                ref="delete"
                link="/ajax/hrm/employee"
                method="delete"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
    </fragment>
</template>