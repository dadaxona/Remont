@extends('welcome')
@section('content')
@if ($brends->count == "1")
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
                      <form action="{{ route('exports7') }}" method="GET" id="ddr">
                      </form>
                    </div>
                    <div class="table-responsive">
                      <table class="tab table-hover">
                          <thead>
                              <tr>
                                <th>Расход</th>
                                <th>Кайер</th>
                                <th>Сабап</th>
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
                      <form action="{{ route('exports7dok') }}" method="GET" id="ddrdok">
                      </form>
                    </div>
                    <div class="table-responsive">
                      <table class="tab table-hover">
                          <thead>
                              <tr>
                                <th>Расход</th>
                                <th>Кайер</th>
                                <th>Сабап</th>
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
        </div>
        <div class="modal-body">
          <form id="userForm2" action="{{ route('postrasxod') }}" method="POST">
              @csrf
              <input type="hidden" name="id" id="id">
              <div class="mb-3">
                <label for="message-text" class="col-form-label">Summa</label>
                <input type="text" class="form-control" name="rasxod"  id="rasxod">
                <span class="text-danger error-text rasxod_error"></span>
              </div>
              <div class="mb-3">
                <label for="message-text" class="col-form-label">Кайерга</label>
                <input type="text" class="form-control" name="qayer"  id="qayer">
                <span class="text-danger error-text qayer_error"></span>
              </div>
              <div class="mb-3">
                <label for="message-text" class="col-form-label">Sabap</label>
                <input type="text" class="form-control" name="sabap"  id="sabap">
                <span class="text-danger error-text sabap_error"></span>
              </div>                      
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Назад</button>
          <button type="submit" class="btn btn-primary">Сохранить</button>
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
        <form action="{{ route('import7') }}" method="POST" enctype="multipart/form-data">
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
        </div>
        <div class="modal-body">
          <form id="userForm2dok" action="{{ route('postrasxoddok') }}" method="POST">
              @csrf
              <input type="hidden" name="id" id="iddok">
              <div class="mb-3">
                <label for="message-text" class="col-form-label">Summa</label>
                <input type="text" class="form-control" name="rasxod"  id="rasxoddok">
                <span class="text-danger error-text rasxod_error"></span>
              </div>
              <div class="mb-3">
                <label for="message-text" class="col-form-label">Кайерга</label>
                <input type="text" class="form-control" name="qayer"  id="qayerdok">
                <span class="text-danger error-text qayer_error"></span>
              </div>
              <div class="mb-3">
                <label for="message-text" class="col-form-label">Sabap</label>
                <input type="text" class="form-control" name="sabap"  id="sabapdok">
                <span class="text-danger error-text sabap_error"></span>
              </div>                      
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Назад</button>
          <button type="submit" class="btn btn-primary">Сохранить</button>
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
        <form action="{{ route('import7dok') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <input type="file" name="importdok" class="form-control">
          </div>
          <div class="text-center pb-4">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Save</button>
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
    function addPost2() {
      $("#userForm2")[0].reset();
      $('#post-modal2').modal('show');
    }

    $("#iddr2").on("click", function(){
      $("#exxx").modal('show');
    });

    function tbody2(){
        $.ajax({
            url: "getrasxod",
            method: "GET",
            dataType:'json',
            success:function(data){
            let rows =  '';
            data.forEach(room => {
                rows += `
                <tr>
                    <td>${room.rasxod}</td>
                    <td>${room.qayer}</td>
                    <td>${room.sabap}</td>
                    <td>
                      <button class="btn-primary m-0 p-0 pl-2 pr-2" id="ed" data-id="${room.id}" data-rasxod="${room.rasxod}" data-qayer="${room.qayer}" data-sabap="${room.sabap}">
                        Edit
                      </button>
                      <button onclick="deletePost2(${room.id})" class="btn-danger m-0 p-0 pl-2 pr-2 mx-2" >
                         Delete
                        </button>
                    </td>
                </tr>`;
                });
            $("#tbody2").html(rows);
            }
        });
    }
    tbody2();

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
          tbody2();
          $('#post-modal2').modal('hide');
          toastr.success(data.msg);
        }
        if(data.code == 0){
          $.each(data.error, function(prefix, val){
            $(form).find('span.'+prefix+'_error').text(val[0]);
          });
          toastr.error(data.msg);
        }
      }
    });
  });

  $(document).on("click", "#ed", function () {
    $("#id").val($(this).data("id"));
    $("#rasxod").val($(this).data("rasxod"));
    $("#qayer").val($(this).data("qayer"));
    $("#sabap").val($(this).data("sabap"));
    $("#post-modal2").modal("show");
  });

  function deletePost2(id) {
    $("#id4").val(id);
    $('#post-modal4').modal('show');
  }
  $('#dele').on('click', function(){
    var id = $("#id4").val();
    let _url = `deletrasxod/${id}`;
    let _token   = $('meta[name="csrf-token"]').attr('content');    
    $.ajax({
      url: _url,
      type: 'POST',
      data: {
        _token: _token
      },
      success: function(data) {
        tbody2();
        $('#post-modal4').modal('hide');
        toastr.success(data.msg);
      }
    });
  }); 


  function addPost2dok() {
      $("#userForm2dok")[0].reset();
      $('#post-modal2dok').modal('show');
    }

    $("#iddr2dok").on("click", function(){
      $("#exxxdok").modal('show');
    });

    function tbody2dok(){
        $.ajax({
            url: "getrasxoddok",
            method: "GET",
            dataType:'json',
            success:function(data){
            let rows =  '';
            data.forEach(room => {
                rows += `
                <tr>
                    <td>${room.rasxod}</td>
                    <td>${room.qayer}</td>
                    <td>${room.sabap}</td>
                    <td>
                      <button class="btn-primary m-0 p-0 pl-2 pr-2" id="eddok" data-id="${room.id}" data-rasxod="${room.rasxod}" data-qayer="${room.qayer}" data-sabap="${room.sabap}">
                        Edit
                      </button>
                      <button onclick="deletePost2dok(${room.id})" class="btn-danger m-0 p-0 pl-2 pr-2 mx-2" >
                         Delete
                        </button>
                    </td>
                </tr>`;
                });
            $("#tbody2dok").html(rows);
            }
        });
    }
    tbody2dok();

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
          tbody2dok();
          $('#post-modal2dok').modal('hide');
          toastr.success(data.msg);
        }
        if(data.code == 0){
          $.each(data.error, function(prefix, val){
            $(form).find('span.'+prefix+'_error').text(val[0]);
          });
          toastr.error(data.msg);
        }
      }
    });
  });

  $(document).on("click", "#eddok", function () {
    $("#iddok").val($(this).data("id"));
    $("#rasxoddok").val($(this).data("rasxod"));
    $("#qayerdok").val($(this).data("qayer"));
    $("#sabapdok").val($(this).data("sabap"));
    $("#post-modal2dok").modal("show");
  });

  function deletePost2dok(id) {
    $("#id4dok").val(id);
    $('#post-modal4dok').modal('show');
  }
  $('#deledok').on('click', function(){
    var id = $("#id4dok").val();
    let _url = `deletrasxoddok/${id}`;
    let _token   = $('meta[name="csrf-token"]').attr('content');    
    $.ajax({
      url: _url,
      type: 'POST',
      data: {
        _token: _token
      },
      success: function(data) {
        tbody2dok();
        $('#post-modal4dok').modal('hide');
        toastr.success(data.msg);
      }
    });
  }); 
</script>
@endsection