@extends('welcome')
@section('content')
<section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-success card-outline">
          <div class="card-header">
              <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Mijozlarni ro`yxatga olish
              </button>
            <div class="card-tools">
              <form action="{{ route('search') }}" method="GET">
                @csrf
                <div class="input-group input-group-sm">
                    <input type="number" class="form-control mx-1" id="search" name="tel" placeholder="Telefon search">
                      <div class="input-group-append">
                      <button type="submit" class="btn btn-primary">
                        Search
                      </button>
                    </div>
                  </div>
                </form>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
          
            <div class="table-responsive mailbox-messages">
                <div class="extr22 scrolll2">
                    <div class="rtytt22">
                    <table class="tab table-hover table-striped">
                        <tr>
                          <th>Sana</th>
                          <th>Name</th>
                          <th>Tel</th>
                          <th>Texnika</th>
                          <th>Muammo</th>
                          <th>Xulosa</th>
                          <th>Masul usta</th>
                          <th>Сервисе Номер</th>
                          <th>Summa</th>
                          <th>Aloqa</th>
                          <th>Edit</th>
                          <th>Otpravit</th>
                        </tr>
                        @if ($data2)
                        @foreach ($data2 as $item)
                        <tr id="sid{{ $item->id  }}">
                          <td>{{ $item->data }}</td>
                          <td>{{ $item->name }}</td>
                          <td>{{ $item->tel }}</td>
                          <td>{{ $item->texnika }}</td>
                          <td>{{ $item->muammo }}</td>
                          <td>{{ $item->xulosa }}</td>
                          <td>{{ $item->usta }}</td>
                          <td>{{ $item->id}}</td>
                          <td>{{ $item->summa }}</td>
                         @if ($item->vizp == 1)
                         <td>
                          <form action="{{ route('aloqa') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <button type="submit" class="btn-primary" style="border-radius: 5px;">
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telephone-outbound" viewBox="0 0 16 16">
                                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5z"/>
                              </svg>
                            </button>
                          </form>
                        </td>
                         @else
                         <td>
                          <form action="{{ route('aloqa') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <button type="submit" class="btn-danger" style="border-radius: 5px;">
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telephone-x" viewBox="0 0 16 16">
                                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                <path fill-rule="evenodd" d="M11.146 1.646a.5.5 0 0 1 .708 0L13 2.793l1.146-1.147a.5.5 0 0 1 .708.708L13.707 3.5l1.147 1.146a.5.5 0 0 1-.708.708L13 4.207l-1.146 1.147a.5.5 0 0 1-.708-.708L12.293 3.5l-1.147-1.146a.5.5 0 0 1 0-.708z"/>
                              </svg>
                            </button>
                          </form>
                        </td>
                         @endif
                          <td>
                            <button onclick="editmijoz({{ $item->id }})" class="btn-success" style="border-radius: 5px;">
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                              </svg>
                            </button>
                          </td>
                          <td>
                            <form action="{{ route('otkazishauth') }}" method="POST">
                              @csrf
                              <input type="hidden" name="id" value="{{ $item->id }}">
                              <button type="submit" class="btn-info" style="border-radius: 5px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                  <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                </svg>
                              </button>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                        @endif
                      </table>
                      {{ $data2->links() }}
                </div>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Mijozlarni ro`yxatga olish</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <form action="{{ route('store') }}" method="POST" id="mijoz">
                              @csrf
                            <div class="row">
                              <div class="mb-3 col-6">
                                <label for="recipient-name" class="col-form-label">Ism</label>
                                <input type="text" name="name" class="form-control" id="ismu">
                                <span class="text-danger">@error('name') {{$message}}@enderror</span>
                              </div>
                              <div class="mb-3 col-6">
                                  <label for="recipient-name" class="col-form-label">Telefon</label>
                                  <input type="number" name="tel" class="form-control" id="telu">
                                  <span class="text-danger">@error('tel') {{$message}}@enderror</span>
                              </div>
                              <div class="mb-3 col-6">
                                  <label for="recipient-name" class="col-form-label">Texnika</label>
                                  <input type="text" name="texnika" class="form-control" id="texu">
                                  <span class="text-danger">@error('texnika') {{$message}}@enderror</span>
                              </div>
                              <div class="mb-3 col-6">
                                <label for="recipient-name" class="col-form-label">Muammo</label>
                                <input type="text" name="muammo" class="form-control" id="muau">
                                <span class="text-danger">@error('muammo') {{$message}}@enderror</span>
                              </div>
                              <div class="mb-3 col-6">
                                <label for="recipient-name" class="col-form-label">Masul usta</label>
                                <select name="usta" class="form-control">
                                 @foreach ($collection as $usta)
                                  <option value="{{ $usta->name }}">{{ $usta->name }}</option>
                                 @endforeach
                                </select>
                                <span class="text-danger">@error('usta') {{$message}}@enderror</span>
                              </div>
                              <div class="mb-3 col-6">
                                <label for="recipient-name" class="col-form-label">Xulosa</label>
                                <input type="text" name="xulosa" class="form-control">
                                <span class="text-danger">@error('xulosa') {{$message}}@enderror</span>
                              </div>
                              <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Summa</label>
                                <input type="number" name="summa" class="form-control">
                                <span class="text-danger">@error('summa') {{$message}}@enderror</span>
                              </div>
                            </div>                 
                        </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Saqlash</button>
                      </div>
                      </form>
                      </div>
                  </div>
                  </div>
                <div class="modal fade" id="exampleModalMijoz" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Mijoz malumotlarini yangilash</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <form action="{{ route('update') }}" method="POST">
                              @csrf
                              <input type="hidden" name="id" id="id">
                              <div class="row">
                                <div class="mb-3 col-6">
                                  <label for="recipient-name" class="col-form-label">Ism</label>
                                  <input type="text" name="name" id="name" class="form-control">
                                  <span class="text-danger">@error('name') {{$message}}@enderror</span>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="recipient-name" class="col-form-label">Telefon</label>
                                    <input type="number" name="tel" id="tel" class="form-control">
                                    <span class="text-danger">@error('tel') {{$message}}@enderror</span>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="recipient-name" class="col-form-label">Texnika</label>
                                    <input type="text" name="texnika" id="texnika" class="form-control">
                                    <span class="text-danger">@error('texnika') {{$message}}@enderror</span>
                                </div>
                                <div class="mb-3 col-6">
                                  <label for="recipient-name" class="col-form-label">Muammo</label>
                                  <input type="text" name="muammo" id="muammo" class="form-control">
                                  <span class="text-danger">@error('muammo') {{$message}}@enderror</span>
                                </div>
                                <div class="mb-3 col-6">
                                  <label for="recipient-name" class="col-form-label">Masul usta</label>
                                  <select name="usta" class="form-control" id="usta">
                                   @foreach ($collection as $usta)
                                    <option value="{{ $usta->name }}">{{ $usta->name }}</option>
                                   @endforeach
                                  </select>
                                  <span class="text-danger">@error('usta') {{$message}}@enderror</span>
                                </div>
                                <div class="mb-3 col-6">
                                  <label for="recipient-name" class="col-form-label">Xulosa</label>
                                  <input type="text" name="xulosa" id="xulosa" class="form-control">
                                  <span class="text-danger">@error('xulosa') {{$message}}@enderror</span>
                                </div>
                                <div class="mb-3">
                                  <label for="recipient-name" class="col-form-label">Summa</label>
                                  <input type="number" name="summa" id="summa" class="form-control">
                                  <span class="text-danger">@error('summa') {{$message}}@enderror</span>
                                </div>
                              </div>  
                          </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Saqlash</button>
                      </div>
                      </form>
                      </div>
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
  <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    function editmijoz(id) {
      $.ajax({
            type:'GET',
            url:"{{ route('edit') }}",
            data:{
              id: id,
            },
            success:function(data){
              $("#id").val(data.success.id);
              $("#name").val(data.success.name);
              $("#tel").val(data.success.tel);
              $("#texnika").val(data.success.texnika);
              $("#muammo").val(data.success.muammo);
              $("#usta").val(data.success.usta);
              $("#xulosa").val(data.success.xulosa);
              $("#summa").val(data.success.summa);
              $("#exampleModalMijoz").modal("toggle");
            }
        });
    }

    $('#mijoz').on('submit', function(e) {
      e.preventDefault();
      var form = this;
      var ismu = $("#ismu").val();
      var telu = $("#telu").val();
      var texu = $("#texu").val();
      var muau = $("#muau").val();
      $.ajax({
        url:$(form).attr('action'),
        method:$(form).attr('method'),
        data:new FormData(form),
        processData:false,
        dataType:'json',
        contentType:false,
        success:function(data){
          if(data.usta.chatid){
            var k= "";
            k+= "Салом хурматли" + " " + data.usta.name + " " + "сизга буйуртма топширилди.";
            k+= " \n";
            k+= "\n";
            k+= "Мижоз" + " , " + ismu;
            k+= ";\n";
            k+= "Техника" + " , " + texu;
            k+= ";\n";
            k+= "Муаммо" + " , " + muau;
            k+= ";\n";
            k+= "Телефон" + " , " + telu;
            k+= ";\n";
            k+= "Сервис номер" + " , " + data.id;
            k+= ";\n";
            k+= "\n";
            k+= "Хурмат билан << ID Group >>";
            $.ajax({
              url: "https://api.telegram.org/bot5473083753:AAGZa2nwaz0Ndj53tJskF--Owqxe-ApZdnA/sendMessage",
              type: "GET",
              data: {
                  chat_id: data.usta.chatid,
                  text: k
              },
              success: function(result) {
                $(form)[0].reset();
                toastr.success(data.msg);
                location.reload(true);
              }
            });
          }else{
            $(form)[0].reset();
                toastr.success(data.msg);
                location.reload(true);
          }
        }
      });
    });
</script>
@endsection