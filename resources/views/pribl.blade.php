@extends('welcome')
@section('content')
<style>
  #otkaz{
    margin-left: 44%;
  }
</style>
@if ($brends->count == "1")
<div class="page-body button-page">
<div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col-3 d-flex alert alert-primary">
        <h6 class="mx-3">Жами савдо:</h6>
        <h6 id="jamisavdo"></h6>
      </div>
      <div class="col-3 d-flex alert alert-danger">
        <h6 class="mx-3">Жами карз:</h6>
        <h6 id="jamikarz"></h6>
      </div>
      <div class="col-3 d-flex alert alert-danger">
        <h6 class="mx-3">Жами расход:</h6>
        <h6 id="rasxod"></h6>
      </div>
      <div class="col-3 d-flex alert alert-info">
        <h6 class="mx-3">Жами прибл:</h6>
        <h6 id="jamipribl"></h6>
      </div>
      <div class="col-3 d-flex alert alert-success">
        <h4 class="mx-3">Склад сумма:</h4>
        <h4 id="sqladjami"></h4>
      </div>    
    </div>
    <div class="d-flex mt-0">
      <div class="d-flex">
        <input type="date" class="form-control" id="data">
        <input type="date" class="form-control mx-2" id="data2">
      </div>  
    </div>   
        </div>
            <table class="tab table-hover">
              <thead>
              <tr>
                  <th>Слент</th>
                  <th>Товар</th>
                  <th>Товар сони</th>
                  <th>Сумма</th>
                  <th>Итого</th>
              </tr>
              </thead>
              <tbody id="clent">

              </tbody>               
          </table>
      </div>
  </div>
</div>    
@else
<div class="page-body button-page">
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-3 d-flex alert alert-primary">
          <h6 class="mx-3">Жами савдо:</h6>
          <h6 id="jamisavdodok"></h6>
        </div>
        <div class="col-3 d-flex alert alert-danger">
          <h6 class="mx-3">Жами карз:</h6>
          <h6 id="jamikarzdok"></h6>
        </div>
        <div class="col-3 d-flex alert alert-danger">
          <h6 class="mx-3">Жами расход:</h6>
          <h6 id="rasxoddok"></h6>
        </div>
        <div class="col-3 d-flex alert alert-info">
          <h6 class="mx-3">Жами прибл:</h6>
          <h6 id="jamipribldok"></h6>
        </div>
        <div class="col-3 d-flex alert alert-success">
          <h4 class="mx-3">Склад сумма:</h4>
          <h4 id="sqladjamidok"></h4>
        </div>    
      </div>
      <div class="d-flex mt-0">
        <div class="d-flex">
          <input type="date" class="form-control" id="datadok">
          <input type="date" class="form-control mx-2" id="data2dok">
        </div>  
      </div>   
          </div>
              <table class="tab table-hover">
                <thead>
                <tr>
                    <th>Слент</th>
                    <th>Товар</th>
                    <th>Товар сони</th>
                    <th>Сумма</th>
                    <th>Итого</th>
                </tr>
                </thead>
                <tbody id="clenterdok">
  
                </tbody>               
            </table>
        </div>
    </div>
  </div>
@endif
  
 
<script>
  function getel(data,  data2){
    $.ajax({
        url: "{{ route('getel') }}",
        type: "GET",
        data:{
          data: data,
          data2: data2,
        },
        dataType:'json',
        success: function(data) {
        
          $("#jamisavdo").html(data.data.jami);
          $("#jamikarz").html(data.data.karz);
          $("#rasxod").html(data.data.rasxod);
          $("#jamipribl").html(data.data.pribl);
          $("#sqladjami").html(data.data.vse);
          $("#clent").html(data.output);
        }
    });
  }
  getel();

$(document).on("change", "#data2", function (){
  var data = $("#data").val();
  var data2 = $(this).val();
  getel(data, data2);
});

function geteldok(data,  data2){
    $.ajax({
        url: "{{ route('geteldok') }}",
        type: "GET",
        data:{
          data: data,
          data2: data2,
        },
        dataType:'json',
        success: function(data) {
        
          $("#jamisavdodok").html(data.data.jami);
          $("#jamikarzdok").html(data.data.karz);
          $("#rasxoddok").html(data.data.rasxod);
          $("#jamipribldok").html(data.data.pribl);
          $("#sqladjamidok").html(data.data.vse);
          $("#clenterdok").html(data.output);
        }
    });
  }
  geteldok();

$(document).on("change", "#data2dok", function (){
  var data = $("#datadok").val();
  var data2 = $(this).val();
  geteldok(data, data2);
});

</script>

@endsection