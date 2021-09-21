<template>
    <fragment>
        <bsb-access-wrapper module-ref="branch_type" action-ref="update">
            <bsb-modal-form
                title="Aktifkan Tipe Cabang"
                message="Apakah anda yakin?"
                ref="activate"
                link="/ajax/hrm/branch_type/activate"
                method="patch"
                @success="$emit('success')"
            />
            <bsb-modal-form
                title="Nonaktifkan Tipe Cabang"
                message="Apakah anda yakin?"
                ref="deactivate"
                link="/ajax/hrm/branch_type/deactivate"
                method="patch"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
        <bsb-access-wrapper module-ref="branch_type" action-ref="delete">
            <bsb-modal-form
                title="Hapus Tipe Cabang"
                message="Apakah anda yakin?"
                ref="delete"
                link="/ajax/hrm/branch_type"
                method="delete"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
    </fragment>
</template>