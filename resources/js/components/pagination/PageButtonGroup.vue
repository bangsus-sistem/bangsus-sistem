<template>
    <div class="d-block">
        <ButtonGroup :sm="true">

            <!-- The left arrow button -->
            <Button
                button-type="outline"
                color="secondary"
                :disabled="currentPage == 1"
                @click="goToPage(1)"
            >
                <i class="fas fa-angle-double-left"></i>
            </Button>
            <Button
                button-type="outline"
                color="secondary"
                :disabled="currentPage == 1"
                @click="goToPage(currentPage - 1)"
            >
                <i class="fas fa-angle-left"></i>
            </Button>

            <!-- Page -->
            <Button
                button-type="outline"
                color="secondary"
                v-for="(pageObject, i) in pages"
                :key="i"
                :active="currentPage == pageObject.page"
                :disabled="pageObject.disabled"
                @click="goToPage(pageObject.page, pageObject.disabled)"
            >
                {{ pageObject.page }}
            </Button>

            <!-- The right arrow button -->
            <Button
                button-type="outline"
                color="secondary"
                :disabled="currentPage == lastPage"
                @click="goToPage(currentPage + 1)"
            >
                <i class="fas fa-angle-right"></i>
            </Button>
            <Button
                button-type="outline"
                color="secondary"
                :disabled="currentPage == lastPage"
                @click="goToPage(lastPage)"
            >
                <i class="fas fa-angle-double-right"></i>
            </Button>

        </ButtonGroup>
    </div>
</template>

<script>
import Button from '../buttons/Button'
import ButtonGroup from '../buttons/ButtonGroup'

export default {
    components: {
        Button,
        ButtonGroup,
    },
    props: {
        value: {
            type: Number,
            default: 1,
        },
        lastPage: {
            type: Number,
            default: 1,
        },
        boxes: {
            type: Number,
            default: 9,
        },
        miscLabel: {
            default: '...',
        }
    },
    computed: {
        leftRangeLimit() {
            return this.lastPage > this.boxes
                ?   Math.ceil(this.boxes / 2)
                :   this.boxes
        },
        rightRangeLimit() {
            return this.lastPage > this.boxes
                ?   this.lastPage - Math.floor(this.boxes / 2)
                :   this.boxes
        },
        leftRangeMeta() {
            return {
                firstPage: 1,
                lastPage: this.lastPage < this.boxes - 1
                    ?   this.lastPage
                    :   (this.boxes - 1),
                misc: this.lastPage >= this.boxes - 1
            }
        },
        middleRangeMeta() {
            return {
                firstPage: this.currentPage - this.rangeDeviation,
                lastPage: this.currentPage + this.rangeDeviation,
            }
        },
        rightRangeMeta() {
            return {
                firstPage: this.lastPage - this.boxes + 2,
                lastPage: this.lastPage
            }
        },
        rangeDeviation() {
            return (Math.floor(this.boxes / 2) - 1)
        },
        rangeStatement() {
            let range
            
            switch (true) {
                case this.currentPage <= this.leftRangeLimit :
                    range = 'left'
                    break
                case this.leftRangeLimit < this.currentPage && this.currentPage < this.rightRangeLimit :
                    range = 'middle'
                    break
                case this.rightRangeLimit <= this.currentPage :
                    range = 'right'
                    break
                default :
            }

            return range
        },
        pages() {
            return this.generatePages()
        },
        currentPage() {
            let currentPage

            if (this.value > this.lastPage) {
                currentPage = this.lastPage
                this.goToPage(currentPage)
            } else {
                currentPage = this.value
            }

            return currentPage
        },
    },
    methods: {
        generatePages() {
            let pages
            
            switch (this.rangeStatement) {
                case 'left' :
                    pages = this.generateLeftRangePages()
                    break
                case 'middle' :
                    pages = this.generateMiddleRangePages()
                    break
                case 'right' :
                    pages = this.generateRightRangePages()
                    break
                default :
            }
            
            return pages
        },
        generateLeftRangePages() {
            let pages = []
            let leftRangeMeta = this.leftRangeMeta
            
            for (let page = leftRangeMeta.firstPage; page <= leftRangeMeta.lastPage; page++) {
                pages.push({
                    page: page,
                    disabled: false,
                })
            }
            if (leftRangeMeta.misc) {
                pages.push({
                    page: this.miscLabel,
                    disabled: true,
                })
            }

            return pages
        },
        generateMiddleRangePages() {
            let pages = []
            let middleRangeMeta = this.middleRangeMeta
            
            pages.push({
                page: this.miscLabel,
                disabled: true,
            })
            for (let page = middleRangeMeta.firstPage; page <= middleRangeMeta.lastPage; page++) {
                pages.push({
                    page: page,
                    disabled: false,
                })
            }
            pages.push({
                page: this.miscLabel,
                disabled: true,
            })
            
            return pages
        },
        generateRightRangePages() {
            let pages = []
            let rightRangeMeta = this.rightRangeMeta
            
            pages.push({
                page: this.miscLabel,
                disabled: true,
            })
            for (let page = rightRangeMeta.firstPage; page <= rightRangeMeta.lastPage; page++) {
                pages.push({
                    page: page,
                    disabled: false,
                })
            }

            return pages
        },
        goToPage(page, prevent = false) {
            this.$emit('input', page)
            this.$emit('changed')
        }
    }
}
</script>