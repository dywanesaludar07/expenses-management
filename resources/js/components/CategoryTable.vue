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
                                <v-col cols="12" md="4">
                                    <v-card class="pa-2" outlined tile
                                    color="#C0C0C0">
                                         <span class="fw-bold">Display Name</span>
                                    </v-card>
                                </v-col>
                                <v-col cols="12" md="4">
                                    <v-card class="pa-2" 
                                    outlined tile
                                    color="#C0C0C0">
                                         <span class="fw-bold">Description</span>
                                    </v-card>
                                </v-col>
                                <v-col cols="12" md="4">
                                    <v-card class="pa-2" 
                                    outlined tile
                                    color="#C0C0C0">
                                         <span class="fw-bold">Created at</span>
                                    </v-card>
                                </v-col>
                            </v-row>
                                <v-row no-gutters
                                v-for="cat in category" :key= "cat.id"
                                v-on:click = "$emit('update-category', cat.category_name,cat.category_description,cat.id)">
                                    <v-col cols="12" md="4">
                                        <v-card
                                        class="pa-2"
                                        outlined
                                        tile
                                        >
                                        {{cat.category_name}}
                                        </v-card>
                                    </v-col>
                                    <v-col cols="12" md="4">
                                        <v-card
                                        class="pa-2"
                                        outlined
                                        tile
                                        >
                                        {{cat.category_description}}
                                        </v-card>
                                    </v-col>
                                    <v-col cols="12" md="4">
                                        <v-card
                                        class="pa-2"
                                        outlined
                                        tile
                                        >
                                        {{cat.created_at}}
                                        </v-card>
                                    </v-col>
                                </v-row>
                        </v-card-text>
                        <v-card-actions
                        class="float-end">
                            <v-btn elevation="1"
                            v-on:click = "$emit('open-category')"
                            color="#E0E0E0">
                                <span class="fw-bold">Add Category</span>
                            </v-btn>
                        </v-card-actions>
    </div>
</template>

<script>
    export default {
        props:{
            category: Array
        },
    }
</script>
