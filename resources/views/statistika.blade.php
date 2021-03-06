@extends('welcome')
@section('content')
<div class="row">
    <div class="col-3 d-flex mb-2">
        <input type="date" class="form-control mr-2" id="date">
        <input type="date" class="form-control" id="date2">
    </div>
</div>
<div class="col-12">
<div id="chartContainer" class="mb-4" style="height: 400px; width: 100%;"></div>
<div class="col-2">
    <button class="btn btn-primary" id="limit">
        Лимит контрол
    </button>
</div>
<div id="Container" style="height: 400px; width: 100%;"></div>
</div>

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

    window.onload = function () {
 
    var chart = new CanvasJS.Chart("Container", {
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
    chart.render();
    
    function toggleDataSeries(e){
        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        }
        else{
            e.dataSeries.visible = true;
        }
        chart.render();
    }
    
    }
</script>
@endsection