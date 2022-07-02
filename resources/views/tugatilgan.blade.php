@extends('welcome')
@section('content')
<section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-success card-outline">
          <div class="card-header">
         <div class="row">
            <div class="col-2">
              <input type="search" name="search" id="search" class="form-control" placeholder="Search">
            </div>
            <div class="col-2">
              <select name="usta" id="usta" class="form-control">
                <option value="">--Тип--</option>
                @foreach ($usta as $item)
                  <option value="{{ $item->name }}">{{ $item->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-3 d-flex">
              <input class="form-control mx-2" style="width: 37%" type="date" id="date" name="date">
              <input class="form-control" style="width: 37%" type="date" id="date2" name="date2">
            </div>
            <div class="col-1">
              <input type="text" id="shtuk2" class="form-control" placeholder="Обйом">  
            </div>
            <div class="col-2">
              <input type="text" id="itoge2" class="form-control" placeholder="Итого сумма">  
            </div>
        @if ($brends->login == "Admin")
          <div class="col-1">             
            <button id="import" class="btn btn-primary">Import</button>
          </div>
          <div class="col-1">
            <form action="{{ route('exports') }}" method="GET">
              @csrf
              <button type="submit" class="btn btn-success">Export</button>
            </form>
          </div>
        @else
          <div class="col-1">             
            <button class="btn btn-dark">Import</button>
          </div>
          <div class="col-1">           
              <button class="btn btn-dark">Export</button>
          </div>
        @endif
          </div>
        
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="table-responsive mailbox-messages">
                <div class="extr22 scrolll2">
                    <div class="rtytt22">
                    <table class="tab table-hover table-striped">
                      <thead>
                        <tr>
                          <th>Sana</th>
                          <th>Name</th>
                          <th>Tel</th>
                          <th>Texnika</th>
                          <th>Muammo</th>
                          <th>Xulosa</th>
                          <th>Masul usta</th>
                          <th>Summa</th>
                        </tr>
                      </thead>
                      <tbody id="tbody">

                      </tbody>
                      </table>
                </div>
                </div>
              
              <!-- /.table -->
            </div>
            <!-- /.mail-box-messages -->
          </div>
          <!-- /.card-body -->
     
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <div class="modal fade" id="tavar2delete2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <form action="{{ route('imports') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
              <input type="file" name="import" class="form-control" id="import">
            </div>
            <div class="text-center pb-4">
                <button type="submit" class="btn btn-success">Import</button>
            </div>
          </form>
      </div>
    </div>
  </div>
  <script>

$(document).on('click', '#import', function(){
  $('#tavar2delete2').modal('show');
});
    $(document).ready(function(){
      fetch_customer_data();
      function fetch_customer_data(query = '')
      {
          $.ajax({
              url:"{{ route('mijjozz') }}",
              method:'GET',
              data:{query:query},
              dataType:'json',
              success:function(data)
              {
                $('#tbody').html(data.table_data);
              }
          });
      }
      $(document).on('keyup', '#search', function(){
            var query = $(this).val();
            fetch_customer_data(query);
        });
        
        $(document).on('change', '#usta', function(){
            var usta = $("#usta").val();
            $.ajax({
              url:"{{ route('mijjozz2') }}",
              method:'GET',
              data:{usta:usta},
              dataType:'json',
              success:function(data)
              {
                $("#shtuk2").val(data.foo2.tavarshtuk);
                $("#itoge2").val(data.foo2.opshi);
                $('#tbody').html(data.table_data);
              }
          });
        });

        $(document).on('change', '#date', function(){
          var usta = $("#usta").val();
            var date = $("#date").val();
            var date2 = $("#date2").val();
            $.ajax({
              url:"{{ route('mijjozz3') }}",
              method:'GET',
              data:{
                usta:usta,
                date:date,
                date2:date2
              },
              dataType:'json',
              success:function(data)
              {
                $("#shtuk2").val(data.foo2.tavarshtuk);
                $("#itoge2").val(data.foo2.opshi);
                $('#tbody').html(data.table_data);
              }
          });
        });

        $(document).on('change', '#date2', function(){
          var usta = $("#usta").val();
            var date = $("#date").val();
            var date2 = $("#date2").val();
            $.ajax({
              url:"{{ route('mijjozz3') }}",
              method:'GET',
              data:{
                usta:usta,
                date:date,
                date2:date2
              },
              dataType:'json',
              success:function(data)
              {
                $("#shtuk2").val(data.foo2.tavarshtuk);
                $("#itoge2").val(data.foo2.opshi);
                $('#tbody').html(data.table_data);
              }
          });
        });
    
    });


  </script>
@endsection