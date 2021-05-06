<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" value="{{ csrf_token() }}" />
        <title> Expense Manager </title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">
        <link href="dist/app.css" rel="stylesheet">
        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    
    <body>
        <v-app id="app" v-cloak>
            <v-row>
                <v-col cols="12" md="3" style="background-color:#085e72"
                class="vh-auto">
                    <v-list style="background-color:#085e72">
                        <v-list-item>
                            <v-list-item-avatar>
                                <img src="{{url('/images/admin.jpg')}}" alt="Image"/>
                            </v-list-item-avatar>
                               <v-btn icon 
                               v-on:click = "pass_dialog = true">
                                  <v-icon color="white">mdi-cogs</v-icon>
                               </v-btn>
                        </v-list-item>

                        <v-list-group
                            :value="true"
                            color="white"
                            prepend-icon="mdi-account-circle"
                        >
                            <template v-slot:activator>
                                <v-list-item-title style="color: white">
                                    <span class="fw-bold">{{Auth::user()->name}}</span>
                                    <span>
                                        @if(Auth::user()->role_id == 1)
                                              (Admin)
                                        @endif
                                    </span>
                                </v-list-item-title>
                            </template>

                            <v-list-item link
                            v-on:click="cat = 0">
                                <v-list-item-content>
                                    <v-list-item-title>
                                        <span class="fw-bold text-light">Dashboard</span>
                                    </v-list-item-title>
                                </v-list-item-content>
                            </v-list-item>

                        @if(Auth::user()->role_id == 1)
                            <v-list-group
                            :value="true"
                            no-action
                            sub-group
                            color="white"
                            >
                                <template v-slot:activator>
                                    <v-list-item-content>
                                        <v-list-item-title>
                                            <span class="fw-bold text-light">User Management</span>
                                        </v-list-item-title>
                                    </v-list-item-content>
                                </template>

                                <v-list-item link
                                v-on:click = "cat = 1">
                                    <v-list-item-title>
                                        <span class="fw-bold text-light">Roles</span>
                                    </v-list-item-title>
                                </v-list-item>

                                <v-list-item link
                                v-on:click = "cat = 2">
                                    <v-list-item-title>
                                        <span class="fw-bold text-light">Users</span>
                                    </v-list-item-title>
                                </v-list-item>
                            </v-list-group>
                        @endif

                            <v-list-group
                            :value="true"
                            no-action
                            sub-group
                            color="white"
                            >
                                <template v-slot:activator>
                                    <v-list-item-content>
                                        <v-list-item-title>
                                            <span class="fw-bold text-light">Expenses Management</span>
                                        </v-list-item-title>
                                    </v-list-item-content>
                                </template>
                            @if(Auth::user()->role_id == 1)
                                <v-list-item link
                                v-on:click = "cat = 3">
                                    <v-list-item-title>
                                        <span class="fw-bold text-light">Expenses Category</span>
                                    </v-list-item-title>
                                </v-list-item>
                            @endif

                                <v-list-item link
                                v-on:click = "cat = 4">
                                    <v-list-item-title>
                                        <span class="fw-bold text-light">Expenses</span>
                                    </v-list-item-title>
                                </v-list-item>
                            </v-list-group>
                        </v-list-group>
                    </v-list>
                </v-col>

                <v-col cols="12" md="9">
                    <v-container class="d-flex justify-content-end">
                        <span class="fs-5">Welcome to Expense Manager</span>
                        <form method="GET" action="{{route('logout')}}">
                            <v-btn small elevation="0" class="mx-3"
                            type="submit">
                                <span class="fs-5 fw-bold">Logout</span>
                            </v-btn>
                        </form>
                    </v-container>
                   
                    <v-divider></v-divider>

                    <v-card class="rounded-lg"
                    v-if="cat == 0"
                    elevation ="0">
                            <v-card-title class="float-start">
                                  <span class="fw-bold fs-5">My Expenses</span>
                            </v-card-title>
                            <v-card-title class="float-end">
                                  <span class="fw-bold fs-5">Dashboard</span>
                            </v-card-title>

                            <v-container>
                                <v-card-text>
                                    <v-row>
                                        <v-col cols="12" md="5">
                                            <list-categories :series="series" :labels="labels"></list-categories>
                                        </v-col>
                                        <v-col cols="12" md="7">
                                            <div id="chart" class="mt-10">
                                                <apexchart type="pie" width="380" :options="chartOptions" :series="series"></apexchart>
                                            </div>
                                        </v-col>
                                    </v-row>    
                                </v-card-text>
                            </v-container>
                        </v-card-title>
                    </v-card>


                    <v-card class="rounded-lg"
                    v-if="cat == 1"
                    elevation ="1">
                            <role-table :roles = "rolesData"
                            v-on:update-role = "updateDialogRole"
                            v-on:open-role = "openDialogRole"></role-table>
                    </v-card>

                    <v-card class="rounded-lg"
                    v-if="cat == 2"
                    elevation ="1">
                            <user-table :users = "users"
                            v-on:update-user = "updateDialogUser"
                            v-on:open-user = "openDialogUser"></user-table>
                    </v-card>


                    <v-card class="rounded-lg"
                    v-if="cat == 3"
                    elevation ="1">
                          <category-table :category= "categories"
                          v-on:update-category = "updateDialogCategory"
                          v-on:open-category = "openDialogCategory"
                          ></category-table>
                    </v-card>


                    <v-card class="rounded-lg"
                    v-if="cat == 4"
                    elevation ="1">
                          <expenses-table :expenses= "expenses"
                          v-on:update-expenses = "updateDialogExpenses"
                          v-on:open-expenses = "openDialogExpenses"
                          ></category-table>
                    </v-card>
                </v-col>
            </v-row>



            <v-dialog v-model="dialog_role"
            persistent
            transition="dialog-bottom-transition"
            max-width = "600px"
            >
                <v-card>
                <form @submit.prevent="saveRole">
                    <v-card-text>
                        <v-card-title>
                            <span class="fw-bold text-dark">Add Role</span>
                        </v-card-title>

                        <v-card-text>
                            <v-row>
                                <v-col cols="4">
                                    <v-subheader class="fw-bold">Display Name</v-subheader>
                                </v-col>
                                <v-col cols="8">
                                    <v-text-field
                                    v-model= "role.name"
                                    label="Filled By Name"
                                    prepend-icon = "mdi-account"
                                    ></v-text-field>
                                </v-col>
                            </v-row>

                            <v-row>
                                <v-col cols="4">
                                    <v-subheader class="fw-bold">Description</v-subheader>
                                </v-col>
                                <v-col cols="8">
                                    <v-text-field
                                    v-model= "role.description"
                                    label="Filled By Description"
                                    prepend-icon = "mdi-account"
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                        </v-card-text>
                    </v-card-text>

                    <v-row no-gutters class="mb-5">
                        <v-col lg="8"></v-col>
                        <v-col lg="2">
                            <v-btn elevation="0"
                            v-on:click = "clearer">
                                Cancel
                            </v-btn>
                        </v-col>
                        <v-col lg="2">
                            <v-btn type="submit"
                            elevation="0"
                            color="primary">
                                <span class="fw-bold text-light">Save</span>
                            </v-btn>
                        </v-col>
                    </v-row>
                  </form>
                </v-card>
            </v-dialog>



            <v-dialog v-model="update_role"
            persistent
            transition="dialog-bottom-transition"
            max-width = "600px"
            >
                <v-card>
                    <v-card-text>
                        <v-card-title>
                            <span class="fw-bold text-dark">Update Role</span>
                        </v-card-title>

                        <v-card-text>
                            <v-row>
                                <v-col cols="4">
                                    <v-subheader class="fw-bold">Display Name</v-subheader>
                                </v-col>
                                <v-col cols="8">
                                    <v-text-field
                                    v-model = "display_name"
                                    label="Filled By Name"
                                    prepend-icon="mdi-account"
                                    ></v-text-field>
                                </v-col>
                            </v-row>

                            <v-row>
                                <v-col cols="4">
                                    <v-subheader class="fw-bold">Description</v-subheader>
                                </v-col>
                                <v-col cols="8">
                                    <v-text-field
                                    v-model = "display_description"
                                    label="Filled By Description"
                                    prepend-icon="mdi-account"
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                        </v-card-text>
                    </v-card-text>

                    <v-row no-gutters class="mb-3">
                        <v-col lg="2">
                            <v-btn elevation="0"
                            v-on:click = "dialog = true; act = 1">
                                Delete
                            </v-btn>
                        </v-col>
                        <v-col lg="6"></v-col>
                        <v-col lg="2">
                            <v-btn elevation="0"
                            v-on:click = "clearer">
                                Cancel
                            </v-btn>
                        </v-col>
                        <v-col lg="2">
                            <v-btn color="primary"
                            v-on:click = "dialog = true; act = 2"
                            elevation="0">
                                Update
                            </v-btn>
                        </v-col>
                    </v-row>
                </v-card>
            </v-dialog>



            <!--USER DIALOG-->

            <v-dialog v-model="dialog_user"
            persistent
            transition="dialog-bottom-transition"
            max-width = "600px"
            >
                <v-card>
                <form @submit.prevent="saveUsers">
                    <v-card-text>
                        <v-card-title>
                            <span class="fw-bold text-dark">Add User</span>
                        </v-card-title>

                        <v-card-text>
                            <v-row>
                                <v-col cols="4">
                                    <v-subheader class="fw-bold">Name</v-subheader>
                                </v-col>
                                <v-col cols="8">
                                    <v-text-field
                                    v-model= "user.name"
                                    label="Filled By Name"
                                    prepend-icon = "mdi-account"
                                    ></v-text-field>
                                </v-col>
                            </v-row>

                            <v-row>
                                <v-col cols="4">
                                    <v-subheader class="fw-bold">Email Address</v-subheader>
                                </v-col>
                                <v-col cols="8">
                                    <v-text-field
                                    v-model= "user.email"
                                    label="Filled By Email"
                                    prepend-icon = "mdi-account"
                                    ></v-text-field>
                                </v-col>
                            </v-row>

                            
                            <v-row>
                                <v-col cols="4">
                                    <v-subheader class="fw-bold">Role</v-subheader>
                                </v-col>
                                <v-col cols="8">
                                    <v-select
                                    v-if="roles.length"
                                    :items="roles"
                                    item-text="role_name"
                                    item-value="id"
                                    v-model="user.role"
                                    outlined
                                    dense
                                    placeholder="Select Role"
                                    ></v-select>
                                </v-col>
                            </v-row>
                        </v-card-text>
                    </v-card-text>
                    <v-row no-gutters class="mb-5">
                        <v-col lg="8"></v-col>
                        <v-col lg="2">
                            <v-btn elevation="0"
                            v-on:click = "clearer">
                                Cancel
                            </v-btn>
                        </v-col>
                        <v-col lg="2">
                            <v-btn type="submit"
                            elevation="0"
                            color="primary">
                                <span class="fw-bold text-light">Save</span>
                            </v-btn>    
                        </v-col>
                    </v-row>
                  </form>
                </v-card>
            </v-dialog>




            <v-dialog v-model="update_dialogUser"
            persistent
            transition="dialog-bottom-transition"
            max-width = "600px"
            >
                <v-card>
                <form @submit.prevent="saveUsers">
                    <v-card-text>
                        <v-card-title>
                            <span class="fw-bold text-dark">Update User</span>
                        </v-card-title>

                        <v-card-text>
                            <v-row>
                                <v-col cols="4">
                                    <v-subheader class="fw-bold">Name</v-subheader>
                                </v-col>
                                <v-col cols="8">
                                    <v-text-field
                                    v-model= "user_name"
                                    label="Filled By Name"
                                    prepend-icon = "mdi-account"
                                    ></v-text-field>
                                </v-col>
                            </v-row>

                            <v-row>
                                <v-col cols="4">
                                    <v-subheader class="fw-bold">Email Address</v-subheader>
                                </v-col>
                                <v-col cols="8">
                                    <v-text-field
                                    v-model= "user_email"
                                    label="Filled By Email"
                                    prepend-icon = "mdi-account"
                                    ></v-text-field>
                                </v-col>
                            </v-row>

                            
                            <v-row>
                                <v-col cols="4">
                                    <v-subheader class="fw-bold">Role</v-subheader>
                                </v-col>
                                <v-col cols="8">
                                    <v-select
                                    v-if="roles.length"
                                    :items="roles"
                                    item-text="role_name"
                                    item-value="id"
                                    v-model="user_role"
                                    outlined
                                    dense
                                    placeholder="Select Role"
                                    ></v-select>
                                </v-col>
                            </v-row>
                        </v-card-text>
                    </v-card-text>

                    <v-row no-gutters class="mb-3">
                        <v-col lg="2">
                            <v-btn elevation="0"
                            v-on:click = "dialog = true; act = 3">
                                Delete
                            </v-btn>
                        </v-col>
                        <v-col lg="6"></v-col>
                        <v-col lg="2">
                            <v-btn elevation="0"
                            v-on:click = "clearer">
                                Cancel
                            </v-btn>
                        </v-col>
                        <v-col lg="2">
                            <v-btn color="primary"
                            v-on:click = "dialog = true; act = 4"
                            elevation="0">
                                Update
                            </v-btn>
                        </v-col>
                    </v-row>
                  </form>
                </v-card>
            </v-dialog>



            <!--CATEGORY DIALOG-->


            <v-dialog v-model="dialog_category"
            persistent
            transition="dialog-bottom-transition"
            max-width = "600px"
            >
                <v-card>
                <form @submit.prevent="saveCategory">
                    <v-card-text>
                        <v-card-title>
                            <span class="fw-bold text-dark">Add Category</span>
                        </v-card-title>

                        <v-card-text>
                            <v-row>
                                <v-col cols="4">
                                    <v-subheader class="fw-bold">Display Name</v-subheader>
                                </v-col>
                                <v-col cols="8">
                                    <v-text-field
                                    v-model= "category.name"
                                    label="Filled By Name"
                                    ></v-text-field>
                                </v-col>
                            </v-row>

                            <v-row>
                                <v-col cols="4">
                                    <v-subheader class="fw-bold">Description</v-subheader>
                                </v-col>
                                <v-col cols="8">
                                    <v-text-field
                                    v-model= "category.description"
                                    label="Filled By Description"
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                        </v-card-text>
                    </v-card-text>
                    <v-row no-gutters class="mb-5">
                        <v-col lg="8"></v-col>
                        <v-col lg="2">
                            <v-btn elevation="0"
                            v-on:click = "clearer">
                                Cancel
                            </v-btn>
                        </v-col>
                        <v-col lg="2">
                            <v-btn type="submit"
                            elevation="0"
                            color="primary">
                                <span class="fw-bold text-light">Save</span>
                            </v-btn> 
                        </v-col>
                    </v-row>
                  </form>
                </v-card>
            </v-dialog>




            <!--UPDATE CATEGORY-->

            
            <v-dialog v-model="update_categ"
            persistent
            transition="dialog-bottom-transition"
            max-width = "600px"
            >
                <v-card>
                <form @submit.prevent="saveCategory">
                    <v-card-text>
                        <v-card-title>
                            <span class="fw-bold text-dark">Update Category</span>
                        </v-card-title>

                        <v-card-text>
                            <v-row>
                                <v-col cols="4">
                                    <v-subheader class="fw-bold">Display Name</v-subheader>
                                </v-col>
                                <v-col cols="8">
                                    <v-text-field
                                    v-model= "cat_name"
                                    label="Filled By Name"
                                    ></v-text-field>
                                </v-col>
                            </v-row>

                            <v-row>
                                <v-col cols="4">
                                    <v-subheader class="fw-bold">Description</v-subheader>
                                </v-col>
                                <v-col cols="8">
                                    <v-text-field
                                    v-model= "cat_desc"
                                    label="Filled By Description"
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                        </v-card-text>
                    </v-card-text>

                    <v-row no-gutters class="mb-3">
                        <v-col lg="2">
                            <v-btn elevation="0"
                            v-on:click = "dialog = true; act = 5">
                                Delete
                            </v-btn>
                        </v-col>
                        <v-col lg="6"></v-col>
                        <v-col lg="2">
                            <v-btn elevation="0"
                            v-on:click = "clearer">
                                Cancel
                            </v-btn>
                        </v-col>
                        <v-col lg="2">
                            <v-btn color="primary"
                            v-on:click = "dialog = true; act = 6"
                            elevation="0">
                                Update
                            </v-btn>
                        </v-col>
                    </v-row>
                  </form>
                </v-card>
            </v-dialog>


            <!--EXPENSES DIALOG-->


            <v-dialog v-model="expenses_dialog"
            persistent
            transition="dialog-bottom-transition"
            max-width = "600px"
            >
                <v-card>
                <form @submit.prevent="saveExpenses">
                    <v-card-text>
                        <v-card-title>
                            <span class="fw-bold text-dark">Add Expense</span>
                        </v-card-title>

                        <v-card-text>
                            <v-row>
                                <v-col cols="4">
                                    <v-subheader class="fw-bold">Expense Category</v-subheader>
                                </v-col>
                                <v-col cols="8">
                                    <v-select
                                        v-if="categories.length"
                                        :items="categories"
                                        item-text="category_name"
                                        item-value="id"
                                        outlined
                                        dense
                                        v-model="selected_cat"
                                        placeholder="Select Category"
                                    ></v-select>
                                </v-col>
                            </v-row>

                            <v-row>
                                <v-col cols="4">
                                    <v-subheader class="fw-bold">Amount</v-subheader>
                                </v-col>
                                <v-col cols="8">
                                    <v-text-field
                                    dense
                                    outlined
                                    :maxlength="max"
                                    @keypress="isNumber($event)"
                                    v-model= "amount"
                                    placeholder="Filled By Description"
                                    ></v-text-field>
                                </v-col>
                            </v-row>

                            <v-row>
                                <v-col cols="4">
                                    <v-subheader class="fw-bold">Entry Date</v-subheader>
                                </v-col>
                                <v-col cols="8">
                                <v-dialog
                                    ref="dialog"
                                    v-model="modal"
                                    :return-value.sync="date"
                                    persistent
                                    width="290px"
                                >
                                    <template v-slot:activator="{ on, attrs }">
                                    <v-text-field
                                        v-model="date"
                                        append-icon="mdi-calendar"
                                        readonly
                                        outlined
                                        dense
                                        v-bind="attrs"
                                        v-on="on"
                                    ></v-text-field>
                                    </template>
                                    <v-date-picker
                                    v-model="date"
                                    scrollable
                                    >
                                    <v-spacer></v-spacer>
                                    <v-btn
                                        text
                                        color="primary"
                                        @click="modal = false"
                                    >
                                        Cancel
                                    </v-btn>
                                    <v-btn
                                        text
                                        color="primary"
                                        @click="$refs.dialog.save(date)"
                                    >
                                        OK
                                    </v-btn>
                                    </v-date-picker>
                                </v-dialog>
                                </v-col>
                            </v-row>
                        </v-card-text>
                    </v-card-text>

                    <v-row no-gutters class="mb-5">
                        <v-col lg="8"></v-col>
                        <v-col lg="2">
                            <v-btn elevation="0"
                            v-on:click = "clearer">
                                Cancel
                            </v-btn>
                        </v-col>
                        <v-col lg="2">
                            <v-btn type="submit"
                            elevation="0"
                            color="primary">
                                <span class="fw-bold text-light">Save</span>
                            </v-btn> 
                        </v-col>
                    </v-row>
                  </form>
                </v-card>
            </v-dialog>


            <!--UPDATE EXPENSES -->

            
            <v-dialog v-model="up_expensedialog"
            persistent
            transition="dialog-bottom-transition"
            max-width = "600px"
            >
                <v-card>
                    <v-card-text>
                        <v-card-title>
                            <span class="fw-bold text-dark">Update Expense</span>
                        </v-card-title>

                        <v-card-text>
                            <v-row>
                                <v-col cols="4">
                                    <v-subheader class="fw-bold">Expense Category</v-subheader>
                                </v-col>
                                <v-col cols="8">
                                    <v-select
                                        v-if="categories.length"
                                        :items="categories"
                                        item-text="category_name"
                                        item-value="id"
                                        outlined
                                        dense
                                        v-model="selected_cat"
                                        placeholder="Select Category"
                                    ></v-select>
                                </v-col>
                            </v-row>

                            <v-row>
                                <v-col cols="4">
                                    <v-subheader class="fw-bold">Amount</v-subheader>
                                </v-col>
                                <v-col cols="8">
                                    <v-text-field
                                    dense
                                    outlined
                                    :maxlength="max"
                                    @keypress="isNumber($event)"
                                    v-model= "amount"
                                    placeholder="Filled By Description"
                                    ></v-text-field>
                                </v-col>
                            </v-row>

                            <v-row>
                                <v-col cols="4">
                                    <v-subheader class="fw-bold">Entry Date</v-subheader>
                                </v-col>
                                <v-col cols="8">
                                <v-dialog
                                    ref="dialog"
                                    v-model="modal"
                                    :return-value.sync="date"
                                    persistent
                                    width="290px"
                                >
                                    <template v-slot:activator="{ on, attrs }">
                                    <v-text-field
                                        v-model="date"
                                        append-icon="mdi-calendar"
                                        readonly
                                        outlined
                                        dense
                                        v-bind="attrs"
                                        v-on="on"
                                    ></v-text-field>
                                    </template>
                                    <v-date-picker
                                    v-model="date"
                                    scrollable
                                    >
                                    <v-spacer></v-spacer>
                                    <v-btn
                                        text
                                        color="primary"
                                        @click="modal = false"
                                    >
                                        Cancel
                                    </v-btn>
                                    <v-btn
                                        text
                                        color="primary"
                                        @click="$refs.dialog.save(date)"
                                    >
                                        OK
                                    </v-btn>
                                    </v-date-picker>
                                </v-dialog>
                                </v-col>
                            </v-row>
                        </v-card-text>
                    </v-card-text>

                    <v-row no-gutters class="mb-3">
                        <v-col lg="2">
                            <v-btn elevation="0"
                            v-on:click = "dialog = true; act = 7">
                                Delete
                            </v-btn>
                        </v-col>
                        <v-col lg="6"></v-col>
                        <v-col lg="2">
                            <v-btn elevation="0"
                            v-on:click = "clearer">
                                Cancel
                            </v-btn>
                        </v-col>
                        <v-col lg="2">
                            <v-btn color="primary"
                            v-on:click = "dialog = true; act = 8"
                            elevation="0">
                                Update
                            </v-btn>
                        </v-col>
                    </v-row>
                </v-card>
            </v-dialog>



            <v-snackbar
                v-model="snackbar"
                >
                Actions Done!
                <template v-slot:action="{ attrs }">
                    <v-btn
                    color="blue"
                    text
                    v-bind="attrs"
                    @click="snackbar = false"
                    >
                    Close
                    </v-btn>
                </template>
            </v-snackbar>

            
            <v-snackbar
                v-model="snacInvalid"
                >
                Password do not match
                <template v-slot:action="{ attrs }">
                    <v-btn
                    color="blue"
                    text
                    v-bind="attrs"
                    @click="snacInvalid = false"
                    >
                    Close
                    </v-btn>
                </template>
            </v-snackbar>

            <v-snackbar
                v-model="snackError"
                >
                Admin cannot be updated
                <template v-slot:action="{ attrs }">
                    <v-btn
                    color="blue"
                    text
                    v-bind="attrs"
                    @click="snackError = false"
                    >
                    Close
                    </v-btn>
                </template>
            </v-snackbar>



            <v-dialog
            v-model="dialog"
            persistent
            max-width="290"
            >
            <v-card>
                <v-card-title class="headline">
                  Procced to action?
                </v-card-title>
                <v-card-actions>
                <v-spacer></v-spacer>
                    <v-btn
                        color="green darken-1"
                        text
                        @click="dialog = false"
                    >
                        Cancel
                    </v-btn>
                    <v-btn
                        color="green darken-1"
                        text
                        @click="actions"
                    >
                        Proceed
                    </v-btn>
                </v-card-actions>
            </v-card>
            </v-dialog>


            <v-dialog v-model="pass_dialog"
            persistent
            max-width="400">
                    <v-card 
                    class="rounded-lg"
                    width = "500px"
                    elevation ="1">
                        <v-card-title>Change Password</v-card-title>

                        <v-card-text>  
                            <v-text-field
                                dense
                                outlined
                                :maxlength = "max"
                                type="password"
                                v-model = "new_pass"
                                placeholder="New Password"
                            ></v-text-field>
                            <v-text-field
                                dense
                                outlined
                                :maxlength = "max"
                                v-model = "conf_pass"
                                type="password"
                                placeholder="Confirm Password"
                            ></v-text-field>
                            <v-btn block color="primary"
                            v-on:click = "dialog = true; act = 9">
                                 Save
                            </v-btn>
                            <v-btn block color="danger"
                            v-on:click = "pass_dialog = false">
                                 Close
                            </v-btn>
                        </v-card-text>
                    </v-card>
            </v-dialog>
        </v-app>
    </body>
    
    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
</html>
