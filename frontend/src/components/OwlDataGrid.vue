<template>
    <div class="d-flex justify-content-between">
        <div class="form-group pe-3">
            <div class="input-group shadow">
                <select class="form-select pe-5" @change="sort(this.sortAsc)" v-model="sortColumn">
                    <option value="">Urutkan Berdasarkan</option>
                    <option v-for="(column, index) in columns" v-bind:key="index" :class="column.orderable ? 'd-block' : 'd-none'" :value="index">{{ column.data }}</option>
                </select>
                <button class="btn mb-0 bg-gradient-info" type="button" @click="sort(!this.sortAsc)">
                    <font-awesome-icon :icon="sortAsc ? 'arrow-down-a-z' : 'arrow-up-a-z'" />
                </button>
            </div>
        </div>
        <div class="form-group">
            <input type="text" class="form-control shadow" placeholder="Pencarian..." v-model="formSearch" @change="pageChange(1)">
        </div>
    </div>
    <div class="row">
        <slot />
    </div>
    <div class="d-flex justify-content-between">
        <div class="form-group d-none d-sm-block">
            <div class="input-group shadow">
                <span class="input-group-text">Data per halaman</span>
                <select class="form-select pe-5" v-model="this.dataPerPage" @change="pageChange(1)">
                    <option v-for="(dataCount, index) in dataCounts" v-bind:key="index">{{ dataCount }}</option>
                </select>
            </div>
        </div>
        <div class="pagination mb-3 d-flex justify-content-between">
            <owl-pagination-item first @click="pageChange(1)"></owl-pagination-item>
            <owl-pagination-item prev @click="pageChange(this.curentPage - 1)"></owl-pagination-item>
            <owl-pagination-item v-for="p in lastPage" :key="p" :active="curentPage == p ? true : false" :label="p.toString()" @click="pageChange(p)" :class="p > this.curentPage + 2 || p < this.curentPage - 2 ? 'd-none' : ''"></owl-pagination-item>
            <owl-pagination-item next @click="pageChange(this.curentPage + 1)"></owl-pagination-item>
            <owl-pagination-item last @click="pageChange(this.lastPage)"></owl-pagination-item>
        </div>
    </div>
</template>

<script>
import OwlPaginationItem from '@/components/OwlPaginationItem.vue';

export default {
    name: "OwlDatatable",
    components: { OwlPaginationItem },
    data: () => {
        return {
            sortColumn: 0,
            sortAsc: true,
            formSearch: '',
            dataPerPage: 0,
            curentPage: 1,
            lastPage: 1,
            datas: {}
        }
    },
    props: {
        url: String,
        filters: Object,
        action: String,
        class: String,
        dataCounts: {
            type: Array,
            default: () => [10, 50, 100]
        },
        columns: {
            type: Object,
            required: true
        }
    },
    mounted() {
        this.dataPerPage = this.dataCounts[0];
        this.refreshData();
    },
    emits: ['set-datas'],
    methods: {
        sort(sortType) {
            this.sortAsc = sortType;
            this.refreshData();
        },
        pageChange(page) {
            if (page != this.pageActive && page > 0) {
                this.curentPage = page;
                this.refreshData();
            }
        },
        refreshData() {
            this.axios.get(this.url, {
                params: {
                    filters: this.filters,
                    start: (this.curentPage - 1) * this.dataPerPage,
                    length: this.dataPerPage,
                    search: {
                        value: this.formSearch,
                        regex: false
                    },
                    order: [
                        {
                            column: this.sortColumn,
                            dir: this.sortAsc ? 'asc' : 'desc'
                        }
                    ],
                    columns: this.columns
                }
            }).then((response) => {
                this.lastPage = Math.ceil(response.data.recordsFiltered / this.dataPerPage);
                this.datas = response.data.data;
                this.$emit('set-datas', response.data.data);
            });
        },
    }
}
</script>