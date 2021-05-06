<template>
    <div>
                        <v-card-title>
                            <v-container class="d-flex justify-content-end">
                                <span class="fs-5">User Management <v-icon>mdi-chevron-right</v-icon></span>
                                <span class="fs-5">Users</span>
                            </v-container>
                        </v-card-title>

                        <v-card-text>

                            <v-row no-gutters>
                                <v-col cols="12" md="3">
                                    <v-card class="pa-2" outlined tile
                                    color="#C0C0C0">
                                         <span class="fw-bold">Name</span>
                                    </v-card>
                                </v-col>
                                <v-col cols="12" md="3">
                                    <v-card class="pa-2" 
                                    outlined tile
                                    color="#C0C0C0">
                                         <span class="fw-bold">Email Adress</span>
                                    </v-card>
                                </v-col>
                                <v-col cols="12" md="3">
                                    <v-card class="pa-2" 
                                    outlined tile
                                    color="#C0C0C0">
                                         <span class="fw-bold">Role</span>
                                    </v-card>
                                </v-col>
                                <v-col cols="12" md="3">
                                    <v-card class="pa-2" 
                                    outlined tile
                                    color="#C0C0C0">
                                         <span class="fw-bold">Created at</span>
                                    </v-card>
                                </v-col>
                            </v-row>
                            
                                <v-row no-gutters
                                v-for="user in users" :key= "user.id"
                                v-on:click = "$emit('update-user',user.id,user.name,user.email,user.role_id)"
                                >
                                    <v-col cols="12" md="3">
                                        <v-card
                                        class="pa-2"
                                        outlined
                                        tile
                                        >
                                        {{user.name}}
                                        </v-card>
                                    </v-col>
                                    <v-col cols="12" md="3">
                                        <v-card
                                        class="pa-2"
                                        outlined
                                        tile
                                        >
                                        {{user.email}}
                                        </v-card>
                                    </v-col>
                                    <v-col cols="12" md="3">
                                        <v-card
                                        class="pa-2"
                                        outlined
                                        tile
                                        >
                                        {{user.role_name}}
                                        </v-card>
                                    </v-col>
                                      <v-col cols="12" md="3">
                                        <v-card
                                        class="pa-2"
                                        outlined
                                        tile
                                        >
                                        {{user.created_at}}
                                        </v-card>
                                    </v-col>
                                </v-row>
                        </v-card-text>
                        <v-card-actions
                        class="float-end">
                            <v-btn elevation="1"
                            v-on:click = "$emit('open-user')"
                            color="#E0E0E0">
                                <span class="fw-bold">Add User</span>
                            </v-btn>
                        </v-card-actions>
    </div>
</template>

<script>
    export default {
        props:{
            users: Array
        },
    }
</script>
