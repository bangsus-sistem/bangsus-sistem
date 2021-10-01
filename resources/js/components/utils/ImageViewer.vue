<template>
    <div v-frag>
        <div class="image-large-viewer-wrapper" v-if="largeViewerOpened">
            <button class="btn btn-image-large-viewer-close" @click="closeLargeViewer">
                <Icon color="light" icon="times" size="2x" />
            </button>
            <img :src="imageLink" class="image-uploaded-large-viewer">
        </div>
        <div class="mb-3" v-else>
            <img
                v-if="mode === 'image'"
                :src="imageLink"
                class="image-uploaded"
                :class="'image-uploaded-' + this.size"
                @click="openLargeViewer"
            >
            <a
                v-else-if="mode === 'link'"
                href="#"
                @click="openLargeViewer"
            >
                Lihat Gambar
            </a>
        </div>
    </div>
</template>

<script>
import Icon from '../icons/Icon'

export default {
    props: {
        id: {
            required: true,
        },
        mode: {
            type: String,
            default: 'image',
        },
        size: {
            type: String,
            default: 'm',
        },
    },
    components: {
        Icon,
    },
    data() {
        return {
            largeViewerOpened: false
        }
    },
    methods: {
        openLargeViewer() {
            this.largeViewerOpened = true
        },
        closeLargeViewer() {
            this.largeViewerOpened = false
        },
    },
    computed: {
        imageLink() {
            return '/storage/image/' + this.id
        }
    }
}
</script>