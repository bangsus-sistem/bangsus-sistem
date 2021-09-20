<template>
    <div class="image-large-viewer-wrapper" v-if="state.open">
        <video ref="video" :width="config.width" :height="config.height" playsinline autoplay v-show="state.video" class="image-uploaded-large-viewer"></video>
        <canvas ref="canvas" :width="config.width" :height="config.height" v-show="state.canvas" class="image-uploaded-large-viewer"></canvas>
        <button type="button" class="btn btn-image-large-viewer-close" @click="close">
            <Icon color="light" icon="times" size="2x" />
        </button>
        <div class="btn-image-large-viewer-capture">
            <template v-if="!state.captured">
                <button type="button" class="btn" @click="flip">
                    <Icon color="light" icon="circle-notch" size="2x" />
                </button>
                <button type="button" class="btn" @click="capture">
                    <Icon color="light" icon="camera" size="2x" />
                </button>
            </template>
            
            <template v-else>
                <button type="button" class="btn" @click="init">
                    <Icon color="light" icon="redo" size="2x" />
                </button>
                <button type="button" class="btn" @click="upload">
                    <Icon color="light" icon="check" size="2x" />
                </button>
            </template>
        </div>
    </div>
    <Button type="button" color="secondary" v-else @click="open()">Ambil Gambar</Button>
</template>

<script>
import Icon from '../icons/Icon'
import Button from '../buttons/Button'

export default {
    components: {
        Icon,
        Button,
    },
    data() {
        return {
            state: {
                allowCapture: false,
                open: false,
                video: false,
                canvas: false,
                done: false,
                captured: false,
            },
            config: {
                width: 0,
                height: 0
            },
            max: {
                width: 640
            },
            mode: {
                environment: true
            },
            id: null,
        }
    },
    methods: {
        init() {
            this.state.captured = false
            this.state.video = true
            this.state.canvas = false
            try {
                navigator.mediaDevices.getUserMedia({
                audio: false,
                video: { 'facingMode': this.mode.environment ? 'environment' : 'user' }
                })
                .then(stream => {
                    this.stream = stream
                    window.stream = stream
                    let { width, height } = this.stream.getTracks()[0].getSettings()
                    this.config.width = width
                    this.config.height = height

                    this.$refs.video.srcObject = this.stream

                    this.state.open = true
                })
            } catch (e) {
                console.log('webcam.js log: Exception on Webcam: ' + e.toString())
            }
        },
        stop() {
            this.stream.getTracks().forEach((track) => track.stop());
        },
        open() {
            this.state.open = true
            this.init()
        },
        close() {
            if (this.state.video) this.stop()
            this.state.open = false
        },
        capture() {
            this.state.captured = true
            this.state.canvas = true
            this.$refs.canvas.getContext('2d').drawImage(this.$refs.video, 0, 0, this.config.width, this.config.height)
            this.stop()
            this.state.video = false

            this.result = this.$refs.canvas.toDataURL('image/jpeg')
        },
        flip() {
            this.mode.environment = ! this.mode.environment
            this.stop()
            this.init()
        },
        upload() {
            axios.post('/storage/image/base64', { image: this.result })
                .then(res => {
                    const newId = res.data.id
                    if (this.id != null) {
                        axios.delete('/storage/image/' + this.id)
                            .then(res => {
                                this.id = newId
                                this.$emit('input', this.id)
                                console.log('emitted')
                            })
                    } else {
                        this.id = newId
                        this.$emit('input', this.id)
                        this.close()
                    }
                })
        },
    },
    props: {
        link: {
            default: null,
        },
    },
}
</script>