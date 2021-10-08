<template>
    <div v-frag>
        <bsb-table-responsive>
            <bsb-table :bordered="true">
                <thead>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Benar</th>
                    <th></th>
                </thead>
                <tbody>
                    <tr v-for="(disciplinaryValue, i) in disciplinaryValues" :key="i">
                        <td>{{ i + 1 }}</td>
                        <td>
                            <span v-if="readonly">
                                {{ disciplinaryValues[i]['name'] }}
                            </span>
                            <bsb-input-errors size="sm" v-model="disciplinaryValues[i]['name']" :errors="disciplinaryValueErrors[i] != null ? disciplinaryValueErrors[i]['name'] : []" v-else />
                        </td>
                        <bsb-td justify="center">
                            <bsb-switch-icon
                                :value="disciplinaryValues[i]['expected_value']"
                                v-if="readonly"
                            />
                            <input
                                type="checkbox"
                                v-model="disciplinaryValues[i]['expected_value']"
                                :value="true"
                                v-else
                            >
                        </bsb-td>
                        <td>
                            <bsb-button size="sm" color="danger" type="button" @click="deleteValue(i)" v-if="!readonly">Hapus</bsb-button>
                        </td>
                    </tr>
                </tbody>
            </bsb-table>
        </bsb-table-responsive>
        <bsb-button size="sm" type="button" @click="addValues" v-if="!readonly">Tambah</bsb-button>
        {{ errors }}
    </div>
</template>

<script>
export default {
    props: {
        value: {
            type: Array,
            default() {
                return []
            }
        },
        errors: {
            type: Array,
            default() {
                return []
            }
        },
        readonly: {
            type: Boolean,
            default: false,
        },
    },
    data() {
        return {
            disciplinaryValues: this.value,
            disciplinaryValueErrors: this.errors,
        }
    },
    watch: {
        value(ne, old) {
            this.$emit('input', ne)
        }
    },
    methods: {
        addValues() {
            this.disciplinaryValues.push({
                'name': '',
                'expected_value': false,
            })
            this.disciplinaryValueErrors.push({
                'name': [],
                'expected_value': [],
            })
        },
        deleteValue(i) {
            this.disciplinaryValues.splice(i, 1)
            this.disciplinaryValueErrors.splice(i, 1)
        }
    },
}
</script>