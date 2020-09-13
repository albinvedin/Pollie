<template>
    <div class="small">
        <bar-chart v-if="data" :options="options" :chart-data="data"></bar-chart>
    </div>
</template>

<script>
    import BarChart from './BarChart.js'

    export default {
        props: ['data'],
        components: {
            BarChart
        },
        data () {
            return {
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            }
        },
        watch: {
            data(fresh) {
                //
            }
        }
    }
</script>
