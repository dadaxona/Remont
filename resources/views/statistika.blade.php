@extends('welcome')
@section('content')
<div class="row">
    <div class="col-3 d-flex mb-2">
        <input type="date" class="form-control mr-2" id="date">
        <input type="date" class="form-control" id="date2">
    </div>
</div>
<div id="chartContainer" style="height: 600px; width: 100%;"></div>
<script>
    $(document).ready(function () {
    $.getJSON("{{ route('statistik') }}", function (response) {
        var chart = new CanvasJS.Chart("chartContainer", {
            title: {
                text: "Статистика малумотлари"
            },
            animationEnabled: true,
            data: [{
                type: "pie",
                startAngle: 45,
                showInLegend: "true",
                legendText: "{label}",
                indexLabel: "{label} ({y})",
                yValueFormatString:"#,##0.#"%"",
                dataPoints: [
                    { label: "Продажи", y: response.foo2.opshi },
                    { label: "Долг", y: response.foo2.foiz },
                    { label: "Прибл", y: response.foo2.itog },
                ]
            }]             
        });
        chart.render();
        });

        $("#date2").on("change", function(){
            var date2 = $(this).val();
            var date = $("#date").val();
            $.ajax({
                url: "{{ route('statistik2') }}",
                type: "GET",
                data:{
                    date:date,
                    date2:date2
                },
                success: function(response) {
                    var chart = new CanvasJS.Chart("chartContainer", {
                        title: {
                            text: "Статистика малумотлари"
                        },
                        animationEnabled: true,
                        data: [{
                            type: "pie",
                            startAngle: 45,
                            showInLegend: "true",
                            legendText: "{label}",
                            indexLabel: "{label} ({y})",
                            yValueFormatString:"#,##0.#"%"",
                            dataPoints: [
                                { label: "Продажи", y: response.foo2.opshi },
                                { label: "Долг", y: response.foo2.foiz },
                                { label: "Прибл", y: response.foo2.itog },
                            ]
                        }]             
                    });
                    chart.render();
                }
            });
        });
    });
</script>
@endsection