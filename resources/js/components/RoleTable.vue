<template>
    <div>
                        <v-card-title>
                            <v-container class="d-flex justify-content-end">
                                <span class="fs-5">User Management <v-icon>mdi-chevron-right</v-icon></span>
                                <span class="fs-5">Roles</span>
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
                                v-for="role in roles" :key= "role.id"
                                v-on:click = "$emit('update-role', role.role_name,role.role_description,role.id)">
                                    <v-col cols="12" md="4">
                                        <v-card
                                        class="pa-2"
                                        outlined
                                        tile
                                        >
                                        {{role.role_name}}
                                        </v-card>
                                    </v-col>
                                    <v-col cols="12" md="4">
                                        <v-card
                                        class="pa-2"
                                        outlined
                                        tile
                                        >
                                        {{role.role_description}}
                                        </v-card>
                                    </v-col>
                                    <v-col cols="12" md="4">
                                        <v-card
                                        class="pa-2"
                                        outlined
                                        tile
                                        >
                                        {{role.created_at}}
                                        </v-card>
                                    </v-col>
                                </v-row>
                        </v-card-text>
                        <v-card-actions
                        class="float-end">
                            <v-btn elevation="1"
                            v-on:click = "$emit('open-role')"
                            color="#E0E0E0">
                                <span class="fw-bold">Add Role</span>
                            </v-btn>
                        </v-card-actions>
    </div>
</template>

<script>
    export default {
        props:{
            roles: Array
        },
    }
</script>
