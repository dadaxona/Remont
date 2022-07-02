@extends('welcome')
@section('content')
<section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-success card-outline">
          <div class="card-header">
              <h4 class="card-title">
                Ustalarni ro`yxatga olish
              </h4>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="mailbox-controls">
          @if ($brends->login == "Admin")
          <form action="{{ route('usracreate') }}" method="POST">
            @csrf
            <div class="col-8">
              <div class="row">
                <div class="col-8">
                  <input type="text" name="name"  class="form-control" placeholder="Usta nomi">
                </div>
                <div class="col-4">
                  <button type="submit" class="btn btn-primary">Saqlash</button>
                </div>
              </div>
            </div>
          </form>
          @else
            <div class="col-8">
              <div class="row">
                <div class="col-8">
                  <input class="form-control" placeholder="Usta nomi" disabled>
                </div>
                <div class="col-4">
                  <button class="btn btn-dark">Saqlash</button>
                </div>
              </div>
            </div>
          @endif
            </div>
            <div class="table-responsive mailbox-messages">
                <div class="extr22 scrolll2">
                    <div class="rtytt22">
                    <table class="tab table-hover table-striped">
                        <tr>
                          <th>Name</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                        @foreach ($collection as $item)
                        <tr id="sid{{ $item->id  }}">
                          <td>{{ $item->name }}</td>
                          @if ($brends->login == "Admin")
                          <td>
                            <button onclick="editusta({{ $item->id }})" class="btn-success" style="border-radius: 5px;">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                              </svg>
                            </button>                            
                          </td>
                          <td>
                            <form action="{{ route('deleteusta') }}" method="POST">
                              @csrf
                              <input type="hidden" name="id" id="" value="{{ $item->id }}">
                              <button type="submit" class="btn-danger" style="border-radius: 5px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                              </button>
                            </form>
                          </td>                              
                          @else
                          <td>
                            <button class="btn-dark" style="border-radius: 5px;">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                              </svg>
                            </button>                            
                          </td>
                          <td>
                              <button class="btn-dark" style="border-radius: 5px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                              </button>
                          </td>  
                          @endif
                        </tr>
                        @endforeach
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
    <div class="modal fade" id="exampleModalUsta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Usta malumotlarini yangilash</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form action="{{ route('updateusta') }}" method="POST">
                  @csrf
                  <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                      <label for="recipient-name" class="col-form-label">Usta nomi</label>
                      <input type="text" name="name" id="name" class="form-control">
                      <span class="text-danger">@error('name') {{$message}}@enderror</span>
                    </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Saqlash</button>
          </div>
          </form>
          </div>
      </div>
      </div>
  </section>
  <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    function editusta(id) {
      $.ajax({
            type:'GET',
            url:"{{ route('editusta') }}",
            data:{
              id: id,
            },
            success:function(data){
              $("#id").val(data.success.id);
              $("#name").val(data.success.name);
              $("#exampleModalUsta").modal("toggle");
            }
        });
    }
</script>
@endsection