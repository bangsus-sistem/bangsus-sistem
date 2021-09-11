<template>
    <fragment>
        <bsb-access-wrapper module-ref="role" action-ref="update">
            <bsb-modal-form
                title="Aktifkan Role"
                message="Apakah anda yakin?"
                ref="activate"
                link="/ajax/auth/role/activate"
                method="patch"
                @success="$emit('success')"
            />
            <bsb-modal-form
                title="Nonaktifkan Role"
                message="Apakah anda yakin?"
                ref="deactivate"
                link="/ajax/auth/role/deactivate"
                method="patch"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
        <bsb-access-wrapper module-ref="role" action-ref="delete">
            <bsb-modal-form
                title="Hapus Role"
                message="Apakah anda yakin?"
                ref="delete"
                link="/ajax/auth/role"
                method="delete"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
    </fragment>
</template>