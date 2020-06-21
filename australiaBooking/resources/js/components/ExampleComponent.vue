<template>
    <div class="">
        <div class="container">
            <div class="row">
                <h1>Test task</h1>
            </div>
            <div class="row">
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="name" type="text" class="validate" v-model="name">
                            <label for="name">Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="priceStart" type="number" class="validate" v-model="priceStart">
                            <label for="priceStart">price start</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="priceFinish" type="number" class="validate" v-model="priceFinish">
                            <label for="priceFinish">price finish</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="bedrooms" type="number" class="validate" v-model="bedrooms">
                            <label for="bedrooms">bedrooms</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="bathrooms" type="number" class="validate" v-model="bathrooms">
                            <label for="bathrooms">bathrooms</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="storeys" type="number" class="validate" v-model="storeys">
                            <label for="storeys">storeys</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="garages" type="number" class="validate" v-model="garages">
                            <label for="garages">garages</label>
                        </div>
                    </div>
                    <div class="row">
                        <a id="submit-button" class="waves-effect waves-light btn-small"
                           @click="submitForm">Button</a>
                    </div>
                </form>
            </div>
        </div>

        <div class="container">
            <div v-if="errored" class="red lighten-1 center">
                <div class="card red lighten-1 center">
                    <div class="card-content white-text">
                        <span class="card-title">Loading error!</span>
                    </div>
                </div>
            </div>
            <div v-if="loading" class="">
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
            </div>
            <div v-else class="">
                <table class="highlight">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>price</th>
                        <th>bedrooms</th>
                        <th>bathrooms</th>
                        <th>storeys</th>
                        <th>garages</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr v-for="house in houses">
                        <td>{{ house.name }}</td>
                        <td>{{ house.price }}</td>
                        <td>{{ house.bedrooms }}</td>
                        <td>{{ house.bathrooms }}</td>
                        <td>{{ house.storeys }}</td>
                        <td>{{ house.garages }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                houses: [],
                loading: false,
                errored: false,
                name: '',
                priceStart: '',
                priceFinish: '',
                bedrooms: '',
                bathrooms: '',
                storeys: '',
                garages: '',
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        created() {
        },
        computed: {},
        methods: {
            submitForm: function (event) {
                this.loading = true;
                event.preventDefault();
                let currentObj = this;

                const params = new URLSearchParams();
                params.append('name', this.name);
                params.append('priceStart', this.priceStart);
                params.append('priceFinish', this.priceFinish);
                params.append('bedrooms', this.bedrooms);
                params.append('bathrooms', this.bathrooms);
                params.append('storeys', this.storeys);
                params.append('garages', this.garages);


                axios.get('http://127.0.0.1:8000/api/houses', {
                    params: params,
                })
                    .then((response) => {
                        this.houses = response.data;
                        this.loading = false;
                    })
                    .catch(function (error) {
                        this.errored = true;
                        console.log('error:');
                        console.log(error);
                    });
            }
        }
    }
</script>
