/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css'
import 'bootstrap';
import Vue from 'vue';
import VueApexCharts from 'vue-apexcharts'

window.axios= require('axios');
window.$ = require('jquery');
window.Vue = require('vue').default;

Vue.use(Vuetify);
Vue.use(VueApexCharts)

Vue.component('apexchart', VueApexCharts)
Vue.component('list-categories', require('./components/Graph.vue').default);
Vue.component('role-table', require('./components/RoleTable.vue').default);
Vue.component('user-table', require('./components/UserTable.vue').default);
Vue.component('category-table', require('./components/CategoryTable.vue').default);
Vue.component('expenses-table', require('./components/ExpensesTable.vue').default);

new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    data: () => ({
        series: [],
        labels:[],
        chartOptions: {
          chart: {
            width: 380,
            type: 'pie',
          },
          legend: {
            show: false
          },
          dataLabels: {
            enabled: false
          },
          responsive: [{
            breakpoint: 480,
            options: {
              chart: {
                width: 200
              },
              legend: {
                position: 'bottom',
                show: false,
              }
            }
          }]
        },
        new_pass: '',
        old_pass: '',
        conf_pass: '',
        pass_dialog: false,
        dialog_role: false,
        update_role: false,
        role_name: '',
        role_description: '',
        cat: 0,
        role: {}, 
        rolesData: [],
        snackbar: false,
        display_description: '',
        display_name: '',
        dialog: false,
        role_id: '',
        act: 0 ,
        users:[],
        dialog_user: false,
        roles: [],
        user: {}, 
        user_id: '',
        user_email: '',
        user_role: {},
        user_name: '',
        update_dialogUser: false,
        categories:[],
        dialog_category: false,
        category: {},
        update_categ: false,
        cat_id: '',
        cat_desc: '',
        cat_name: '',
        expenses: [],
        expenses_dialog: false,
        date: new Date().toISOString().substr(0, 10),
        modal: false,
        selected_cat: '',
        amount: 0,
        max: 15,
        up_expensedialog: false,
        exp_id: '',
        csrf_token: '',
        auth_user: '',
        auth_password: '',
        snacInvalid: false,
        snackValidator: '',
        snackError: false
    }),
    methods:{
        update_pass(){
            if(this.new_pass != this.conf_pass){
                this.snacInvalid = true
                this.dialog = false
            }else{
                axios
                .post('/updatePassword', {
                    new_pass: this.new_pass,
                })
                .then(response => (
                   console(JSON.stringify(response.data))
                ))
                .catch(err => console.log(err))
                this.new_pass = ''
                this.conf_pass = ''
                this.pass_dialog = false
                this.dialog = false
                this.snackbar = true
            }
        },
        login(){
            if(this.$refs.form.validate()){
                axios
                .post('/login', {
                    email: this.auth_user,
                    password: this.auth_password,
                })
                .then(response => (
                   alert(JSON.stringify(response.data))
                ))
                .catch(err => console.log(err))
            }       
        },
        actions(){
            switch (this.act) {
                case 1:
                    this.deleteRole()
                break;

                case 2:
                    this.updateRole()
                break;

                case 3: 
                   this.deleteUser()
                break;
                
                case 4:
                    this.updateUser()
                break;

                
                case 5: 
                   this.deleteCategory()
                break;
                
                case 6:
                    this.updateCategory()
                break;

                case 7:
                    this.deleteExpenses()
                break;
                case 8:
                    this.updateExpenses()
                break;

                case 9: 
                    this.update_pass()
                break;
            
                default:
                break;
            }
        },
        openDialogCategory(){
            this.dialog_category = true
        },
        openDialogRole(){
            this.dialog_role = true
        },
        updateDialogRole(name,desc,id){
            this.role_id = id
            this.display_description = desc
            this.display_name = name
            this.update_role = true
        },
        deleteRole(){
            axios
            .post('/delete', {
                id: this.role_id,
            })
            .then(response => (
                response.data == 0 ? 
                this.fetchData(): 
                false
            ))
            .catch(err => console.log(err))
            this.clearer()
            this.snackbar = true
        },
        clearer(){
            this.role_name = ''
            this.role_description = ''
            this.dialog_role = false
            this.update_role = false
            this.role_id = ''
            this.display_description = ''
            this.display_name = ''
            this.dialog = false
            this.user = {}
            this.dialog_user = false
            this.update_dialogUser = false
            this.user_email = ''
            this.user_id = ''
            this.user_role = ''
            this.user_name = ''
            this.dialog_category = false
            this.category = {}
            this.update_categ = false
            this.expenses_dialog = false 
            this.amount = 0
            this.selected_cat = ''
            this.date = new Date().toISOString().substr(0, 10)
            this.up_expensedialog = false
        },

        updateRole(){
            axios
            .post('/edit', {
                id: this.role_id,
                name: this.display_name,
                description: this.display_description
            })
            .then(response => (
                response.data == 0 ? 
                this.fetchData(): 
                false
            ))
            .catch(err => console.log(err))
            this.clearer()
            this.snackbar = true
        },
        saveRole(){
            axios
            .post('/index', this.role)
            .then(response => (
                response.data == 0 ? 
                this.fetchData(): 
                false
            ))
            .catch(err => console.log(err))
            this.clearer()
            this.fetchRoles()
            this.snackbar = true
        },


        saveUsers(){
            axios
            .post('/saveUser', this.user)
            .then(response => (
                response.data == 0 ? 
                this.fetchUsers(): 
                false
            ))
            .catch(err => console.log(err))
            this.clearer()
            this.snackbar = true
        },

        openDialogUser(){
            this.dialog_user = true
        },

        openDialogExpenses(){
            this.expenses_dialog = true
        },
        updateDialogExpenses(category,amount, entry_date , id){
            this.selected_cat = category
            this.amount = amount 
            this.date = entry_date
            this.exp_id = id
            this.up_expensedialog = true
        },
        updateDialogUser(id,name,email,role){
            if(role != 1){
                this.user_id = id
                this.user_name = name
                this.user_email = email
                this.user_role = role
                this.update_dialogUser = true
            }else{
                this.snackError = true
            }
        },


        updateExpenses(){
            axios
            .post('/editExpenses', {
                id: this.exp_id,
                category: this.selected_cat,
                amount: this.amount,
                date: this.date
            })
            .then(response => (
                response.data == 0 ? 
                this.fetchExpenses(): 
                false
            ))
            .catch(err => console.log(err))
            this.clearer()
            this.snackbar = true
        },

        deleteExpenses(){
            axios
            .post('/deleteExpenses', {
                id: this.exp_id,
            })
            .then(response => (
                response.data == 0 ? 
                this.fetchExpenses(): 
                false
            ))
            .catch(err => console.log(err))
            this.clearer()
            this.snackbar = true
        },




        deleteUser(){
            axios
            .post('/deleteUser', {
                id: this.user_id,
            })
            .then(response => (
                response.data == 0 ? 
                this.fetchUsers(): 
                false
            ))
            .catch(err => console.log(err))
            this.clearer()
            this.snackbar = true
        },

        updateUser(){
            axios
            .post('/editUser', {
                id: this.user_id,
                name: this.user_name,
                email: this.user_email,
                role: this.user_role
            })
            .then(response => (
                response.data == 0 ? 
                this.fetchUsers(): 
                false
            ))
            .catch(err => console.log(err))
            this.clearer()
            this.snackbar = true
        },


        deleteCategory(){
            axios
            .post('/deleteCategory', {
                id: this.cat_id,
            })
            .then(response => (
                response.data == 0 ? 
                this.fetchCategory(): 
                false
            ))
            .catch(err => console.log(err))
            this.clearer()
            this.snackbar = true
        },
        updateCategory(){
            axios
            .post('/editCategory', {
                id: this.cat_id,
                name: this.cat_name,
                desc: this.cat_desc,
            })
            .then(response => (
                response.data == 0 ? 
                this.fetchCategory(): 
                false
            ))
            .catch(err => console.log(err))
            this.clearer()
            this.snackbar = true
        },

        updateDialogCategory(name,desc,id){
            this.cat_id = id
            this.cat_desc = desc
            this.cat_name = name
            this.update_categ = true
        },

        
        saveCategory(){
            axios
            .post('/saveCategory', this.category)
            .then(response => (
                response.data == 0 ? 
                this.fetchCategory(): 
                false
            ))
            .catch(err => console.log(err))
            this.clearer()
            this.snackbar = true
        },


        
        saveExpenses(){
            axios
            .post('/saveExpenses', {
                date: this.date, 
                amount: this.amount,
                category: this.selected_cat
            })
            .then(response => (
                response.data == 0 ? 
                this.fetchExpenses(): 
                false
            ))
            .catch(err => console.log(err))
            this.clearer()
            this.snackbar = true
            this.fetchGraph()
        },

        async fetchExpenses(){
            try {
                const response = await axios.get('/expenses');
                this.expenses = response.data
            }catch(err) {
                return false
            }
        },
        async fetchRoles(){
            try {
                const response = await axios.get('/roles');
                this.roles = response.data
            }catch(err) {
                return false
            }
        },

        async fetchUsers(){
            try {
                const response = await axios.get('/showUsers');
                this.users = response.data
            }catch(err) {
                return false
            }
        },
        async fetchData(){
            try {
                const response = await axios.get('/show');
                this.rolesData = response.data
            }catch(err) {
                return false
            }
        },

        async fetchCategory(){
            try {
                const response = await axios.get('/showCategory');
                this.categories = response.data
            }catch(err) {
                return false
            }
        },

        async fetchGraph(){
            try {
                this.series = []
                this.labels = []
                const response = await axios.get('/dashboard');
                for (let x = 0; x < response.data.length; x++) {
                    this.series.push(response.data[x].amount)
                    this.labels.push(response.data[x].category_name)
                }
            }catch(err) {
                return false
            }
        },

        isNumber: function(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
              evt.preventDefault();;
            } else {
              return true;
            }
        }
    },
    created(){
        this.csrf_token = document.querySelector('meta[name="csrf-token"]').content;
        this.fetchExpenses()
        this.fetchRoles()
        this.fetchUsers()
        this.fetchGraph()
        this.fetchCategory()
        this.fetchData()
    }
});
