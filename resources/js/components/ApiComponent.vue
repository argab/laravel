<template>
    <div class="search">
        <div class="search-block-wr">
            <div class="search-block row">
                <div class="w-100">
                    <h1>Поиск авиарейсов</h1>
                </div>
                <div class="search-block-input col-md-3 col-sm-6 col-xs-12">
                    <select v-model="search.flight_from" @change="fetch" class="w-100 select">
                        <option value="">Код аэропорта вылета</option>
                        <option v-for="(option, key) in flight_from_options" :value="key" v-model="search.flight_from">
                            {{ option }}

                        </option>
                    </select>
                </div>

                <div class="search-block-input col-md-3 col-sm-6 col-xs-12">
                    <select v-model="search.flight_to" @change="fetch" class="w-100 select">
                        <option value="">Код аэропорта прилета</option>
                        <option v-for="(option, key) in flight_to_options" :value="key" v-model="search.flight_to">
                            {{ option }}


                        </option>
                    </select>
                </div>

                <div class="search-block-input col-md-3 col-sm-6 col-xs-12">
                    <date-picker v-model="search.flight_date" :config="pickerOptions" @dp-change="fetch"
                                 placeholder="Дата вылета"></date-picker>
                </div>

                <div class="search-block-input col-md-3 col-sm-6 col-xs-12">
                    <select v-model="search.flight_class" @change="fetch" class="w-100 select">
                        <option value="">Класс перелета</option>
                        <option v-for="(option, key) in flight_class_options" :value="key"
                                v-model="search.flight_class">
                            {{ option }}


                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="search-results-wr">
            <div v-if="dataFetched" class="search-results row">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Логотип авиакомпании</th>
                        <th>Название</th>
                    </tr>
                    </thead>
                    <tbody v-for="data in flightData">
                    <tr class="search-results-item-data">
                        <td><img :src="data.carrier_logo" alt=""></td>
                        <td>({{ data.carrier_code }}) {{ data.carrier_name }}</td>
                    </tr>
                    <tr class="search-results-item-offers">
                        <td colspan="2">
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>аэропорт прилета</th>
                                    <th>аэропорт вылета</th>
                                    <th>дата прилета</th>
                                    <th>дата вылета</th>
                                    <th>время в пути</th>
                                    <th>цена билета</th>
                                </tr>
                                </thead>
                                <tbody v-for="(offer, key) in data.offers">
                                <tr v-for="item in offer.segments">
                                    <td>{{item.arrival_airport}}</td>
                                    <td>{{item.departure_airport}}</td>
                                    <td>{{item.arrival_date}} {{item.arrival_time}}</td>
                                    <td>{{item.departure_date}} {{item.departure_time}}</td>
                                    <td>{{item.duration_formated}}</td>
                                    <td>{{item.price_details[0].total}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</template>

<script>

    import axios from 'axios';

    import axiosRetry from 'axios-retry';

    import moment from 'moment';

    import DatePicker from 'vue-bootstrap-datetimepicker';

    import 'pc-bootstrap4-datetimepicker/build/css/bootstrap-datetimepicker.css';

    export default {
        components: {
            DatePicker,
            axiosRetry
        },

        props: {},

        computed: {},

        data () {
            return {
                search: {
                    flight_from: '',
                    flight_to: '',
                    flight_date: '',
                    flight_class: ''
                },
                flight_from_options: [],
                flight_to_options: [],
                flight_class_options: [],
                pickerOptions: {
                    format: 'DD/MM/YYYY',
                    useCurrent: true,
                    locale: 'ru'
                },
                dataFetched: false,
                flightData: {}
            };
        },

        watch: {
            search: {
                handler () {
                    this.fetch();
                }
            }
        },

        methods: {

            getOptions() {
                axios.get('/api/search-options').then(response => {
                    this.flight_from_options = response.data.flight.from;
                    this.flight_to_options = response.data.flight.to;
                    this.flight_class_options = response.data.flight_class;
                });
            },

            fetch () {

                let params = {};

                $.each(this.search, function (i, val) {
                    if (val !== '') params[i] = val;
                });

                if (Object.keys(params).length < Object.keys(this.search).length)

                    return false;

                axios.post('/api/search', params)

                    .then(response => {
                        let data = response.data;

                        if (data.status === "ok") {
                            const retryGetOffers = axios.create();

                            axiosRetry(retryGetOffers, {
                                retries: 3,
                                retryDelay: (retryCount) => {
                                    return retryCount * 1000;
                                }
                            });

                            retryGetOffers
                                .get('/api/get-offers?request_id=' + data.request_id)
                                .then(response => {
                                    let status = response.data.status;

                                    if (status === "Ready") {
                                        this.dataFetched = true;

                                        this.flightData = response.data.offers;
                                    }
                                    else {
                                        alert('Ничего не найдено');

                                        return false;
                                    }
                                });
                        }
                        else if (data.status === "error") {
                            let arr = $.map(typeof(response.data.message) === 'string'
                                ? [response.data.message]
                                : response.data.message, function (a) {
                                return a;
                            });

                            alert(arr.join(";\n"))
                        }

                    })
                    .catch(error => alert('Ошибка при выполнении.'));
            },
        },

        created() {

            moment.locale('ru');

            this.getOptions();

            $(document).on('click', '.search-results-item-data', function () {
                $(this).next('.search-results-item-offers').toggle()
            })

        }
    }

</script>

<style>
    .container {
        padding-top: 50px;
    }

    .w-100 {
        width: 100%;
    }

    .search-block > div > h1 {
        padding: 0 0 20px 15px;
    }

    .search-block-input {
        padding-bottom: 15px;
    }

    .search-block-input .select {
        padding: 0.72rem !important;
    }

    .search-block-input .form-control {
        padding: 0.55rem !important;
        width: 100%;
        height: auto;
        border: #aaa 1px solid;
        border-radius: 0;
    }

    .search-results-item-data {
        cursor: pointer;
    }

    .search-results-item-offers {
        display: none;
    }
</style>
