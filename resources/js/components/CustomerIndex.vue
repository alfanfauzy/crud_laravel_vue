<template>
    <div class='container py-4'>
        <div class='row justify-content-center'>
            <div class='col-md-8'>
            <div class='card'>
                <div class='card-header'>All Customers</div>
                <div class='card-body'>
                    <router-link :to="{ name: 'create' }" class="btn btn-primary">Add new customer</router-link>
                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="50" class="text-center">No</th>
                                    <th>Nama</th>
                                    <th width="200" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="empty">
                                    <td colspan="3">
                                        <div class="alert alert-danger" role="alert" >
                                            Empty Data
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(customer, index) in customers" :key="customer.id">
                                    <td width="50" class="text-center">{{ index + 1 }}</td>
                                    <td>{{ customer.name }}</td>
                                    <td width="200" class="text-center">
                                        <div class="btn-group">
                                            <router-link :to="{name: 'show', params: { id: customer.id }}" class="btn btn-primary">Detail</router-link>
                                            <router-link :to="{name: 'edit', params: { id: customer.id }}" class="btn btn-success">Edit</router-link>
                                            <button class="btn btn-danger" @click = "deletePost(customer.id)">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
</template>

<script>
export default {
    data() {
        return {
          customers: {},
          empty: false
        }
    },
    created() {
            this.getResults();
    },
    methods: {
        getResults(){

            let uri = 'api/customer';
            this.axios.get(uri).then(response => {
                let statusCode = response.data.status.code

                if(statusCode === 200){
                    console.log(response.data.result)
                    this.customers = response.data.result;
                }else{
                    this.empty = true;
                }
            });
        },
        deletePost(id)
        {
            
            this.$swal.fire({
                title: 'Are you sure?',
                text: "Data will delete permanently.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel'
                }).then((result) => {
                if (result.value) {
                    this.$swal.fire({
                        title: 'Success!',
                        text: 'Customer deleted successfully',
                        icon: 'success',
                        timer: 1000
                    });
                    let uri = `api/customer/delete/${id}`;
                    this.axios.delete(uri).then(response => {
                        this.customers.splice(this.customers.indexOf(id), 1);
                    });
                    console.log(`Deleted customer with id ... ${id}`);
                }
            })
        }
    }
  }
</script>