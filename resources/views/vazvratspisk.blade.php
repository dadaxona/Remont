@extends('welcome')
@section('content')
<div class="table-responsive card">
    <table class="tab table-hover" id="laravel_crud">
        <thead>
            <tr>
                <th>Последняя дата</th>
                <th>Мижоз</th>
                <th>Товар</th>
                <th>Сабап</th>
                <th>Хажм</th>
                <th>Сумма</th>
                <th>Штрих код</th>
            </tr>
        </thead>
        <tbody id="vazvrat">
 
        </tbody>
    </table>
  </div> 
<script>

    function fetch_customer_data2(query = '')
    {
        $.ajax({
            url:"{{ route('vazvradspi') }}",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $('#vazvrat').html(data.table_data);                    
            }
        })
    }
    fetch_customer_data2();
</script>
@endsection