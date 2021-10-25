<template>
    <fragment>
        <bsb-access-wrapper module-ref="operational_photo" action-ref="delete">
            <bsb-modal-form
                title="Hapus Form Foto Operasional"
                message="Apakah anda yakin?"
                ref="delete"
                link="/ajax/operational/operational_photo"
                method="delete"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
    </fragment>
</template>