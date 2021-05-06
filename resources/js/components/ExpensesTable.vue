<template>
    <div>
                        <v-card-title>
                            <v-container class="d-flex justify-content-end">
                                <span class="fs-5">Expense Management <v-icon>mdi-chevron-right</v-icon></span>
                                <span class="fs-5">Expense Categories</span>
                            </v-container>
                        </v-card-title>

                        <v-card-text>

                            <v-row no-gutters>
                                <v-col cols="12" md="3">
                                    <v-card class="pa-2" outlined tile
                                    color="#C0C0C0">
                                         <span class="fw-bold">Expense Category</span>
                                    </v-card>
                                </v-col>
                                <v-col cols="12" md="3">
                                    <v-card class="pa-2" 
                                    outlined tile
                                    color="#C0C0C0">
                                         <span class="fw-bold">Amount</span>
                                    </v-card>
                                </v-col>
                                <v-col cols="12" md="3">
                                    <v-card class="pa-2" 
                                    outlined tile
                                    color="#C0C0C0">
                                         <span class="fw-bold">Entry Date</span>
                                    </v-card>
                                </v-col>
                                <v-col cols="12" md="3">
                                    <v-card class="pa-2" 
                                    outlined tile
                                    color="#C0C0C0">
                                         <span class="fw-bold">Created At</span>
                                    </v-card>
                                </v-col>
                            </v-row>
                                <v-row no-gutters
                                v-for="exp in expenses" :key= "exp.id"
                                v-on:click = "$emit('update-expenses', exp.category,exp.amount,exp.entry_date,exp.id)">
                                    <v-col cols="12" md="3">
                                        <v-card
                                        class="pa-2"
                                        outlined
                                        tile
                                        >
                                        {{exp.category}}
                                        </v-card>
                                    </v-col>
                                    <v-col cols="12" md="3">
                                        <v-card
                                        class="pa-2"
                                        outlined
                                        tile
                                        >
                                        {{exp.amount}}
                                        </v-card>
                                    </v-col>

                                    <v-col cols="12" md="3">
                                        <v-card
                                        class="pa-2"
                                        outlined
                                        tile
                                        >
                                        {{exp.entry_date}}
                                        </v-card>
                                    </v-col>

                                    <v-col cols="12" md="3">
                                        <v-card
                                        class="pa-2"
                                        outlined
                                        tile
                                        >
                                        {{exp.created_at}}
                                        </v-card>
                                    </v-col>
                                </v-row>
                        </v-card-text>
                        <v-card-actions
                        class="float-end">
                            <v-btn elevation="1"
                            v-on:click = "$emit('open-expenses')"
                            color="#E0E0E0">
                                <span class="fw-bold">Add Expenses</span>
                            </v-btn>
                        </v-card-actions>
    </div>
</template>

<script>
    export default {
        props:{
            expenses: Array
        },
    }
</script>
