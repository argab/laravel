<template>
    <div class="search">
        <div class="search-wr">
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
                    <date-picker v-model="search.flight_date" :config="pickerOptions" @dp-change="fetch" placeholder="Дата вылета"></date-picker>
                </div>

                <div class="search-block-input col-md-3 col-sm-6 col-xs-12">
                    <select v-model="search.flight_class" @change="fetch" class="w-100 select">
                        <option value="">Класс перелета</option>
                        <option v-for="(option, key) in flight_class_options" :value="key" v-model="search.flight_class">
                            {{ option }}
                        </option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import axios from 'axios';

    import moment from 'moment';

    import DatePicker from 'vue-bootstrap-datetimepicker';

    import 'pc-bootstrap4-datetimepicker/build/css/bootstrap-datetimepicker.css';

    export default {
        components: {
            DatePicker
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
            datePicker(){
                this.search.flight_date = moment(this.search.flight_date).format('Y-MM-DD');
            },
            getOptions() {
                axios.get('/api/search-options')
                    .then(response => {
                        this.flight_from_options = response.data.flight.from;
                        this.flight_to_options = response.data.flight.to;
                        this.flight_class_options = response.data.flight_class;
                    });
            },
            fetch () {

                let params = {};

                $.each(this.search, function (i, val)
                {
                    if (val !== '') params[i] = val;
                });

                if (Object.keys(params).length < Object.keys(this.search).length)

                    return false;

                axios.post('/api/search', params)
                    .then(response => {



                    })
                    .catch(error => alert('Ошибка при выполнении.'));
            }
        },

        created() {

            moment.locale('ru');

            this.getOptions()

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

</style>
