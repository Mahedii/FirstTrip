<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8' />
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.1.0/echarts.min.js"></script> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.4.1/echarts.min.js"></script> 

</head>

<body>
    @php($topTenPackageSellData = App\Http\Controllers\Admin\Dashboard\DashboardController::getTopTenPackage())
    <div id="chartPie" style="height: 350px;"></div>

    <script>
        $(function() {
            'use strict'

            /**************** PIE CHART ************/
            var pieData = [{
                name: 'Packages',
                type: 'pie',
                radius: [20, 140],
                center: ['50%', '57.5%'],
                // roseType: 'area', // changes style
                itemStyle: {
                    borderRadius: 5
                },
                data: <?php echo json_encode($topTenPackageSellData); ?>,
                label: {
                    normal: {
                        fontFamily: 'Roboto, sans-serif',
                        fontSize: 11,
                        fontWeight: 600
                    }
                },
                labelLine: {
                    normal: {
                        show: true
                    }
                },
                markLine: {
                    lineStyle: {
                        normal: {
                            width: 2
                        }
                    }
                }
            }];
            var pieOption = {
                tooltip: {
                    trigger: 'item',
                    formatter: '{a} <br/>{b} : {c} ({d}%)',
                    textStyle: {
                        fontSize: 11,
                        fontFamily: 'Roboto, sans-serif'
                    }
                },
                legend: {},
                toolbox: {
                    show: true,
                    feature: {
                        mark: { show: true },
                        dataView: { show: true, readOnly: false },
                        restore: { show: true },
                        saveAsImage: { show: true }
                    }
                },
                series: pieData
            };
            var pie = document.getElementById('chartPie');
            var pieChart = echarts.init(pie);
            pieChart.setOption(pieOption);
            /** making all charts responsive when resize **/
        });

    </script>

</body>

</html>
