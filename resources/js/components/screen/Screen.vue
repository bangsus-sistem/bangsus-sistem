<template>
    <div v-frag>
        <template v-if="$isMobile()">
            <slot name="mobile" />
        </template>
        <template v-else>
            <slot name="desktop" />
        </template>
    </div>
</template>