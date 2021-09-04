<template>
    <fragment>
        <cb-access-wrapper module-ref="role" action-ref="update">
            <cb-modal-form
                title="Aktifkan Role"
                message="Apakah anda yakin?"
                ref="activate"
                link="/ajax/auth/role/activate"
                method="patch"
                @success="$emit('success')"
            />
            <cb-modal-form
                title="Nonaktifkan Role"
                message="Apakah anda yakin?"
                ref="deactivate"
                link="/ajax/auth/role/deactivate"
                method="patch"
                @success="$emit('success')"
            />
        </cb-access-wrapper>
        <cb-access-wrapper module-ref="role" action-ref="delete">
            <cb-modal-form
                title="Hapus Role"
                message="Apakah anda yakin?"
                ref="delete"
                link="/ajax/auth/role"
                method="delete"
                @success="$emit('success')"
            />
        </cb-access-wrapper>
    </fragment>
</template>