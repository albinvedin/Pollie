<template>
    <div class="small">
        <pie-chart v-if="data" :chart-data="data"></pie-chart>
    </div>
</template>

<script>
    import PieChart from './PieChart.js';

    export default {
        props: ['data'],
        components: {
            PieChart,
        },
        watch: {
            data(fresh) {
                //
            }
        }
    }
</script>
