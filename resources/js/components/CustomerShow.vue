<template>
    <div class='container py-4'>
        <div class='row justify-content-center'>
            <div class='col-md-6'>
                <div class='card'>
                    <div class='card-header'>Detail Customer</div>
                    <div class='card-body'>
                            <div class="alert alert-danger" role="alert" v-if="empty">
                              Data not Found
                            </div>
                            <div class="form-group">
                                <label htmlFor="name">Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    v-model="customer.name"
                                    disabled
                                />
                            </div>
                            <div class="form-group">
                                <label htmlFor="email">Email</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="email"
                                    v-model="customer.email"
                                    disabled
                                />
                            </div>
                            <div class="form-group">
                                <label htmlFor="password">Password</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    v-model="customer.password"
                                    disabled
                                />
                            </div>
                            <div class="form-group">
                                <label htmlFor="gender">Gender</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender-man" value="1" v-model="customer.gender" disabled>
                                    <label class="form-check-label" for="gender-man">
                                        Man
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gende-woman" value="2" v-model="customer.gender" disabled>
                                    <label class="form-check-label" for="gender-woman">
                                        Woman
                                    </label>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label htmlFor="married">Married</label>
                                <select type="text"
                                    class="form-control"
                                    id="married"
                                    v-model="customer.married" 
                                    disabled>
                                    <option>Yes</option>
                                    <option>No</option>
                                </select>
                                
                            </div>
                            <div class="form-group">
                                <label htmlFor="address">Addres</label>
                                <textarea
                                    type="text"
                                    class="form-control"
                                    id="address"
                                    v-model="customer.address"
                                    rows="5"
                                    disabled
                                ></textarea>
                            </div>
                        <div class='form-group'>
                            <router-link :to="{ name: 'home' }" class="btn btn-secondary">Back</router-link>
                        </div>
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
            customer:{},
            empty: false
        }
    },
    created() {
        let uri = `/api/customer/show/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
            let statusCode = response.data.status.code

                if(statusCode === 200){
                    console.log(response.data.result)
                    this.customer = response.data.result;
                }else{
                    this.empty = true;
                }
        });
    },
    method: {

    }
  }
</script>