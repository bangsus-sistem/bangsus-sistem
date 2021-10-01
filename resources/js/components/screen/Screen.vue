<template>
    <fragment>
        <template v-if="$isMobile()">
            <slot name="mobile" />
        </template>
        <template v-else>
            <slot name="desktop" />
        </template>
    </fragment>
</template>