@extends('welcome')
@section('content')
<style>
   .borders{
    border-top: 2px solid;
  }
  .bor{
    border-right: 2px solid;
    padding: 0;
  }
  .bor1{
    border-right: 2px solid;
    padding-right: 0;
  }
  .bor2{
    border-bottom: 2px solid;
  }
  #itog2{
        /* background: #ffffff;
        border: none;
        border-bottom: 2px solid; */
    }
  .sifra{
    border: none;
    border-bottom: 2px solid;
    font-size: 20px;
    text-align: right;
    padding-bottom: 0px;
  }
  .sifra2{
    border: none;
    border-bottom: 2px solid;
    font-size: 20px;
    text-align: center;
    margin-top: 26px;
  }
</style>
@if ($brends->count == "1" || $brends->count == "3" || $brends->count == "4")
    
<div id="AAAAAAAA" class="card ui-widget-content">
  <div class="card-block tab-icon">
    <div class="col-12">
      <ul class="nav nav-tabs md-tabs " role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home7" role="tab" aria-expanded="true"><i class="icofont icofont-home"></i>Клент</a>
            <div class="slide"></div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#profile7" role="tab" aria-expanded="false"><i class="icofont icofont-ui-user "></i>Бирламчи</a>
            <div class="slide"></div>
        </li>
      </ul>
      <div class="tab-content card-block">
        <div class="tab-pane active" id="home7" role="tabpanel" aria-expanded="true">
            <div class="row">
              <div class="col-2 bor">
                <div class="table-responsive">
                  <div class="ext scrolll2">
                    <div class="rty2">
                      <table class="tab table-hover" id="">
                          <thead>
                            <th>
                              <button id="vseclent" class="btn btn-success">
                                Все
                              </button>
                            </th>
                          </thead>
                          <tbody id="clent_tip">

                          </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-4 bor">
                <div class="table-responsive">
                  <div class="ext555 scrolll2">
                    <div class="rty2pul">
                      <table class="tab table-hover">
                        <thead>
                          <tr>
                            <th>Последняя дата</th>
                            <th>Клент</th>
                            <th>Итого</th>
                            <th>Наличные</th>
                            <th>Карта</th>
                            <th>Безнал</th>
                            <th>Долг</th>
                          </tr>
                      </thead>
                          <tbody id="dolg">
          
                          </tbody>
                      </table>
                    </div> 
                  </div>
                </div> 
              </div>
              <div class="col-6">
                <div class="table-responsive">
                  <div class="ext scrolll2">
                    <div class="rty2">
                      <table class="tab table-hover">

                        <thead>
                          <tr>
                            <th>Последняя дата</th>
                            <th class="pl-5">Товар</th>
                            <th class="pr-5">Шт</th>
                            <th>Цена продажи</th>
                            <th>Скидка</th>
                            <th>Итого</th>
                          </tr>             
                      </thead>
                          <tbody id="savdo">
          
                          </tbody>
                      </table>
                    </div> 
                  </div>
                </div> 
              </div>

              <div class="col-12 m-0 p-0 borders">
                <div class="row">
                  {{-- <div class="col-2 bor1">
                    <input type="text" id="tavarshtuk2" class="form-control sifra" placeholder="Товар шт">
                    <input type="text" id="shtuk2" class="form-control sifra" placeholder="Шт">  
                  </div> --}}
                  <div class="col-2 bor1">
                    Долг: <input type="text" id="foiz2" class="form-control sifra" placeholder="Долг">
                    Итого Сумма: <input type="text" id="itoge2" class="form-control sifra" placeholder="Итого">   
                  </div>
                  <div class="col-3 mx-5 bor1">
                    <input type="text" id="clentname" class="form-control sifra2" placeholder="Клент имя">  
                  </div>
                  <div class="col-4 mt-4">
                    <form>
                      @csrf
                    <input type="hidden" id="oydi">
          
                      <div class="d-flex">
                        <select name="tavar_id" id="tavar_id" class="form-control bor2">
                          <option value="">--Тип--</option>
                          @foreach ($tavar as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                          @endforeach
                        </select>
                        <input class="form-control mx-2" style="width: 37%" type="date" id="date" name="date">
                        <input class="form-control" style="width: 37%" type="date" id="date2" name="date2">
                          {{-- <div class="input-group-append">
                          <button type="submit" class="btn btn-primary buts" id="submithendel">
                              Поиск
                          </button>
                        </div> --}}
                      </div>
                    </form>
                </div>
                </div>
              </div>
            </div>
        </div>
        <div class="tab-pane" id="profile7" role="tabpanel" aria-expanded="false">
            <div class="row">
              <div class="col-12 bor">
                <div class="table-responsive">
                  <div class="ext scrolll2">
                    <div class="rty2">
                      <table class="tab table-hover">
                        <thead>
                          <tr>
                            <th>Товар</th>
                            <th>Шт</th>
                            <th>Цена продажи</th>
                            <th>Скидка</th>
                            <th>Итого</th>
                            <th>Последняя дата</th>
                          </tr>             
                      </thead>
                          <tbody id="savdobirlamchi">
          
                          </tbody>
                      </table>
                    </div> 
                  </div>
                </div> 
              </div>
              <div class="col-12 m-0 p-0 borders">
                <div class="row">
                  {{-- <div class="col-2 bor1">
                    <input type="text" id="tavarshtuk2s" class="form-control sifra" placeholder="Товар шт">
                    <input type="text" id="shtuk2s" class="form-control sifra" placeholder="Шт">  
                  </div> --}}
                  <div class="col-2 mt-2 bor1">
                    <br>
                    Итого: <input type="text" id="itoge2s" class="form-control sifra" placeholder="Итого">
                  </div>
                  <div class="col-8 mt-4">
                    <form>
                      @csrf
                      <div class="d-flex">
                        <select name="tavar_id" id="tavar_ids" class="form-control bor2">
                          <option value="">--Тип--</option>
                          @foreach ($tavar as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                          @endforeach
                        </select>
                        <input class="form-control mx-2" style="width: 37%" type="date" id="datem">
                        <input class="form-control" style="width: 37%" type="date" id="datem2">                      
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

@else
    
<div id="AAAAAAAA" class="card ui-widget-content">
  <div class="card-block tab-icon">
    <div class="col-12">
      <ul class="nav nav-tabs md-tabs " role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home7dok" role="tab" aria-expanded="true"><i class="icofont icofont-home"></i>Клент</a>
            <div class="slide"></div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#profile7dok" role="tab" aria-expanded="false"><i class="icofont icofont-ui-user "></i>Бирламчи</a>
            <div class="slide"></div>
        </li>
      </ul>
      <div class="tab-content card-block">
        <div class="tab-pane active" id="home7dok" role="tabpanel" aria-expanded="true">
            <div class="row">
              <div class="col-2 bor">
                <div class="table-responsive">
                  <div class="ext scrolll2">
                    <div class="rty2">
                      <table class="tab table-hover" id="">

                          <thead>
                            <th>
                              <button id="vseclentdok" class="btn btn-success">
                                Все
                              </button>
                            </th>
                          </thead>
                          <tbody id="clent_tipdok">
          
                          </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-4 bor">
                <div class="table-responsive">
                  <div class="ext scrolll2">
                    <div class="rty2">
                      <table class="tab table-hover">

                        <thead>
                          <tr>
                            <th>Последняя дата</th>
                            <th>Клент</th>
                            <th>Итого</th>
                            <th>Наличные</th>
                            <th>Карта</th>
                            <th>Безнал</th>
                            <th>Долг</th>
                          </tr>             
                      </thead>
                          <tbody id="dolgdok">
          
                          </tbody>
                      </table>
                    </div> 
                  </div>
                </div> 
              </div>

              <div class="col-6">
                <div class="table-responsive">
                  <div class="ext scrolll2">
                    <div class="rty2">
                      <table class="tab table-hover">

                        <thead>
                          <tr>
                            <th>Последняя дата</th>
                            <th>Товар</th>
                            <th>Шт</th>
                            <th>Цена продажи</th>
                            <th>Скидка</th>
                            <th>Итого</th>
                          </tr>             
                      </thead>
                          <tbody id="savdodok">
          
                          </tbody>
                      </table>
                    </div> 
                  </div>
                </div> 
              </div>

              <div class="col-12 m-0 p-0 borders">
                <div class="row">
                  <div class="col-2 bor1">
                    <input type="text" id="tavarshtuk2dok" class="form-control sifra" placeholder="Товар шт">
                    <input type="text" id="shtuk2dok" class="form-control sifra" placeholder="Шт">  
                  </div>
                  <div class="col-2 bor1">
                    <input type="text" id="foiz2dok" class="form-control sifra" placeholder="Товар протсент">
                    <input type="text" id="itoge2dok" class="form-control sifra" placeholder="Итого">  
                  </div>
                  <div class="col-3 mx-5 bor1">
                    <input type="text" id="clentnamedok" class="form-control sifra2" placeholder="Клент имя">  
                  </div>
                  <div class="col-4 mt-4">
                    <form>
                      @csrf
                    <input type="hidden" id="oydidok">
          
                      <div class="d-flex">
                        <select name="tavar_id" id="tavar_iddok" class="form-control bor2">
                          <option value="">--Тип--</option>
                          @foreach ($tavardok as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                          @endforeach
                        </select>
                        <input class="form-control mx-2" style="width: 37%" type="date" id="datedok" name="date">
                        <input class="form-control" style="width: 37%" type="date" id="date2dok" name="date2">
                          {{-- <div class="input-group-append">
                          <button type="submit" class="btn btn-primary buts" id="submithendel">
                              Поиск
                          </button>
                        </div> --}}
                      </div>
                    </form>
                </div>
                </div>
              </div>
            </div>
        </div>
        <div class="tab-pane" id="profile7dok" role="tabpanel" aria-expanded="false">
            <div class="row">
              <div class="col-12 bor">
                <div class="table-responsive">
                  <div class="ext scrolll2">
                    <div class="rty2">
                      <table class="tab table-hover">
                        <thead>
                          <tr>
                            <th>Товар</th>
                            <th>Штрих код</th>
                            <th>Шт</th>
                            <th>Цена продажи</th>
                            <th>Скидка</th>
                            <th>Итого</th>
                            <th>Последняя дата</th>
                          </tr>             
                      </thead>
                          <tbody id="savdobirlamchidok">
          
                          </tbody>
                      </table>
                    </div> 
                  </div>
                </div> 
              </div>
              <div class="col-12 m-0 p-0 borders">
                <div class="row">
                  <div class="col-2 bor1">
                    <input type="text" id="tavarshtuk2s" class="form-control sifra" placeholder="Товар шт">
                    <input type="text" id="shtuk2s" class="form-control sifra" placeholder="Шт">  
                  </div>
                  <div class="col-2 mt-3 bor1">
                    <br>
                    <input type="text" id="itoge2s" class="form-control sifra" placeholder="Итого">
                  </div>
                  <div class="col-8 mt-4">
                    <form>
                      @csrf
                      <div class="d-flex">
                        <select name="tavar_id" id="tavar_idsdok" class="form-control bor2">
                          <option value="">--Тип--</option>
                          @foreach ($tavardok as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                          @endforeach
                        </select>
                        <input class="form-control mx-2" style="width: 37%" type="date" id="datemdok">
                        <input class="form-control" style="width: 37%" type="date" id="datem2dok">                      
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endif

<div class="modal fade" id="vazvirat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ex"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <input type="hidden" id="idvaz">
          <div class="row">
            <div class="col-6">
              <input type="text" class="form-control" id="vazvrathajm" placeholder="Шт">
            </div>
            <div class="col-6">
              <input type="text" class="form-control" id="valhajm" disabled>
            </div>
            <input type="hidden" id="valhajm2">
          </div>
          <input type="text" class="form-control mt-3" id="sabab" placeholder="Сабап">
        </div>
        <div class="text-center pb-4">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Нет</button>
            <button type="submit" id="qaytar" class="btn btn-success">Да</button>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="vazviratdok" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exdok"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <input type="hidden" id="idvazdok">
          <div class="row">
            <div class="col-6">
              <input type="text" class="form-control" id="vazvrathajmdok" placeholder="Шт">
            </div>
            <div class="col-6">
              <input type="text" class="form-control" id="valhajmdok" disabled>
            </div>
            <input type="hidden" id="valhajm2dok">
          </div>
          <input type="text" class="form-control mt-3" id="sababdok" placeholder="Сабап">
        </div>
        <div class="text-center pb-4">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Нет</button>
            <button type="submit" id="qaytardok" class="btn btn-success">Да</button>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="vazviratb" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exb"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <input type="hidden" id="idvazb">
          <div class="row">
            <div class="col-6">
              <input type="text" class="form-control" id="vazvrathajmb" placeholder="Шт">
            </div>
            <div class="col-6">
              <input type="text" class="form-control" id="valhajmb" disabled>
            </div>
            <input type="hidden" id="valhajm2b">
          </div>
          <input type="text" class="form-control mt-3" id="sabab2" placeholder="Сабап">
        </div>
        <div class="text-center pb-4">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Нет</button>
            <button type="submit" id="qaytarb" class="btn btn-success">Да</button>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="vazviratbdok" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exbdok"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <input type="hidden" id="idvazbdok">
          <div class="row">
            <div class="col-6">
              <input type="text" class="form-control" id="vazvrathajmbdok" placeholder="Шт">
            </div>
            <div class="col-6">
              <input type="text" class="form-control" id="valhajmbdok" disabled>
            </div>
            <input type="hidden" id="valhajm2bdok">
          </div>
          <input type="text" class="form-control mt-3" id="sabab2dok" placeholder="Сабап">
        </div>
        <div class="text-center pb-4">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Нет</button>
            <button type="submit" id="qaytarbdok" class="btn btn-success">Да</button>
        </div>
    </div>
  </div>
</div>
<script>
  
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });

  $(document).ready(function(){

    function fetch_customer_data(query = '')
    {
        $.ajax({
            url:"{{ route('clent_tip') }}",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $('#clent_tip').html(data.table_data);
            }
        })
    }
    fetch_customer_data();
    fetch_customer_data();

    function fetch_customer_data123(query = '')
    {
        $.ajax({
            url:"{{ route('savdobirlamchi') }}",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
              $('#savdobirlamchi').html(data.output);
              $("#tavarshtuk2s").val(data.foo2.tavarshtuk);
              $("#shtuk2s").val(data.foo2.shtuk);
              $("#itoge2s").val(data.foo2.opshi);
            }
        })
    }
    fetch_customer_data123();

    $(document).on('change', "#tavar_ids", function(){
    var tavar_id = $("#tavar_ids").val();
    var date = $("#datem").val();
    var date2 = $("#datem2").val();
    let _token  = $('meta[name="csrf-token"]').attr('content');
      // if(oydi){
        $.ajax({
              url:"{{ route('brlamclient') }}",
              method:'POST',
              data:{
                tavar_id: tavar_id,
                date: date,
                date2: date2,
                _token: _token
              },
              dataType:'json',
              success:function(data)
              {
                $('#savdobirlamchi').html(data.output);
                $("#tavarshtuk2s").val(data.foo2.tavarshtuk);
                $("#shtuk2s").val(data.foo2.shtuk);
                $("#itoge2s").val(data.foo2.opshi);
              }
          });
      // }else{
      //   toastr.error("Выберите клент").fadeOut(1500);
      // }
    });

    $(document).on('change', "#datem", function(){
    var tavar_id = $("#tavar_ids").val();
    var date = $("#datem").val();
    var date2 = $("#datem2").val();
    let _token  = $('meta[name="csrf-token"]').attr('content');  
    $.ajax({
          url:"{{ route('brlamclient') }}",
          method:'POST',
          data:{
            tavar_id: tavar_id,
            date: date,
            date2: date2,
            _token: _token
          },
          dataType:'json',
          success:function(data)
          {
            $('#savdobirlamchi').html(data.output);
            $("#tavarshtuk2s").val(data.foo2.tavarshtuk);
            $("#shtuk2s").val(data.foo2.shtuk);
            $("#itoge2s").val(data.foo2.opshi);
          }
      });
    });

    $(document).on('click', "#bilamvaz", function(){
      var id = $(this).data("id");      
      $.ajax({
        url:"{{ route('qaytareditbirlam') }}",
        method:'GET',
        data:{
          id: id
        },
        dataType:'json',
        success:function(data)
        {
          $("#idvazb").val(data.id);
          $("#exb").html(data.name);
          $("#valhajmb").val(data.soni);
          $("#valhajm2b").val(data.soni);
          $("#vazviratb").modal("show");
        }
      });
    });

    $(document).on('click', "#bilamvazdok", function(){
      var id = $(this).data("id");
      $.ajax({
        url:"{{ route('qaytareditbirlamdok') }}",
        method:'GET',
        data:{
          id: id
        },
        dataType:'json',
        success:function(data)
        {
          $("#idvazbdok").val(data.id);
          $("#exbdok").html(data.name);
          $("#valhajmbdok").val(data.soni);
          $("#valhajm2bdok").val(data.soni);
          $("#vazviratbdok").modal("show");
        }
      });
    });

    $(document).on('keyup', "#vazvrathajmb", function(){
      var a = $(this).val();
      var b = $("#valhajm2b").val();
      $("#valhajmb").val(b - a);
      var javob = $("#valhajmb").val();
      if(javob < 0){
        toastr.error("Киймат коп киритилди");
      }
    });

    
    $(document).on('keyup', "#vazvrathajmbdok", function(){
      var a = $(this).val();
      var b = $("#valhajm2bdok").val();
      $("#valhajmbdok").val(b - a);
      var javob = $("#valhajmbdok").val();
      if(javob < 0){
        toastr.error("Киймат коп киритилди");
      }
    });

    $(document).on('click', "#qaytarb", function(event){
      event.preventDefault();
      var idvaz = $("#idvazb").val();
      var vazvrathajm = $("#vazvrathajmb").val();
      var sabab2 = $("#sabab2").val();
      let _token  = $('meta[name="csrf-token"]').attr('content');
      if(sabab2){
        $.ajax({
        url:"{{ route('qaytarbirlamchini') }}",
        method:'POST',
        data:{
          id: idvaz,
          hajm: vazvrathajm,
          sabab: sabab2,
          _token: _token
        },
        dataType:'json',
        success:function(data)
        {
          if (data.code == 0) {
            toastr.error(data.msg);
          }
          if (data.code == 200) {
            fetch_customer_data123();
            toastr.success(data.msg);
            $("#vazvrathajmb").val('');
            $("#vazviratb").modal("hide");
          }
        }
      });
      }else{
        toastr.error("Сабап корсатинг");
      }
    });

    $(document).on('click', "#qaytarbdok", function(event){
      event.preventDefault();
      var idvaz = $("#idvazbdok").val();
      var vazvrathajm = $("#vazvrathajmbdok").val();
      var sabab2 = $("#sabab2dok").val();
      let _token  = $('meta[name="csrf-token"]').attr('content');
      if(sabab2){
        $.ajax({
        url:"{{ route('qaytarbirlamchinidok') }}",
        method:'POST',
        data:{
          id: idvaz,
          hajm: vazvrathajm,
          sabab: sabab2,
          _token: _token
        },
        dataType:'json',
        success:function(data)
        {
          if (data.code == 0) {
            toastr.error(data.msg);
          }
          if (data.code == 200) {
            fetch_customer_data123dok();
            toastr.success(data.msg);
            $("#vazvrathajmbdok").val('');
            $("#vazviratbdok").modal("hide");
          }
        }
      });
      }else{
        toastr.error("Сабап корсатинг");
      }
    });

    $(document).on('change', "#datem2", function(){
    var tavar_id = $("#tavar_ids").val();
    var date = $("#datem").val();
    var date2 = $("#datem2").val();
    let _token  = $('meta[name="csrf-token"]').attr('content');
      // if(oydi){
        $.ajax({
              url:"{{ route('brlamclient') }}",
              method:'POST',
              data:{
                tavar_id: tavar_id,
                date: date,
                date2: date2,
                _token: _token
              },
              dataType:'json',
              success:function(data)
              {
                $('#savdobirlamchi').html(data.output);
                $("#tavarshtuk2s").val(data.foo2.tavarshtuk);
                $("#shtuk2s").val(data.foo2.shtuk);
                $("#itoge2s").val(data.foo2.opshi);
              }
          });
      // }else{
      //   toastr.error("Выберите клент").fadeOut(1500);
      // }
    });

    $(document).on('click', "#data", function(){
    var id = $(this).data("id");
    $("#oydi").val(id);
    $.ajax({
          url:"{{ route('clents2') }}",
          method:'GET',
          data:{
            id: id
          },
          dataType:'json',
          success:function(data)
          {
            $('#savdo').html(data.output);
            $('#dolg').html(data.output2);
            $("#clentname").val(data.clent.name);
            $("#tavarshtuk2").val(data.foo2.tavarshtuk);
            $("#shtuk2").val(data.foo2.shtuk);
            $("#foiz2").val(data.foo2.foiz);
            $("#itoge2").val(data.foo2.opshi);
          }
      });
    });

    $(document).on('click', "#cret", function(){
    var id = $(this).data("id");
    $("#oydi").val(id);
    $.ajax({
        url:"{{ route('clents2aniq') }}",
        method:'GET',
        data:{
          id: id
        },
        dataType:'json',
        success:function(data)
        {
          $('#savdo').html(data.output);
          $("#clentname").val(data.clent.name);
          $("#tavarshtuk2").val(data.foo2.tavarshtuk);
          $("#shtuk2").val(data.foo2.shtuk);
          $("#foiz2").val(data.foo2.foiz);
          $("#itoge2").val(data.foo2.opshi);
        }
      });
    });
  
    $(document).on('click', "#cretdok", function(){
    var id = $(this).data("id");
    $("#oydi").val(id);
    $.ajax({
        url:"{{ route('clents2aniqdok') }}",
        method:'GET',
        data:{
          id: id
        },
        dataType:'json',
        success:function(data)
        {
          $('#savdodok').html(data.output);
          $("#clentnamedok").val(data.clent.name);
          $("#tavarshtuk2dok").val(data.foo2.tavarshtuk);
          $("#shtuk2dok").val(data.foo2.shtuk);
          $("#foiz2dok").val(data.foo2.foiz);
          $("#itoge2dok").val(data.foo2.opshi);
        }
      });
    });
    $(document).on('click', "#vseclent", function(event){
      event.preventDefault();
      let _token  = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
          url:"{{ route('vseclent') }}",
          method:'POST',
          data:{
            _token: _token
          },
          dataType:'json',
          success:function(data)
          {
            $('#savdo').html(data.output);
            $('#dolg').html(data.output2);
            $("#clentname").val(data.clent);
            $("#tavarshtuk2").val(data.foo2.tavarshtuk);
            $("#shtuk2").val(data.foo2.shtuk);
            $("#foiz2").val(data.foo2.foiz);
            $("#itoge2").val(data.foo2.opshi);
          }
      });
    });

    
    $(document).on('click', "#vazvrat", function(event){
      event.preventDefault();
      var id = $(this).data("id");      
      $.ajax({
        url:"{{ route('qaytaredit') }}",
        method:'GET',
        data:{
          id: id
        },
        dataType:'json',
        success:function(data)
        {
          $("#idvaz").val(data.id);
          $("#ex").html(data.name);
          $("#valhajm").val(data.soni);
          $("#valhajm2").val(data.soni);
          $("#vazvirat").modal("show");
        }
      });
    });

    $(document).on('click', "#vazvratdok", function(event){
      event.preventDefault();
      var id = $(this).data("id");      
      $.ajax({
        url:"{{ route('qaytareditdok') }}",
        method:'GET',
        data:{
          id: id
        },
        dataType:'json',
        success:function(data)
        {
          $("#idvazdok").val(data.id);
          $("#exdok").html(data.name);
          $("#valhajmdok").val(data.soni);
          $("#valhajm2dok").val(data.soni);
          $("#vazviratdok").modal("show");
        }
      });
    });

    $(document).on('keyup', "#vazvrathajm", function(){
      var a = $(this).val();
      var b = $("#valhajm2").val();
      $("#valhajm").val(b - a);
      var javob = $("#valhajm").val();
      if(javob < 0){
        toastr.error("Киймат коп киритилди");
      }
    });
    
    $(document).on('keyup', "#vazvrathajmdok", function(){
      var a = $(this).val();
      var b = $("#valhajm2dok").val();
      $("#valhajmdok").val(b - a);
      var javob = $("#valhajmdok").val();
      if(javob < 0){
        toastr.error("Киймат коп киритилди");
      }
    });

    function rowdata()
    {
      var id = $("#oydi").val();
      $.ajax({
        url:"{{ route('clents2aniq') }}",
        method:'GET',
        data:{
          id: id
        },
        dataType:'json',
        success:function(data)
        {
          $('#savdo').html(data.output);
          $("#clentname").val(data.clent.name);
          $("#tavarshtuk2").val(data.foo2.tavarshtuk);
          $("#shtuk2").val(data.foo2.shtuk);
          $("#foiz2").val(data.foo2.foiz);
          $("#itoge2").val(data.foo2.opshi);
        }
      });
    }

    function rowdatadok()
    {
      var id = $("#oydidok").val();
      $.ajax({
        url:"{{ route('clents2aniqdok') }}",
        method:'GET',
        data:{
          id: id
        },
        dataType:'json',
        success:function(data)
        {
          $('#savdodok').html(data.output);
          $("#clentnamedok").val(data.clent.name);
          $("#tavarshtuk2dok").val(data.foo2.tavarshtuk);
          $("#shtuk2dok").val(data.foo2.shtuk);
          $("#foiz2dok").val(data.foo2.foiz);
          $("#itoge2dok").val(data.foo2.opshi);
        }
      });
    }

    $(document).on('click', "#qaytar", function(event){
      event.preventDefault();
      var idvaz = $("#idvaz").val();
      var vazvrathajm = $("#vazvrathajm").val();
      var sabab = $("#sabab").val();
      let _token  = $('meta[name="csrf-token"]').attr('content');
      if(sabab){
        $.ajax({
          url:"{{ route('qaytar') }}",
          method:'POST',
          data:{
            id: idvaz,
            hajm: vazvrathajm,
            sabab: sabab,
            _token: _token
          },
          dataType:'json',
          success:function(data)
          {
            if (data.code == 0) {
              toastr.error(data.msg);
            }
            if (data.code == 200) {
              rowdata()
              toastr.success(data.msg);
              $("#vazvrathajm").val('');
              $("#vazvirat").modal("hide");
            }
          }
        });
      }else{
        toastr.error("Сабап корсатинг");
      }
    });

    $(document).on('click', "#qaytardok", function(event){
      event.preventDefault();
      var idvaz = $("#idvazdok").val();
      var vazvrathajm = $("#vazvrathajmdok").val();
      var sabab = $("#sababdok").val();
      let _token  = $('meta[name="csrf-token"]').attr('content');
      if(sabab){
        $.ajax({
          url:"{{ route('qaytardok') }}",
          method:'POST',
          data:{
            id: idvaz,
            hajm: vazvrathajm,
            sabab: sabab,
            _token: _token
          },
          dataType:'json',
          success:function(data)
          {
            if (data.code == 0) {
              toastr.error(data.msg);
            }
            if (data.code == 200) {
              rowdatadok()
              toastr.success(data.msg);
              $("#vazvrathajmdok").val('');
              $("#vazviratdok").modal("hide");
            }
          }
        });
      }else{
        toastr.error("Сабап корсатинг");
      }
    });

    $(document).on('change', "#tavar_id", function(){
    var tavar_id = $("#tavar_id").val();
    var date = $("#date").val();
    var date2 = $("#date2").val();
    var oydi = $("#oydi").val();
    let _token  = $('meta[name="csrf-token"]').attr('content');
      // if(oydi){
        $.ajax({
              url:"{{ route('clents3') }}",
              method:'POST',
              data:{
                id: oydi,
                tavar_id: tavar_id,
                date: date,
                date2: date2,
                _token: _token
              },
              dataType:'json',
              success:function(data)
              {
                $('#savdo').html(data.output);
                $('#dolg').html(data.output2);
                $("#tavarshtuk2").val(data.foo2.tavarshtuk);
                $("#shtuk2").val(data.foo2.shtuk);
                $("#foiz2").val(data.foo2.foiz);
                $("#itoge2").val(data.foo2.opshi);
              }
          });
      // }else{
      //   toastr.error("Выберите клент").fadeOut(1500);
      // }
    });

    $(document).on('change', "#date", function(){
    var tavar_id = $("#tavar_id").val();
    var date = $("#date").val();
    var date2 = $("#date2").val();
    var oydi = $("#oydi").val();
    let _token  = $('meta[name="csrf-token"]').attr('content');
    // if(oydi){
        $.ajax({
              url:"{{ route('clents3') }}",
              method:'POST',
              data:{
                id: oydi,
                tavar_id: tavar_id,
                date: date,
                date2: date2,
                _token: _token
              },
              dataType:'json',
              success:function(data)
              {
                $('#savdo').html(data.output);
                $('#dolg').html(data.output2);
                
                $("#tavarshtuk2").val(data.foo2.tavarshtuk);
                $("#shtuk2").val(data.foo2.shtuk);
                $("#foiz2").val(data.foo2.foiz);
                $("#itoge2").val(data.foo2.opshi);
              }
          });
      // }else{
      //   toastr.error("Выберите клент").fadeOut(1500);
      // }
    });

    $(document).on('change', "#date2", function(){
    var tavar_id = $("#tavar_id").val();
    var date = $("#date").val();
    var date2 = $("#date2").val();
    var oydi = $("#oydi").val();
    let _token  = $('meta[name="csrf-token"]').attr('content');
      // if(oydi){
        $.ajax({
              url:"{{ route('clents3') }}",
              method:'POST',
              data:{
                id: oydi,
                tavar_id: tavar_id,
                date: date,
                date2: date2,
                _token: _token
              },
              dataType:'json',
              success:function(data)
              {
                $('#savdo').html(data.output);
                $('#dolg').html(data.output2);
                
                $("#tavarshtuk2").val(data.foo2.tavarshtuk);
                $("#shtuk2").val(data.foo2.shtuk);
                $("#foiz2").val(data.foo2.foiz);
                $("#itoge2").val(data.foo2.opshi);
              }
          });
      // }else{
      //   toastr.error("Выберите клент").fadeOut(1500);
      // }
    });

    function fetch_customer_datadok(query = '')
    {
        $.ajax({
            url:"{{ route('clent_tipdok') }}",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $('#clent_tipdok').html(data.table_data);
            }
          })
        }
    fetch_customer_datadok();

    function fetch_customer_data123dok(query = '')
    {
      $.ajax({
        url:"{{ route('savdobirlamchidok') }}",
        method:'GET',
        data:{query:query},
        dataType:'json',
        success:function(data)
        {
          $('#savdobirlamchidok').html(data.table_data);
        }
      })
    }
    fetch_customer_data123dok();

    $(document).on('change', "#tavar_idsdok", function(){
    var tavar_id = $("#tavar_idsdok").val();
    var date = $("#datemdok").val();
    var date2 = $("#datem2dok").val();
    let _token  = $('meta[name="csrf-token"]').attr('content');
      // if(oydi){
        $.ajax({
              url:"{{ route('brlamclientdok') }}",
              method:'POST',
              data:{
                tavar_id: tavar_id,
                date: date,
                date2: date2,
                _token: _token
              },
              dataType:'json',
              success:function(data)
              {
                $('#savdobirlamchidok').html(data.output);
                // fetch_customer_data123();
                $("#tavarshtuk2sdok").val(data.foo2.tavarshtuk);
                $("#shtuk2sdok").val(data.foo2.shtuk);
                $("#itoge2sdok").val(data.foo2.opshi);
              }
          });
      // }else{
      //   toastr.error("Выберите клент").fadeOut(1500);
      // }
    });

    $(document).on('change', "#datemdok", function(){
    var tavar_id = $("#tavar_idsdok").val();
    var date = $("#datemdok").val();
    var date2 = $("#datem2dok").val();
    let _token  = $('meta[name="csrf-token"]').attr('content');
    // if(oydi){
        $.ajax({
              url:"{{ route('brlamclientdok') }}",
              method:'POST',
              data:{
                tavar_id: tavar_id,
                date: date,
                date2: date2,
                _token: _token
              },
              dataType:'json',
              success:function(data)
              {
                $('#savdobirlamchidok').html(data.output);
                // fetch_customer_data123();
                $("#tavarshtuk2sdok").val(data.foo2.tavarshtuk);
                $("#shtuk2sdok").val(data.foo2.shtuk);
                $("#itoge2sdok").val(data.foo2.opshi);
              }
          });
      // }else{
      //   toastr.error("Выберите клент").fadeOut(1500);
      // }
    });

    $(document).on('change', "#datem2dok", function(){
    var tavar_id = $("#tavar_idsdok").val();
    var date = $("#datemdok").val();
    var date2 = $("#datem2dok").val();
    let _token  = $('meta[name="csrf-token"]').attr('content');
      // if(oydi){
        $.ajax({
              url:"{{ route('brlamclientdok') }}",
              method:'POST',
              data:{
                tavar_id: tavar_id,
                date: date,
                date2: date2,
                _token: _token
              },
              dataType:'json',
              success:function(data)
              {
                $('#savdobirlamchidok').html(data.output);
                // fetch_customer_data123();
                $("#tavarshtuk2sdok").val(data.foo2.tavarshtuk);
                $("#shtuk2sdok").val(data.foo2.shtuk);
                $("#itoge2sdok").val(data.foo2.opshi);
              }
          });
      // }else{
      //   toastr.error("Выберите клент").fadeOut(1500);
      // }
    });

    $(document).on('click', "#datadok", function(){
    var id = $(this).data("id");
    $("#oydidok").val(id);
    $.ajax({
          url:"{{ route('clents2dok') }}",
          method:'GET',
          data:{
            id: id
          },
          dataType:'json',
          success:function(data)
          {
            $('#savdodok').html(data.output);
            $('#dolgdok').html(data.output2);
            fetch_customer_datadok();
            $("#clentnamedok").val(data.clent.name);
            $("#tavarshtuk2dok").val(data.foo2.tavarshtuk);
            $("#shtuk2dok").val(data.foo2.shtuk);
            $("#foiz2dok").val(data.foo2.foiz);
            $("#itoge2dok").val(data.foo2.opshi);
          }
      });
    });

    $(document).on('click', "#vseclentdok", function(event){
      event.preventDefault();
      let _token  = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
          url:"{{ route('vseclentdok') }}",
          method:'POST',
          data:{
            _token: _token
          },
          dataType:'json',
          success:function(data)
          {
            $('#savdodok').html(data.output);
            $('#dolgdok').html(data.output2);
            fetch_customer_datadok();
            $("#clentnamedok").val(data.clent);
            $("#tavarshtuk2dok").val(data.foo2.tavarshtuk);
            $("#shtuk2dok").val(data.foo2.shtuk);
            $("#foiz2dok").val(data.foo2.foiz);
            $("#itoge2dok").val(data.foo2.opshi);
          }
      });
    });

    $(document).on('change', "#tavar_iddok", function(){
    var tavar_id = $("#tavar_iddok").val();
    var date = $("#datedok").val();
    var date2 = $("#date2dok").val();
    var oydi = $("#oydidok").val();
    let _token  = $('meta[name="csrf-token"]').attr('content');
      // if(oydi){
        $.ajax({
              url:"{{ route('clents3dok') }}",
              method:'POST',
              data:{
                id: oydi,
                tavar_id: tavar_id,
                date: date,
                date2: date2,
                _token: _token
              },
              dataType:'json',
              success:function(data)
              {
                $('#savdodok').html(data.output);
                $('#dolgdok').html(data.output2);
                
                $("#tavarshtuk2dok").val(data.foo2.tavarshtuk);
                $("#shtuk2dok").val(data.foo2.shtuk);
                $("#foiz2dok").val(data.foo2.foiz);
                $("#itoge2dok").val(data.foo2.opshi);
              }
          });
      // }else{
      //   toastr.error("Выберите клент").fadeOut(1500);
      // }
    });

    $(document).on('change', "#datedok", function(){
    var tavar_id = $("#tavar_iddok").val();
    var date = $("#datedok").val();
    var date2 = $("#date2dok").val();
    var oydi = $("#oydidok").val();
    let _token  = $('meta[name="csrf-token"]').attr('content');
    // if(oydi){
        $.ajax({
              url:"{{ route('clents3dok') }}",
              method:'POST',
              data:{
                id: oydi,
                tavar_id: tavar_id,
                date: date,
                date2: date2,
                _token: _token
              },
              dataType:'json',
              success:function(data)
              {
                $('#savdodok').html(data.output);
                $('#dolgdok').html(data.output2);
                fetch_customer_datadok();
                $("#tavarshtuk2dok").val(data.foo2.tavarshtuk);
                $("#shtuk2dok").val(data.foo2.shtuk);
                $("#foiz2dok").val(data.foo2.foiz);
                $("#itoge2dok").val(data.foo2.opshi);
              }
          });
      // }else{
      //   toastr.error("Выберите клент").fadeOut(1500);
      // }
    });

    $(document).on('change', "#date2dok", function(){
    var tavar_id = $("#tavar_iddok").val();
    var date = $("#datedok").val();
    var date2 = $("#date2dok").val();
    var oydi = $("#oydidok").val();
    let _token  = $('meta[name="csrf-token"]').attr('content');
      // if(oydi){
        $.ajax({
              url:"{{ route('clents3dok') }}",
              method:'POST',
              data:{
                id: oydi,
                tavar_id: tavar_id,
                date: date,
                date2: date2,
                _token: _token
              },
              dataType:'json',
              success:function(data)
              {
                $('#savdodok').html(data.output);
                $('#dolgdok').html(data.output2);
                fetch_customer_datadok();
                $("#tavarshtuk2dok").val(data.foo2.tavarshtuk);
                $("#shtuk2dok").val(data.foo2.shtuk);
                $("#foiz2dok").val(data.foo2.foiz);
                $("#itoge2dok").val(data.foo2.opshi);
              }
          });
      // }else{
      //   toastr.error("Выберите клент").fadeOut(1500);
      // }
    });

  });

</script>

@endsection