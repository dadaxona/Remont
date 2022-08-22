@extends('welcome')
@section('content')
<style>
  #otkaz{
    margin-left: 44%;
  }
</style>
@if ($brends->count == "1" || $brends->count == "3" || $brends->count == "4")
<div class="card p-0">
  <div class="card-header">
          <div class="col-10">
            <div class="row">
              <div class="col-5 mr-2">
                <button type="button" class="btn btn-primary" onclick="addPost()">Клиент Яратиш</button>                      
                <a class="btn btn-success" href="#" onclick="event.preventDefault(); document.getElementById('ddr').submit();">
                  <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                    <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                  </svg>
                  Excel
                </a>
                <button class="btn btn-info" id="iddr2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                  </svg>
                  Import
                </button>
            </div>
          </div>
        </div>
          <form action="{{ route('exports5') }}" method="GET" id="ddr">
          </form>
        <div class="row">
          {{-- <div class="col-12"> --}}
            <table class="tab table-hover" id="laravel_crud">
              <thead>
              <tr>
                  <th>Исм</th>
                  <th>Телефон</th>
                  <th>Телеграм Чат Ид</th>
                  <th>Фирма Номи</th>
                  <th>Фирма ИНН</th>
                  <th>Управление и Баланс</th>
              </tr>
              </thead>
              <tbody id="clent">

              </tbody>               
          </table>
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
        <form action="{{ route('import5') }}" method="POST" enctype="multipart/form-data">
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

<div class="modal fade" id="post-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Клиент Яратиш</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="userForm" action="{{ route('storead') }}" method="POST">
            @csrf
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Клиент номи</label>
            <input type="text" class="form-control" name="name">
            <span class="text-danger error-text name_error"></span>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Телефон</label>
            <input type="number" class="form-control" name="tel">
            <span class="text-danger error-text tel_error"></span>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Телеграм Чат Ид</label>
            <input type="text" class="form-control" name="chatid">
            <span class="text-danger error-text chatid_error"></span>
          </div>
          <div class="mb-3">
              <label for="message-text" class="col-form-label">Фирма номи</label>
              <input type="text" class="form-control" name="firma">
              <span class="text-danger error-text firma_error"></span>
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Фирма ИНН</label>
              <input type="text" class="form-control" name="inn">
              <span class="text-danger error-text inn_error"></span>
            </div>
            <input type="hidden" name="summa" value="0">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Назад</button>
        <button type="submit" class="btn btn-primary">Сохранить</button>
      </div>
    </form>
    </div>
  </div>
</div>

<div class="modal fade" id="post-modaled" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Клиент Яратиш</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="userForm2" action="{{ route('storead') }}" method="POST">
            @csrf
            <input type="hidden" name="id" id="id">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Клиент номи</label>
            <input type="text" class="form-control" name="name" id="name">
            <span class="text-danger error-text name_error"></span>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Телефон</label>
            <input type="number" class="form-control" name="tel"  id="tel">
            <span class="text-danger error-text tel_error"></span>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Телеграм Чат Ид</label>
            <input type="number" class="form-control" name="chatid"  id="chatid">
            <span class="text-danger error-text chatid_error"></span>
          </div>
          <div class="mb-3">
              <label for="message-text" class="col-form-label">Фирма номи</label>
              <input type="text" class="form-control" name="firma" id="firma">
              <span class="text-danger error-text firma_error"></span>
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Фирма ИНН</label>
              <input type="text" class="form-control" name="inn" id="inn">
              <span class="text-danger error-text inn_error"></span>
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Сумма</label>
              <input type="text" class="form-control" name="summa" id="summa">
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

<div class="modal fade" id="post-modal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Товарни очириш</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <input type="hidden" name="id5" id="id5">
        </div>
        <div class="text-center pb-4">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Нет</button>
            <button type="submit" onclick="dele2()" class="btn btn-success">Да</button>
        </div>
    </div>
  </div>
</div>
@else

<div class="card p-0">
  <div class="card-header">
          <button type="button" class="btn btn-primary" onclick="addPostdok()">Клиент Яратиш</button>
          <a class="btn btn-success" href="#" onclick="event.preventDefault(); document.getElementById('ddrdok').submit();">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
              <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
              <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
            </svg>
            Excel
          </a>
          <button class="btn btn-info" id="iddr2dok">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
              <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
              <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
            </svg>
            Import
          </button>
          <form action="{{ route('exports5dok') }}" method="GET" id="ddrdok">
          </form>
        <div class="row">
          {{-- <div class="col-12"> --}}
            <table class="tab table-hover" id="laravel_crud">
              <thead>
              <tr>
                  <th>Исм</th>
                  <th>Телефон</th>
                  <th>Чат Ид</th>
                  <th>Фирма Номи</th>
                  <th>Фирма ИНН</th>
                  <th>Управление и Баланс</th>
              </tr>
              </thead>
              <tbody id="clentdok">

              </tbody>               
          </table>
        </div>
      </div>
  </div>
  
<div class="modal fade" id="post-modaldok" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Клиент Яратиш</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="userFormdok" action="{{ route('storedok') }}" method="POST">
            @csrf
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Клиент номи</label>
            <input type="text" class="form-control" name="name">
            <span class="text-danger error-text name_error"></span>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Телефон</label>
            <input type="number" class="form-control" name="tel">
            <span class="text-danger error-text tel_error"></span>
          </div>
          <div class="mb-3">
              <label for="message-text" class="col-form-label">Фирма номи</label>
              <input type="text" class="form-control" name="firma">
              <span class="text-danger error-text firma_error"></span>
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Фирма ИНН</label>
              <input type="text" class="form-control" name="inn">
              <span class="text-danger error-text inn_error"></span>
            </div>
            <input type="hidden" name="summa" value="0">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Назад</button>
        <button type="submit" class="btn btn-primary">Сохранить</button>
      </div>
    </form>
    </div>
  </div>
</div>

<div class="modal fade" id="post-modaldok2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Клиент Яратиш</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="userFormdok2" action="{{ route('storedok') }}" method="POST">
            @csrf
            <input type="hidden" name="id" id="iddok">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Клиент номи</label>
            <input type="text" class="form-control" name="name" id="namedok">
            <span class="text-danger error-text name_error"></span>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Телефон</label>
            <input type="number" class="form-control" name="tel"  id="teldok">
            <span class="text-danger error-text tel_error"></span>
          </div>
          <div class="mb-3">
              <label for="message-text" class="col-form-label">Фирма номи</label>
              <input type="text" class="form-control" name="firma" id="firmadok">
              <span class="text-danger error-text firma_error"></span>
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Фирма ИНН</label>
              <input type="text" class="form-control" name="inn" id="inndok">
              <span class="text-danger error-text inn_error"></span>
            </div>   
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Сумма</label>
              <input type="text" class="form-control" name="summa" id="summadok">
              <span class="text-danger error-text summa_error"></span>
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

<div class="modal fade" id="post-modal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Товарни очириш</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <input type="hidden" name="id5" id="id5dok">
        </div>
        <div class="text-center pb-4">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Нет</button>
            <button type="submit" onclick="dele2dok()" class="btn btn-success">Да</button>
        </div>
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
      <form action="{{ route('import5dok') }}" method="POST" enctype="multipart/form-data">
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
@endif

<div class="modal fade" id="toluv" tabindex="-1" aria-labelledby="exaswer" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exaswer">Тулов килиш</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <input type="hidden" id="t_id">
          <input type="hidden" id="t_id2">
          <input type="hidden" id="ka">
          <input type="text" class="form-control" id="karzstol" disabled>
          <input type="hidden" id="karzstolqosh">
          <button class="btn btn-primary mt-2 mb-2" id="otkaz">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
            </svg>
          </button>
          <input type="text" class="form-control" id="karzstol2" placeholder="Туловни суммасини">
          <div id="htm"></div>
        </div>
        <div class="text-center pb-4">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Нет</button>
            <button type="submit" id="aaa" class="btn btn-success">Да</button>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="toluvdok" tabindex="-1" aria-labelledby="exaswer" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exaswer">Тулов килиш</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <input type="hidden" id="t_iddok">
          <input type="hidden" id="t_id2dok">
          <input type="hidden" id="kadok">
          <input type="text" class="form-control" id="karzstoldok" disabled>
          <input type="hidden" id="karzstolqoshdok">
          <button class="btn btn-primary mt-2 mb-2" id="otkazdok">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
            </svg>
          </button>
          <input type="text" class="form-control" id="karzstol2dok" placeholder="Туловни суммасини">
          <div id="htmdok"></div>
        </div>
        <div class="text-center pb-4">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Нет</button>
            <button type="submit" id="aaadok" class="btn btn-success">Да</button>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="fgfgfgfg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Баланс</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="Hendl" action="{{ route('aloxida') }}" method="POST">
        @csrf
        <input type="hidden" name="oydi" id="oydi">
        <div class="modal-body">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Баланс</label>
            <input type="text" name="summa" class="form-control" id="summa">
            <span class="text-danger error-text summa_error"></span>
          </div>                       
        </div>
        <div class="text-center pb-4">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="fgfgfgfgdok" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Баланс</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="Hendldok" action="{{ route('aloxidadok') }}" method="POST">
        @csrf
        <input type="hidden" name="oydi" id="oydidok">
        <div class="modal-body">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Баланс</label>
            <input type="text" name="summa" class="form-control" id="summadok">
            <span class="text-danger error-text summa_error"></span>
          </div>                       
        </div>
        <div class="text-center pb-4">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  $( function() {
    $( "#clent" ).selectable();
  });
    
  $("#iddr2").on("click", function(){
    $("#exxx").modal('show');
  });
  $("#iddr2dok").on("click", function(){
    $("#exxxdok").modal('show');
  });
  
  function tolov(id) {
    $.ajax({
      url: "{{ route('tidtolov') }}",
      type: "GET",
      data:{
        id: id
      },
      success: function(response) {
        $("#t_id2").val(response.id);
        $("#t_id").val(response.user_id);
        $("#ka").val(response.karzs);
        $("#karzstol").val(response.karzs);
        $("#karzstol2").val('');
        $('#toluv').modal('show');
      }
    });
  }

  $("#otkaz").on("click", function(){
    var ka = $("#ka").val();
    $("#karzstol2").val(ka);
    $("#karzstol").val(0);
  });

  $(document).on("keyup", "#karzstol2", function(){
    var data = $(this).val();
    var ka = $("#ka").val(); 
    var a = ka - data;
    $("#karzstol").val(a);
    $("#karzstolqosh").val(a);
    var fer = $("#karzstol").val();
    var kare = $("#karzstol2").val();
    if(fer > 0){
      if(kare == ''){
        $("#htm").html('');
      }else{
        var ht = '<input type="date" class="form-control mt-4" id="ddddate">';
        $("#htm").html(ht);
      }
    }else{
      $("#htm").html('');
    }
  });

  $("#aaa").on("click", function(){
    let _token   = $('meta[name="csrf-token"]').attr('content');
    var id = $("#t_id").val();
    var t_id2 = $("#t_id2").val();
    var karzs = $("#karzstolqosh").val();
    var karzs2 = $("#karzstol2").val();
    var datesrok = $("#ddddate").val();
    if(karzs2){
      if(karzs > 0){
        if(datesrok){
          $.ajax({
          url: "{{ route('tolash') }}",
          type: "POST",
          data:{
            _token: _token,
            id: id,
            t_id2: t_id2,
            karzs: karzs,
            karzs2: karzs2,
            datesrok: datesrok
          },
          success: function(data) {
            toastr.success(data.msg);
            $("#t_id").val('');
            $("#ka").val('');
            $("#karzstol").val('');
            $("#karzstol2").val('');
            $("#karzstolqosh").val('');
            $("#ddddate").val('');
            $('#toluv').modal('hide');
            location.reload(true);
          }
        });
        }else{
          toastr.error("Срокни белгиланг");
        }
      }else{
        $.ajax({
          url: "{{ route('tolash') }}",
          type: "POST",
          data:{
            _token: _token,
            id: id,
            t_id2: t_id2,
            karzs: karzs,
            karzs2: karzs2
          },
          success: function(data) {
            toastr.success(data.msg);
            $("#t_id").val('');
            $("#ka").val('');
            $("#karzstol").val('');
            $("#karzstol2").val('');
            $("#karzstolqosh").val('');
            $("#ddddate").val('');
            $('#toluv').modal('hide');
            location.reload(true);
          }
        });
      }
    }else{
      toastr.error("Тулов киритилмаган");
    }
  });


  function tolovdok(id) {
    $.ajax({
      url: "{{ route('tidtolovdok') }}",
      type: "GET",
      data:{
        id: id
      },
      success: function(response) {
        $("#t_id2dok").val(response.id);
        $("#t_iddok").val(response.userdok_id);
        $("#kadok").val(response.karzs);
        $("#karzstoldok").val(response.karzs);
        $("#karzstol2dok").val('');
        $('#toluvdok').modal('show');
      }
    });
  }

  $("#otkazdok").on("click", function(){
    var ka = $("#kadok").val();
    $("#karzstol2dok").val(ka);
    $("#karzstoldok").val(0);
  });

  $(document).on("keyup", "#karzstol2dok", function(){
    var data = $(this).val();
    var ka = $("#kadok").val(); 
    var a = ka - data;
    $("#karzstoldok").val(a);
    $("#karzstolqoshdok").val(a);
    var fer = $("#karzstoldok").val();
    var kare = $("#karzstol2dok").val();
    if(fer > 0){
      if(kare == ''){
        $("#htmdok").html('');
      }else{
        var ht = '<input type="date" class="form-control mt-4" id="ddddatedok">';
        $("#htmdok").html(ht);
      }
    }else{
      $("#htmdok").html('');
    }
  });

  $("#aaadok").on("click", function(){
    let _token   = $('meta[name="csrf-token"]').attr('content');
    var id = $("#t_iddok").val();
    var t_id2 = $("#t_id2dok").val();
    var karzs = $("#karzstolqoshdok").val();
    var karzs2 = $("#karzstol2dok").val();
    var datesrok = $("#ddddatedok").val();
    if(karzs2){
      if(karzs > 0){
        if(datesrok){
          $.ajax({
          url: "{{ route('tolashdok') }}",
          type: "POST",
          data:{
            _token: _token,
            id: id,
            t_id2: t_id2,
            karzs: karzs,
            karzs2: karzs2,
            datesrok: datesrok
          },
          success: function(data) {
            toastr.success(data.msg);
            $("#t_iddok").val('');
            $("#kadok").val('');
            $("#karzstoldok").val('');
            $("#karzstol2dok").val('');
            $("#karzstolqoshdok").val('');
            $("#ddddatedok").val('');
            $('#toluvdok').modal('hide');
            location.reload(true);
          }
        });
        }else{
          toastr.error("Срокни белгиланг");
        }
      }else{
        $.ajax({
          url: "{{ route('tolashdok') }}",
          type: "POST",
          data:{
            _token: _token,
            id: id,
            t_id2: t_id2,
            karzs: karzs,
            karzs2: karzs2
          },
          success: function(data) {
            toastr.success(data.msg);
            $("#t_iddok").val('');
            $("#kadok").val('');
            $("#karzstoldok").val('');
            $("#karzstol2dok").val('');
            $("#karzstolqoshdok").val('');
            $("#ddddatedok").val('');
            $('#toluvdok').modal('hide');
            location.reload(true);
          }
        });
      }
    }else{
      toastr.error("Тулов киритилмаган");
    }
  });

  function addPost() {
    $("#id").val('');
    $('#post-modal').modal('show');
  }

  function addPostdok() {
    $("#iddok").val('');
    $('#post-modaldok').modal('show');
  }

  function sev(id){
    $("#oydi").val(id);
    $("#fgfgfgfg").modal("show");
  };
    
  function sevdok(id){
    $("#oydidok").val(id);
    $("#fgfgfgfgdok").modal("show");
  };

  function tolov(id) {
    $.ajax({
      url: "{{ route('tidtolov') }}",
      type: "GET",
      data:{
        id: id
      },
      success: function(response) {
        $("#t_id2").val(response.id);
        $("#t_id").val(response.user_id);
        $("#ka").val(response.karzs);
        $("#karzstol").val(response.karzs);
        $("#karzstol2").val('');
        $('#toluv').modal('show');
      }
    });
  }

  function editPost(id) {
    let _url = `show/${id}`;
    $('#idError').text('');
    $('#nameError').text('');
    $('#telError').text('');
    $('#firmaError').text('');
    $('#innError').text('');
    
    $.ajax({
      url: _url,
      type: "GET",
      success: function(response) {
        $("#id").val(response.id);
        $("#name").val(response.name);
        $("#tel").val(response.tel);
        $("#chatid").val(response.chatid);
        $("#firma").val(response.firma);
        $("#inn").val(response.inn);
        $("#summa").val(response.summa);
        $('#post-modaled').modal('show');
      }
    });
  }

  function editPostdok(id) {
    let _url = `showdok/${id}`;
    $('#iddokError').text('');
    $('#namedokError').text('');
    $('#teldokError').text('');
    $('#firmadokError').text('');
    $('#inndokError').text('');
    
    $.ajax({
      url: _url,
      type: "GET",
      success: function(response) {
          if(response) {
            $("#iddok").val(response.id);
            $("#namedok").val(response.name);
            $("#teldok").val(response.tel);
            $("#firmadok").val(response.firma);
            $("#inndok").val(response.inn);
            $("#summadok").val(response.summa);
            $('#post-modaldok2').modal('show');
          }
      }
    });
  }

  $(document).ready(function(){
    function fetch_customer_data(query = '')
    {
        $.ajax({
            url:"{{ route('live_clent') }}",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
              $('#clent').html(data.table_data);
            }
        })
    }
    fetch_customer_data();
    fetch_customer_data();

  $('#userForm').on('submit', function(e) {
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
          $('#tel').val('');
          $('#firma').val('');
          $('#inn').val('');
          $('#post-modal').modal('hide');
          toastr.success(data.msg);
        }
        if(data.code == 0){
          $.each(data.error, function(prefix, val){
            $(form).find('span.'+prefix+'_error').text(val[0]);
          });
          toastr.error(data.msg);
        }
        if(data.code == 201){
          $(form)[0].reset();
          fetch_customer_data();
          $('#name').val('');
          $('#tel').val('');
          $('#firma').val('');
          $('#inn').val('');
          $('#post-modal').modal('hide');
          toastr.success(data.msg);
        }           
      }
    });
  });

  $('#Hendl').on('submit', function(e) {
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
            toastr.success(data.msg);
            $("#fgfgfgfg").modal("hide");
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
          $('#tel').val('');
          $('#firma').val('');
          $('#inn').val('');
          $('#post-modaled').modal('hide');
          toastr.success(data.msg);
        }
        if(data.code == 0){
          $.each(data.error, function(prefix, val){
            $(form).find('span.'+prefix+'_error').text(val[0]);
          });
          toastr.error(data.msg);
        }
        if(data.code == 201){
          $(form)[0].reset();
          fetch_customer_data();
          $('#name').val('');
          $('#tel').val('');
          $('#firma').val('');
          $('#inn').val('');
          $('#post-modaled').modal('hide');
          toastr.success(data.msg);
        }           
      }
    });
  });
  });

  $(document).ready(function(){
    fetch_customer_datadok();
    function fetch_customer_datadok(query = '')
    {
        $.ajax({
            url:"{{ route('live_clentdok') }}",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
              $('#clentdok').html(data.table_data);
            }
        })
    }

    $('#Hendldok').on('submit', function(e) {
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
            toastr.success(data.msg);
            $("#fgfgfgfgdok").modal("hide");
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

    $('#userFormdok').on('submit', function(e) {
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
              $('#post-modaldok').modal('hide');
              toastr.success(data.msg);
            }
            if(data.code == 0){
              $.each(data.error, function(prefix, val){
                $(form).find('span.'+prefix+'_error').text(val[0]);
              });
              toastr.error(data.msg);
            }
            if(data.code == 201){
              fetch_customer_datadok();
              $('#post-modaldok').modal('hide');
              toastr.success(data.msg);
            }           
          }
        });
      });

      $('#userFormdok2').on('submit', function(e) {
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
              $('#post-modaldok2').modal('hide');
              toastr.success(data.msg);
            }
            if(data.code == 0){
              $.each(data.error, function(prefix, val){
                $(form).find('span.'+prefix+'_error').text(val[0]);
              });
              toastr.error(data.msg);
            }
            if(data.code == 201){
              fetch_customer_datadok();
              $('#post-modaldok2').modal('hide');
              toastr.success(data.msg);
            }           
          }
        });
      });
    
  });

  function deletePost(id) {
    $("#id5").val(id);
    $('#post-modal5').modal('show');
  }

  function deletePostdok(id) {
    $("#id5dok").val(id);
    $('#post-modal5dok').modal('show');
  }

  function dele2dok() {
    var id = $("#id5dok").val();
    let _url = `deletedok/${id}`;
    let _token   = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
        url: _url,
        type: 'POST',
        data: {
          _token: _token
        },
        success: function(data) {
          $("#rowdok_"+id).remove();
          $('#post-modal5dok').modal('hide');
          toastr.success(data.msg);
        }
      });
  }

  function dele2() {
    var id = $("#id5").val();
    let _url = `delete/${id}`;
    let _token   = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
        url: _url,
        type: 'POST',
        data: {
          _token: _token
        },
        success: function(data) {
          $("#row_"+id).remove();
          $('#post-modal5').modal('hide');
          toastr.success(data.msg);
        }
      });
  }

</script>

@endsection