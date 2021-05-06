<template>
                                        <v-row class="mt-5">
                                             <v-col cols="12" md="6">
                                                 <v-list>
                                                    <v-list-item
                                                    style="border: 1px solid grey">
                                                        <v-list-item-title class="fs-5">
                                                             Expense Categories
                                                        </v-list-item-title>
                                                    </v-list-item>
                                                    <v-list-item v-for="x in labels.length" :key="x"
                                                    style="border: 1px solid grey"
                                                    class="fw-bold">
                                                         {{labels[x - 1]}}
                                                    </v-list-item>
                                                   
                                                 </v-list>
                                             </v-col>
                                             <v-col cols="12" md="6">
                                                 <v-list>
                                                    <v-list-item 
                                                    style="border: 1px solid grey">
                                                        <v-list-item-title class="fs-5">
                                                             Total
                                                        </v-list-item-title>
                                                    </v-list-item>
                                                    <v-list-item v-for="x in series.length" :key="x"
                                                    style="border: 1px solid grey"
                                                    class="fw-bold">
                                                         {{series[x - 1]}}
                                                    </v-list-item>
                                                 </v-list>
                                             </v-col>
                                         </v-row>
</template>

<script>
    export default {
        props:{
            series: Array,
            labels: Array
        },
    }
</script>
