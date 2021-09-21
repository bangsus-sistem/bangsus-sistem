<template>
    <fragment>
        <bsb-access-wrapper module-ref="branch" action-ref="update">
            <bsb-modal-form
                title="Aktifkan Cabang"
                message="Apakah anda yakin?"
                ref="activate"
                link="/ajax/system/branch/activate"
                method="patch"
                @success="$emit('success')"
            />
            <bsb-modal-form
                title="Nonaktifkan Cabang"
                message="Apakah anda yakin?"
                ref="deactivate"
                link="/ajax/system/branch/deactivate"
                method="patch"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
        <bsb-access-wrapper module-ref="branch" action-ref="delete">
            <bsb-modal-form
                title="Hapus Cabang"
                message="Apakah anda yakin?"
                ref="delete"
                link="/ajax/system/branch"
                method="delete"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
    </fragment>
</template>