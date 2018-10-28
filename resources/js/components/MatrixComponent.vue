<template>

    <div class="matrix">
        <div class="matrix-block-wr">
            <div class="matrix-block row">
                <div class="w-100">
                    <h1 class="text-center">Острова</h1>
                </div>
                <div class="w-100 matrix-rows">
                    <div v-for="(item, x) in matrix.matrix" class="matrix-row">
                        <div :id="x+'-'+y" v-for="(row, y) in item" class="matrix-col" @click="countItems(x, y)">
                            {{ row }}
                        </div>
                    </div>
                </div>
                <div v-if="count" class="w-100 matrix-count text-center">Найдено островов: <span class="count">{{count}}</span></div>
                <div class="matrix-params w-100 text-center">
                    Ширина матрицы: <input id="matrix-width" type="text" v-model="params.width" v-on:keyup.enter="resetMatrix()">
                    Высота матрицы: <input id="matrix-height" type="text" v-model="params.height" v-on:keyup.enter="resetMatrix()">
                </div>
            </div>
        </div>
    </div>

</template>

<script>

    import { Matrix } from '../classes/Matrix';

    export default {

        components: {
        },

        props: {},

        computed: {},

        data () {
            return {
                matrix: {},
                count: 0,
                count_items: {},
                params: {
                    width: 0,
                    height: 0,
                }
            };
        },

        methods: {

            fetchMatrix(width, height)
            {
                this.matrix = new Matrix({
                    matrix_width: width ? width : 10,
                    matrix_height: height ? height : 10,
                });

                this.params.width = this.matrix.param.matrix_width;
                this.params.height = this.matrix.param.matrix_height;

                this.count = 0;
                this.count_items = {};

                $('.matrix-rows>.matrix-row>div').removeClass('counted');

                this.matrix.setMatrix();
            },

            resetMatrix()
            {
                let width = $('#matrix-width').val();
                let height = $('#matrix-height').val();

                this.fetchMatrix(width, height);
            },

            countItems(x, y)
            {
                if (this.matrix.matrix[x][y] === 0)

                    return false;

                this.matrix.countItems(x, y);

                this.matrix.fetchStack();

                this.count = 0;

                let items = {};

                for(let key in this.matrix.count)
                {
                    if ( ! (key in this.count_items))
                    {
                        this.count += 1;

                        this.count_items[key] = 1;

                        items[key] = 1;
                    }
                }

                if (Object.keys(items).length)
                {
                    let matrix = $('.matrix-rows');

                    $.each(items, (i, val) =>
                    {
                        $('.matrix-rows').find('#' + i).addClass('counted')
                    })
                }
            }

        },

        created() {

            this.fetchMatrix();
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

    .matrix-block > div > h1 {
        padding: 0 0 20px;
    }

    .matrix-rows {
        display: inline-block;
        margin: 0 auto;
        width: auto !important;
        border-top: #dadada 1px solid;
        border-left: #dadada 1px solid;
    }

    .matrix-col {
        display: inline-block;
        padding: 13px 20px;
        border-right: #dadada 1px solid;
        border-bottom: #dadada 1px solid;
        cursor: pointer;
    }

    .matrix-col:hover {
        border: #1b1e21 1px solid;
        padding: 12px 19.5px;
        background: wheat;
    }

    .matrix-col.counted {
        background-color: gainsboro;
    }

    .matrix-count {
        margin-top: 20px;
    }

    .matrix-count .count {
        color: red;
        font-weight: 600;
    }

    .matrix-params {
        padding-top: 20px;
    }

    .matrix-params input {
        width: 50px;
        padding: 5px 10px;
    }

</style>
