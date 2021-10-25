<template>
    <fragment>
        <bsb-access-wrapper module-ref="material_penalty" action-ref="delete">
            <bsb-modal-form
                title="Hapus Denda Bahan"
                message="Apakah anda yakin?"
                ref="delete"
                link="/ajax/penalty/material_penalty"
                method="delete"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
    </fragment>
</template>