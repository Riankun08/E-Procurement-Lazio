<table class="table table-striped" id="table-1">
    <thead>                                 
      <tr>
        <th class="text-center">
          #
        </th>
        <th>Id</th>
        <th>Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>              
        @php
            $no = 1
        @endphp                   
        @foreach ($data as $item)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>
                <button class="btn btn-warning" onClick="show({{ $item->id }})">Edit</button>
                <button class="btn btn-danger" onClick="destroy({{ $item->id }})">Delete</button>
            </td>
        </tr>
    @endforeach
    </tbody>
  </table>