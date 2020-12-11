<template>
    <div class='container py-4'>
        <div class='row justify-content-center'>
            <div class='col-md-6'>
                <div class='card'>
                    <div class='card-header'>Edit Customer</div>
                    <div class='card-body'>
                        <div class="alert alert-danger" role="alert" v-if="empty">
                              Data not Found
                            </div>
                        <div class="alert alert-danger" v-if="errors.length">
                            <b>Terdapat kesalahan dalam input data:</b>
                            <ul>
                                <li v-for="error in errors" :key="error">{{ error }}</li>
                            </ul>
                        </div>

                        <form @submit.prevent="updateCustomer">
                            <div class="form-group">
                                <label htmlFor="name">Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    v-model="customer.name"
                                />
                            </div>
                            <div class="form-group">
                                <label htmlFor="name">Email</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="email"
                                    v-model="customer.email"
                                />
                            </div>
                            <div class="form-group">
                                <label htmlFor="name">Password</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    v-model="customer.password"
                                />
                            </div>
                            <div class="form-group">
                                <label htmlFor="name">Gender</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender-man" value="1" v-model="customer.gender">
                                    <label class="form-check-label" for="gender-man">
                                        Man
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gende-woman" value="2" v-model="customer.gender">
                                    <label class="form-check-label" for="gender-woman">
                                        Woman
                                    </label>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label htmlFor="name">Married</label>
                                <select type="text"
                                    class="form-control"
                                    id="married"
                                    v-model="customer.married" >
                                    <option>Yes</option>
                                    <option>No</option>
                                    </select>
                                
                            </div>
                            <div class="form-group">
                                <label htmlFor="content">Addres</label>
                                <textarea
                                    type="text"
                                    class="form-control"
                                    id="address"
                                    v-model="customer.address"
                                    rows="5"
                                ></textarea>
                            </div>
                            <div class='form-group'>
                                <router-link :to="{ name: 'home' }" class="btn btn-secondary">Back</router-link>
                                &nbsp;
                                &nbsp;
                                <button class='btn btn-primary' v-if="!empty">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
        return {
            customer: {},
            errors: [],
            name: null,
            email: null,
            password: null,
            gender: null,
            married: null,
            address: null,
            empty: false
        }
    },
    created() {
        let uri = `/api/customer/edit/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
            let statusCode = response.data.status.code

                if(statusCode === 200){
                    this.customer = response.data.result;
                }else{
                    this.empty = true;
                }
        });
    },
    methods: {
        updateCustomer(e){
            
            if (
                this.$data.customer.name != null &&
                this.$data.customer.email != null &&
                this.$data.customer.password != null &&
                this.$data.customer.gender != null &&
                this.$data.customer.married != null &&
                this.$data.customer.address != null 
            ) {
                let uri = `/api/customer/update/${this.$route.params.id}`;
                this.axios.put(uri, this.customer).then((response) => {
                    this.$router.push({name: 'home'});
                });
                return true;
            }


            this.errors = [];

            if (!this.name) {
                this.errors.push("Nama wajib diisi !");
            }
            if (!this.email) {
                this.errors.push("Email wajib diisi !");
            }
            if (!this.password) {
                this.errors.push("Password wajib diisi !");
            }
            if (!this.gender) {
                this.errors.push("Gender wajib diisi !");
            }
            if (!this.married) {
                this.errors.push("Married wajib diisi !");
            }
            if (!this.address) {
                this.errors.push("Address wajib diisi !");
            }

            e.preventDefault();
        }
    }
  }
</script>