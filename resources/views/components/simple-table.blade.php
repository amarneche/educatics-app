<div>
    <div class="table-responsive">
    <table class="table table-hover">
        <tr>
            @foreach($headers as $header)
            <th>  {{ $header}}  </th>
            @endforeach
        </tr>
        @foreach($collection as $item)
        <tr>
            @foreach($headers as $header)
            <td>  {{ $item->$header}}  </td>
            @endforeach
        </tr>
        @endforeach
       
    </table>
    </div>
</div>