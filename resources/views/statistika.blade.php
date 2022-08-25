@extends('welcome')
@section('content')
@if ($brends->count == "1")
<div class="row">
    <div class="col-3 d-flex mb-2">
        <input type="date" class="form-control mr-2" id="date">
        <input type="date" class="form-control" id="date2">
    </div>
</div>
<div id="chartContainer" class="mb-4" style="height: 400px; width: 100%;"></div>
<div class="col-2">
    <button class="btn btn-primary" id="limit">
        Лимит контрол
    </button>
</div>
<div id="Container" class="mt-1" style="height: 400px; width: 100%;"></div>
<div id="garizantal" class="mt-5" style="height: 500px; width: 100%;"></div>
<div id="garizantalshuc" class="mt-5" style="height: 500px; width: 100%;"></div>

@elseif($brends->count == "2")
<div id="chartContainerdok" class="mb-4" style="height: 400px; width: 100%;"></div>
<div id="garizantaldok" class="mt-5" style="height: 500px; width: 100%;"></div>
<div id="garizantalshucdok" class="mt-5" style="height: 500px; width: 100%;"></div>
@endif

<div class="modal fade" id="li" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Создать лимит</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="number" class="form-control" id="lim">
          </div>
          <div class="text-right pb-4 pr-3">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Назад</button>
              <button type="submit" id="sav" class="btn btn-success">Сохранить</button>
          </div>
      </div>
    </div>
  </div>
<script>
    $("#limit").on("click", function () {
        $("#li").modal("show");
    });

    function garizantal(){
        $.ajax({
            url: "{{ route('garizantal') }}",
            type: "GET",
            success:function(data){
                console.log(data);
                var chartee = new CanvasJS.Chart("garizantal", {
                animationEnabled: true,
                title: {
                    text: "Товарларнинг фойдаси бойича кантрол"
                },
                axisX: {
                    interval: 1
                },
                axisY: {
                    title: "Топ 10 товар",
                    includeZero: true,
                    scaleBreaks: {
                        type: "wavy",
                        customBreaks: [{
                            startValue: 80,
                            endValue: 210
                            },
                            {
                                startValue: 230,
                                endValue: 600
                            }
                    ]}
                },
                data: [{
                    type: "bar",
                    dataPoints: [
                        { label: data.label9, y: data.y9, gdp: data.gdp9},
                        { label: data.label8, y: data.y8, gdp: data.gdp8},
                        { label: data.label7, y: data.y7, gdp: data.gdp7},
                        { label: data.label6, y: data.y6, gdp: data.gdp6},
                        { label: data.label5, y: data.y5, gdp: data.gdp5},
                        { label: data.label4, y: data.y4, gdp: data.gdp4},
                        { label: data.label3, y: data.y3, gdp: data.gdp3},
                        { label: data.label2, y: data.y2, gdp: data.gdp2},
                        { label: data.label1, y: data.y1, gdp: data.gdp1},
                        { label: data.label, y: data.y, gdp: data.gdp},
                    ]
                }]
            });
            chartee.render();
            }
        });
    }
    garizantal();
    garizantal();

    function garizantal2(){
        $.ajax({
            url: "{{ route('garizantalshuc') }}",
            type: "GET",
            success:function(data){
                console.log(data);
                var chartee = new CanvasJS.Chart("garizantalshuc", {
                animationEnabled: true,
                title: {
                    text: "Товарларнинг сотилиши бойича кантрол"
                },
                axisX: {
                    interval: 1
                },
                axisY: {
                    title: "Топ 10 товар",
                    includeZero: true,
                    scaleBreaks: {
                        type: "wavy",
                        customBreaks: [{
                            startValue: 80,
                            endValue: 210
                            },
                            {
                                startValue: 230,
                                endValue: 600
                            }
                    ]}
                },
                data: [{
                    type: "bar",
                    dataPoints: [
                        { label: data.label9, y: data.y9, gdp: data.gdp9},
                        { label: data.label8, y: data.y8, gdp: data.gdp8},
                        { label: data.label7, y: data.y7, gdp: data.gdp7},
                        { label: data.label6, y: data.y6, gdp: data.gdp6},
                        { label: data.label5, y: data.y5, gdp: data.gdp5},
                        { label: data.label4, y: data.y4, gdp: data.gdp4},
                        { label: data.label3, y: data.y3, gdp: data.gdp3},
                        { label: data.label2, y: data.y2, gdp: data.gdp2},
                        { label: data.label1, y: data.y1, gdp: data.gdp1},
                        { label: data.label, y: data.y, gdp: data.gdp},
                    ]
                }]
            });
            chartee.render();
            }
        });
    }
    garizantal2();
    garizantal2();

    function garizantaldok(){
        $.ajax({
            url: "{{ route('garizantaldok') }}",
            type: "GET",
            success:function(data){
                console.log(data);
                var chartee = new CanvasJS.Chart("garizantaldok", {
                animationEnabled: true,
                title: {
                    text: "Товарларнинг фойдаси бойича кантрол"
                },
                axisX: {
                    interval: 1
                },
                axisY: {
                    title: "Топ 10 товар",
                    includeZero: true,
                    scaleBreaks: {
                        type: "wavy",
                        customBreaks: [{
                            startValue: 80,
                            endValue: 210
                            },
                            {
                                startValue: 230,
                                endValue: 600
                            }
                    ]}
                },
                data: [{
                    type: "bar",
                    dataPoints: [
                        { label: data.label9, y: data.y9, gdp: data.gdp9},
                        { label: data.label8, y: data.y8, gdp: data.gdp8},
                        { label: data.label7, y: data.y7, gdp: data.gdp7},
                        { label: data.label6, y: data.y6, gdp: data.gdp6},
                        { label: data.label5, y: data.y5, gdp: data.gdp5},
                        { label: data.label4, y: data.y4, gdp: data.gdp4},
                        { label: data.label3, y: data.y3, gdp: data.gdp3},
                        { label: data.label2, y: data.y2, gdp: data.gdp2},
                        { label: data.label1, y: data.y1, gdp: data.gdp1},
                        { label: data.label, y: data.y, gdp: data.gdp},
                    ]
                }]
            });
            chartee.render();
            }
        });
    }
    garizantaldok();
    garizantaldok();

    function garizantal2dok(){
        $.ajax({
            url: "{{ route('garizantalshucdok') }}",
            type: "GET",
            success:function(data){
                console.log(data);
                var chartee = new CanvasJS.Chart("garizantalshucdok", {
                animationEnabled: true,
                title: {
                    text: "Товарларнинг сотилиши бойича кантрол"
                },
                axisX: {
                    interval: 1
                },
                axisY: {
                    title: "Топ 10 товар",
                    includeZero: true,
                    scaleBreaks: {
                        type: "wavy",
                        customBreaks: [{
                            startValue: 80,
                            endValue: 210
                            },
                            {
                                startValue: 230,
                                endValue: 600
                            }
                    ]}
                },
                data: [{
                    type: "bar",
                    dataPoints: [
                        { label: data.label9, y: data.y9, gdp: data.gdp9},
                        { label: data.label8, y: data.y8, gdp: data.gdp8},
                        { label: data.label7, y: data.y7, gdp: data.gdp7},
                        { label: data.label6, y: data.y6, gdp: data.gdp6},
                        { label: data.label5, y: data.y5, gdp: data.gdp5},
                        { label: data.label4, y: data.y4, gdp: data.gdp4},
                        { label: data.label3, y: data.y3, gdp: data.gdp3},
                        { label: data.label2, y: data.y2, gdp: data.gdp2},
                        { label: data.label1, y: data.y1, gdp: data.gdp1},
                        { label: data.label, y: data.y, gdp: data.gdp},
                    ]
                }]
            });
            chartee.render();
            }
        });
    }
    garizantal2dok();
    garizantal2dok();

    $("#sav").on("click", function(){
        let _token  = $('meta[name="csrf-token"]').attr('content');
        var limit = $("#lim").val();
        $.ajax({
            url: "{{ route('limither') }}",
            type: "POST",
            data:{
                limit: limit,
                _token: _token
            },
            success: function(response) {
                $("#lim").val('');
                $("#li").modal("show");
                location.reload(true);
            }
        });
    });

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
                    { label: "Продажи", y: response.foo2.jami },
                    { label: "Долг", y: response.foo2.karz },
                    { label: "Прибл", y: response.foo2.pribl },
                    { label: "Склад товар сумма", y: response.foo2.vse },
                    { label: "Расход", y: response.foo2.rasxod },
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
                                { label: "Продажи", y: response.foo2.jami },
                                { label: "Долг", y: response.foo2.karz },
                                { label: "Прибл", y: response.foo2.pribl },
                                { label: "Склад товар сумма", y: response.foo2.vse },
                                { label: "Расход", y: response.foo2.rasxod },
                            ]
                        }]            
                    });
                    chart.render();
                }
            });
        });

        $.getJSON("{{ route('statistikdok') }}", function (response) {
        var chart = new CanvasJS.Chart("chartContainerdok", {
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
                    { label: "Продажи", y: response.foo2.jami },
                    { label: "Долг", y: response.foo2.karz },
                    { label: "Прибл", y: response.foo2.pribl },
                    { label: "Склад товар сумма", y: response.foo2.vse },
                    { label: "Расход", y: response.foo2.rasxod },
                ]
            }]
        });
        chart.render();
        });
    });

    window.onload = function () {
 
    var chart6 = new CanvasJS.Chart("Container", {
        animationEnabled: true,
        theme: "light2",
        title:{
            text: "Докон №1"
        },
        axisY:{
            includeZero: true
        },
        legend:{
            cursor: "pointer",
            verticalAlign: "center",
            horizontalAlign: "right",
            itemclick: toggleDataSeries
        },
        data: [{
            type: "column",
            name: "Прибл",
            indexLabel: "{y}",
            yValueFormatString: "$#0.##",
            showInLegend: true,
            dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
        },{
            type: "column",
            name: "Касса",
            indexLabel: "{y}",
            yValueFormatString: "$#0.##",
            showInLegend: true,
            dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart6.render();
    
    function toggleDataSeries(e){
        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        }
        else{
            e.dataSeries.visible = true;
        }
        chart6.render();
    }    
    }
</script>
@endsection