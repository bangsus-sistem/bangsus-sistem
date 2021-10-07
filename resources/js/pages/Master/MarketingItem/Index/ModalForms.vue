<template>
    <fragment>
        <bsb-access-wrapper module-ref="marketing_item" action-ref="update">
            <bsb-modal-form
                title="Aktifkan Item Marketing"
                message="Apakah anda yakin?"
                ref="activate"
                link="/ajax/master/marketing_item/activate"
                method="patch"
                @success="$emit('success')"
            />
            <bsb-modal-form
                title="Nonaktifkan Item Marketing"
                message="Apakah anda yakin?"
                ref="deactivate"
                link="/ajax/master/marketing_item/deactivate"
                method="patch"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
        <bsb-access-wrapper module-ref="marketing_item" action-ref="delete">
            <bsb-modal-form
                title="Hapus Item Marketing"
                message="Apakah anda yakin?"
                ref="delete"
                link="/ajax/master/marketing_item"
                method="delete"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
    </fragment>
</template>