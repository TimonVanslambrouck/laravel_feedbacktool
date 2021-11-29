<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<figure class="highcharts-figure">
    <div id="container1" class="mb-6"></div>
    <div id="container2"></div>
    <script>
        // Source: https://stackoverflow.com/a/44955212, https://www.highcharts.com/demo/line-basic
        let data = {!! json_encode($data) !!}
        console.log(data);
        let questionnaire1 = data[0][0]
        let questionnaire2 = data[0][1]
        let list1Names = data[1];
        let list1Data = data[2];
        let list2Names = data[3];
        let list2Data = data [4];
        console.log(questionnaire1, questionnaire2,list1Names, list1Data, list2Names, list2Data)

        Highcharts.chart('container1', {

            title: {
                text: questionnaire1.volledigeNaam
            },

            subtitle: {
                text: questionnaire1.naam
            },

            yAxis: {
                min: 1,
                max: 10,
                title: {
                    text: 'Gemiddelde score'
                },
                type: 'linear',
                tickInterval: 1
            },

            xAxis: {
                categories:list1Names,
            },

            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },

            plotOptions: {
                series: {
                    allowPointSelect: true,
                },
                column: {
                    pointStart: 1
                }
            },

            series: [{
                name: 'Score',
                data: list1Data
            }],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }

        });

        Highcharts.chart('container2', {

            title: {
                text: questionnaire2.volledigeNaam
            },

            subtitle: {
                text: questionnaire2.naam
            },

            yAxis: {
                min: 1,
                max: 10,
                title: {
                    text: 'Gemiddelde score'
                },
                type: 'linear',
                tickInterval: 1
            },

            xAxis: {
                categories:list2Names
            },

            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },

            plotOptions: {
                series: {
                    allowPointSelect: true,
                },
                column: {
                    pointStart: 1
                }
            },

            series: [{
                name: 'Score',
                data: list2Data
            }],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }

        });


    </script>
</figure>
