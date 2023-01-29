@extends('layouts.admin.app')
@section('title' , $title)
@section('content')
<div class="section-header">
  <h1>Data {{ @$title  }}</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="#">{{@$title}}</a></div>
    <div class="breadcrumb-item">Data {{@$title }}</div>
  </div>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header justify-content-between">
          <h4>Data {{ @$title }}</h4>
          <a class="btn btn-primary" href="{{ route($route.'create') }}">+ Tambah</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped" id="table-1">
              <thead>                                 
                <tr>
                  <th class="text-center">
                    #
                  </th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>No. Telpon</th>
                  <th>Role</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>                     
                @php
                    $no = 1
                @endphp            
                @foreach ($datas as $data)
                <tr>
                  <td>
                    {{ $no++ }}
                  </td>
                  <td>{{ @$data->name }}</td>
                  <td>{{ @$data->email }}</td>
                  <td>{{ @$data->phone }}</td>
                  <td>{{ @$data->role }}</td>
                  <td class="text-center">
                    <div class="d-flex justify-content-center">
                      <div class="m-1">
                        <a href="{{ route($route.'show' , Crypt::encryptString($data->id)) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                      </div>
                      <div class="m-1">
                      <a href="{{ route($route.'edit' , Crypt::encryptString($data->id)) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                      </div>
                      <div class="m-1">
                      <form action="{{ route($route.'destroy' , Crypt::encryptString($data->id)) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <butotn type="button" class="btn btn-danger btn-delete" data-id="{{ @$data->id }}" ><i class="fa fa-trash"></i></butotn>
                      </form>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('libraiesJS')
  <!-- JS Libraies -->
  <script src="{{ asset('template/base-admin/dist/assets/modules/jquery-ui/jquery-ui.min.js')}}"></script>
  <script src="{{ asset('template/base-admin/dist/assets/modules/datatables/datatables.min.js')}}"></script>
  <script src="{{ asset('template/base-admin/dist/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{ asset('template/base-admin/dist/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('template/base-admin/dist/assets/js/page/modules-datatables.js')}}"></script>
@endsection

@section('script')
    <script>
      
    </script>
@endsection