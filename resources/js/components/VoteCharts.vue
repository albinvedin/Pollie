<template>
    <div class="container-fluid">
        <fold v-if="!loaded"></fold>
        <div v-else>
            <div class="row">
                <div class="col-md-6">
                    <vote-pie-chart :data="data"></vote-pie-chart>
                </div>
                <div class="col-md-6">
                    <vote-bar-chart :data="data"></vote-bar-chart>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import VoteBarChart from './VoteBarChart';
    import VotePieChart from './VotePieChart';

    export default {
        props: ['poll'],
        components: {
            VoteBarChart,
            VotePieChart
        },
        data () {
            return {
                data   : null,
                loaded : false
            }
        },
        mounted () {
            this.fetchData();
        },
        methods: {
            fetchData() {
                axios.get(`/api/polls/${this.poll.id}/votes`)
                    .then(response => {
                        this.data   = this.transform(response.data);
                        this.loaded = true;
                    }).catch(error => {
                        console.error(error);
                });
            },
            transform(data) {
                const values = data.map(item => item.count);
                const labels = data.map(item => item.text);

                return {
                    labels: labels,
                    datasets: [{
                        label: 'Votes',
                        backgroundColor: [
                            // Colors taken from https://material.io/resources/color/ with 400 as strength
                            '#ef5350',
                            '#ab47bc',
                            '#ec407a',
                            '#5c6bc0',
                            '#66bb6a',
                            '#ffee58',
                            '#ffa726',
                            '#ff7043',
                            '#26c6da',
                            '#d4e157',
                            '#8d6e63'
                        ].sort(() => Math.random() - 0.5),
                        data: values
                    }]
                };
            }
        }
    }
</script>
