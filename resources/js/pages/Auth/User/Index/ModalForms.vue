<template>
    <fragment>
        <bsb-access-wrapper module-ref="user" action-ref="update">
            <bsb-modal-form
                title="Aktifkan User"
                message="Apakah anda yakin?"
                ref="activate"
                link="/ajax/auth/user/activate"
                method="patch"
                @success="$emit('success')"
            />
            <bsb-modal-form
                title="Nonaktifkan User"
                message="Apakah anda yakin?"
                ref="deactivate"
                link="/ajax/auth/user/deactivate"
                method="patch"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
        <bsb-access-wrapper module-ref="user" action-ref="delete">
            <bsb-modal-form
                title="Hapus User"
                message="Apakah anda yakin?"
                ref="delete"
                link="/ajax/auth/user"
                method="delete"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
    </fragment>
</template>