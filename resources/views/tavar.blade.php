@extends('welcome')
@section('content')
@if ($brends->login == "Admin")
<div class="page-body button-page">
  <div class="row">
      <div class="col-sm-12">
          <div class="card">
              <div class="card-header">
                <div class="card-header-left">
                  <div class="col-10">
                    <div class="row">
                      <div class="col-3 mr-2">
                        <button type="button" class="btn btn-success m-0 p-1" data-bs-toggle="modal" onclick="addPost2()">
                          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                          </svg>
                          Создать
                        </button>                        
                      </div>
                      <div class="col-3 mx-2">
                        <a class="btn btn-success m-0 p-1 pr-2" href="#" onclick="event.preventDefault(); document.getElementById('ddr').submit();">
                          <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                            <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                          </svg>
                          Excel
                        </a>
                      </div>
                      <div class="col-3 ml-0">
                        <button class="btn btn-info p-1" id="iddr2">
                          <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                          </svg>
                          Import
                        </button>
                      </div>
                    </div>
                  </div>
                    <form action="{{ route('exports3') }}" method="GET" id="ddr">
                    </form>
                  </div>
                  <div class="table-responsive">
                    <table class="tab table-hover" id="laravel_crud">
                        <thead>
                            <tr>
                              <th>Тип</th>
                              <th>Управление</th>
                            </tr>
                        </thead>
                        <tbody id="tbody2">
                      
                        </tbody>
                    </table>
                  </div>               
                </div>
          </div>
      </div>
  </div>
</div>
@else
<div class="page-body button-page">
  <div class="row">
      <div class="col-sm-12">
          <div class="card">
              <div class="card-header">
                <div class="card-header-left">
                  <div class="col-10">
                    <div class="row">
                      <div class="col-3 mr-2">
                        <button type="button" class="btn btn-success m-0 p-1" data-bs-toggle="modal" onclick="addPost2dok()">
                          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                          </svg>
                          Создать
                        </button>                        
                      </div>
                      <div class="col-3 mx-2">
                        <a class="btn btn-success m-0 p-1 pr-2" href="#" onclick="event.preventDefault(); document.getElementById('ddrdok').submit();">
                          <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                            <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                          </svg>
                          Excel
                        </a>
                      </div>
                      <div class="col-3 ml-0">
                        <button class="btn btn-info p-1" id="iddr2dok">
                          <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                          </svg>
                          Import
                        </button>
                      </div>
                    </div>
                  </div>
                    <form action="{{ route('exports3dok') }}" method="GET" id="ddrdok">
                    </form>
                  </div>
                  <div class="table-responsive">
                    <table class="tab table-hover" id="laravel_cruddok">
                        <thead>
                            <tr>
                              <th>Тип</th>
                              <th>Управление</th>
                            </tr>
                        </thead>
                        <tbody id="tbody2dok">
                      
                        </tbody>
                    </table>
                  </div>               
                </div>
          </div>
      </div>
  </div>
</div>
@endif

<div class="modal fade" id="post-modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Товар кошиш</h5>
        <a href="javascript:void(0)" id="add" class="btn btn-success m-0 p-1">
          <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
          </svg>
          Добавыт
        </a>
      </div>
      <div class="modal-body">
        <form id="userForm2" action="{{ route('store2') }}" method="POST">
            @csrf
            <table class="col-12" id="dynamicTable">

            </table>             
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Назад</button>
        <button type="submit" class="btn btn-primary" id="save">Сохранить</button>
      </div>
    </form>
    </div>
  </div>
</div>

<div class="modal fade" id="exxx" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('import3') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <input type="file" name="import" class="form-control">
        </div>
        <div class="text-center pb-4">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="post-modal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Товар янгидаш</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="userForm3" action="{{ route('updateer2') }}" method="POST">
            @csrf
            <input type="hidden" name="id" id="id2">
            <input type="text" name="name" class="form-control" id="name2">
            <span class="text-danger error-text name_error"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Назад</button>
        <button type="submit" class="btn btn-primary">Сохранить</button>
      </div>
    </form>
    </div>
  </div>
</div>

<div class="modal fade" id="post-modal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Товарни очириш</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <input type="hidden" name="id4" id="id4">
        </div>
        <div class="text-center pb-4">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Нет</button>
            <button type="submit" id="dele" class="btn btn-success">Да</button>
        </div>
    </div>
  </div>
</div>


<div class="modal fade" id="post-modal2dok" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Товар кошиш</h5>
        <a href="javascript:void(0)" id="adddok" class="btn btn-success m-0 p-1">
          <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
          </svg>
          Добавыт
        </a>
      </div>
      <div class="modal-body">
        <form id="userForm2dok" action="{{ route('store2dok') }}" method="POST">
            @csrf
            <table class="col-12" id="dynamicTabledok">

            </table>             
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Назад</button>
        <button type="submit" class="btn btn-primary" id="savedok">Сохранить</button>
      </div>
    </form>
    </div>
  </div>
</div>

<div class="modal fade" id="exxxdok" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('import3dok') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <input type="file" name="import" class="form-control">
        </div>
        <div class="text-center pb-4">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="post-modal3dok" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Товар янгидаш</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="userForm3dok" action="{{ route('updateer2dok') }}" method="POST">
            @csrf
            <input type="hidden" name="id" id="id2dok">
            <input type="text" name="name" class="form-control" id="name2dok">
            <span class="text-danger error-text name_error"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Назад</button>
        <button type="submit" class="btn btn-primary">Сохранить</button>
      </div>
    </form>
    </div>
  </div>
</div>

<div class="modal fade" id="post-modal4dok" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Товарни очириш</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <input type="hidden" name="id4" id="id4dok">
        </div>
        <div class="text-center pb-4">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Нет</button>
            <button type="submit" id="deledok" class="btn btn-success">Да</button>
        </div>
    </div>
  </div>
</div>
  <script>
  $( function() {
    $( "#tbody2" ).selectable();
  } );
  
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    
    $("#iddr2").on("click", function(){
      $("#exxx").modal('show');
    });

    var i = 0;
    $("#add").click(function(){            
            ++i;
        $("#dynamicTable").append('<tr><td><input type="text" name="addmore['+i+'][name]" id="" class="form-control col-10" placeholder="Тавар номи"></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
    }); 
  
    $(document).on('click', '.remove-tr', function(){
        $(this).parents('tr').remove();
        --i;               
    });

    function addPost2() {
      $("#id").val('');
      $('#post-modal2').modal('show');
    }

    $(document).ready(function(){
      fetch_customer_data();
      function fetch_customer_data(query = '')
      {
          $.ajax({
              url:"{{ route('tavar_live') }}",
              method:'GET',
              data:{query:query},
              dataType:'json',
              success:function(data)
              {
                  $('#tbody2').html(data.table_data);
              
              }
          })
      }
      $(document).on('click', '#save', function(){
          var query = $(this).val();
          fetch_customer_data(query);
      });
    });
  
  function editPost2(id) {
    let _url = `shower2/${id}`;
    $('#idError').text('');
    $('#nameError').text('');
    
    $.ajax({
      url: _url,
      type: "GET",
      success: function(response) {
          if(response) {
            $("#id2").val(response.id);
            $("#name2").val(response.name);
            $('#post-modal3').modal('show');
          }
      }
    });
  }

  $(document).ready(function(){
      fetch_customer_data();
      function fetch_customer_data(query = '')
      {
          $.ajax({
              url:"{{ route('tavar_live') }}",
              method:'GET',
              data:{query:query},
              dataType:'json',
              success:function(data)
              {
                  $('#tbody2').html(data.table_data);
              
              }
          })
      }
  
      $('#userForm2').on('submit', function(e) {
        e.preventDefault();
        var form = this;
        $.ajax({
          url:$(form).attr('action'),
          method:$(form).attr('method'),
          data:new FormData(form),
          processData:false,
          dataType:'json',
          contentType:false,
          beforeSend:function(){
            $(form).find('span.error-text').text('');
          },
          success:function(data){
            if(data.code == 200){
              $(form)[0].reset();
              fetch_customer_data();
              $('#name').val('');
              $('#post-modal2').modal('hide');
              toastr.success(data.msg);
            }
            if(data.code == 0){
              $.each(data.error, function(prefix, val){
                $(form).find('span.'+prefix+'_error').text(val[0]);
              });
              toastr.error(data.msg);
            }
            if(data.code == 201){
              toastr.success(data.msg);
              fetch_customer_data();
            }
           
          }
        });
      });
      
      $('#userForm3').on('submit', function(e) {
        e.preventDefault();
        var form = this;
        $.ajax({
          url:$(form).attr('action'),
          method:$(form).attr('method'),
          data:new FormData(form),
          processData:false,
          dataType:'json',
          contentType:false,
          beforeSend:function(){
            $(form).find('span.error-text').text('');
          },
          success:function(data){
            if(data.code == 200){
              $(form)[0].reset();
              fetch_customer_data();
              $('#name').val('');
              $('#post-modal3').modal('hide');
              toastr.success(data.msg);
            }
            if(data.code == 0){
              $.each(data.error, function(prefix, val){
                $(form).find('span.'+prefix+'_error').text(val[0]);
              });
              toastr.error(data.msg);
            }
            if(data.code == 201){
              toastr.success(data.msg);
              $('#post-modal3').modal('hide');
              fetch_customer_data();
            }
           
          }
        });
      });

       $('#dele').on('click', function(){
        var id = $("#id4").val();
        let _url = `deleteer2/${id}`;
        let _token   = $('meta[name="csrf-token"]').attr('content');    
        $.ajax({
          url: _url,
          type: 'POST',
          data: {
            _token: _token
          },
          success: function(data) {
            fetch_customer_data();
            $('#post-modal4').modal('hide');
            toastr.success(data.msg);
          }
        });
      });      
    });

    function deletePost2(id) {
        $("#id4").val(id);
        $('#post-modal4').modal('show');
      }

  $( function() {
    $( "#tbody2dok" ).selectable();
  } );
  
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    
    $("#iddr2dok").on("click", function(){
      $("#exxxdok").modal('show');
    });

    var p = 0;
    $("#adddok").click(function(){            
            ++p;
        $("#dynamicTabledok").append('<tr><td><input type="text" name="addmore['+p+'][name]" id="" class="form-control col-10" placeholder="Тавар номи"></td><td><button type="button" class="btn btn-danger remove-trdok">Remove</button></td></tr>');
    }); 
  
    $(document).on('click', '.remove-trdok', function(){
        $(this).parents('tr').remove();
        --p;               
    });

    function addPost2dok() {
      $("#id").val('');
      $('#post-modal2dok').modal('show');
    }

    $(document).ready(function(){
      fetch_customer_datadok();
      function fetch_customer_datadok(query = '')
      {
          $.ajax({
              url:"{{ route('tavar_livedok') }}",
              method:'GET',
              data:{query:query},
              dataType:'json',
              success:function(data)
              {
                  $('#tbody2dok').html(data.table_data);
              
              }
          })
      }
      $(document).on('click', '#savedok', function(){
          var query = $(this).val();
          fetch_customer_datadok(query);
      });
    });
  
  function editPost2dok(id) {
    let _url = `shower2dok/${id}`;
    $('#idError').text('');
    $('#nameError').text('');
    
    $.ajax({
      url: _url,
      type: "GET",
      success: function(response) {
          if(response) {
            $("#id2dok").val(response.id);
            $("#name2dok").val(response.name);
            $('#post-modal3dok').modal('show');
          }
      }
    });
  }

  $(document).ready(function(){
      fetch_customer_datadok();
      function fetch_customer_datadok(query = '')
      {
          $.ajax({
              url:"{{ route('tavar_livedok') }}",
              method:'GET',
              data:{query:query},
              dataType:'json',
              success:function(data)
              {
                  $('#tbody2dok').html(data.table_data);
              
              }
          })
      }
  
      $('#userForm2dok').on('submit', function(e) {
        e.preventDefault();
        var form = this;
        $.ajax({
          url:$(form).attr('action'),
          method:$(form).attr('method'),
          data:new FormData(form),
          processData:false,
          dataType:'json',
          contentType:false,
          beforeSend:function(){
            $(form).find('span.error-text').text('');
          },
          success:function(data){
            if(data.code == 200){
              $(form)[0].reset();
              fetch_customer_datadok();
              $('#namedok').val('');
              $('#post-modal2dok').modal('hide');
              toastr.success(data.msg);
            }
            if(data.code == 0){
              $.each(data.error, function(prefix, val){
                $(form).find('span.'+prefix+'_error').text(val[0]);
              });
              toastr.error(data.msg);
            }
            if(data.code == 201){
              toastr.success(data.msg);
              fetch_customer_datadok();
            }
           
          }
        });
      });
      
      $('#userForm3dok').on('submit', function(e) {
        e.preventDefault();
        var form = this;
        $.ajax({
          url:$(form).attr('action'),
          method:$(form).attr('method'),
          data:new FormData(form),
          processData:false,
          dataType:'json',
          contentType:false,
          beforeSend:function(){
            $(form).find('span.error-text').text('');
          },
          success:function(data){
            if(data.code == 200){
              $(form)[0].reset();
              fetch_customer_datadok();
              $('#namedok').val('');
              $('#post-modal3dok').modal('hide');
              toastr.success(data.msg);
            }
            if(data.code == 0){
              $.each(data.error, function(prefix, val){
                $(form).find('span.'+prefix+'_error').text(val[0]);
              });
              toastr.error(data.msg);
            }
            if(data.code == 201){
              toastr.success(data.msg);
              $('#post-modal3dok').modal('hide');
              fetch_customer_datadok();
            }
           
          }
        });
      });

       $('#deledok').on('click', function(){
        var id = $("#id4dok").val();
        let _url = `deleteer2dok/${id}`;
        let _token   = $('meta[name="csrf-token"]').attr('content');    
        $.ajax({
          url: _url,
          type: 'POST',
          data: {
            _token: _token
          },
          success: function(data) {
            fetch_customer_datadok();
            $('#post-modal4dok').modal('hide');
            toastr.success(data.msg);
          }
        });
      });      
    });

    function deletePost2dok(id) {
        $("#id4dok").val(id);
        $('#post-modal4dok').modal('show');
      }
  </script>
@endsection