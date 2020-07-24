<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-block">
                    <h3>Orders</h3>
                </div>
                <div class="card-body p-0 table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Subtotal</th>
                                    <th>Tax</th>
                                    <th>Total</th>
                                    <th>Shipped</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="order in orders" :key="order.id">
                                    <th scope="row">
                                        {{ order.id }}
                                    </th>
                                    <th>
                                        {{ order.billing_name }}
                                    </th>
                                    <td>{{ order.billing_address }}</td>
                                    <td>
                                        {{ order.billing_phone }}
                                    </td>
                                    <td>${{ order.billing_subtotal }}</td>
                                    <td>{{ order.billing_tax }}</td>
                                    <td>${{ order.billing_total }}</td>
                                    <td v-show="!order.shipped">
                                        <span class="alert alert-danger">
                                            No</span
                                        >
                                    </td>
                                    <td v-show="order.shipped">
                                        <span class="alert alert-success">
                                            Yes</span
                                        >
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
            orders: []
        };
    },
    methods: {
        getOrders() {
            axios
                .get("/api/orders")
                .then(res => {
                    this.orders = res.data;
                })
                .catch(err => {
                    console.log(err);
                });
        }
    },
    mounted() {
        this.getOrders();
    }
};
</script>
