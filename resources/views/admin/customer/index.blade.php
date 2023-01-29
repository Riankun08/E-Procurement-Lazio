@extends('layouts.admin.app')
@section('title' , "$title")
@section('content')
<div class="section-header">
  <h1>Data {{ $title }}</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="#">Modules</a></div>
    <div class="breadcrumb-item">DataTables</div>
  </div>
</div>

<div class="section-body">
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header justify-content-between">
        <h4>Basic DataTables</h4>
        <button id="modalCreateCustomer" class="btn btn-primary btn-lg">+ Tambah</button>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <div id="read"></div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


{{-- form modal --}}
<form class="modal-part" id="FormModalCreateCustomer">
  @include('admin.customer.create')  
</form>

@endsection

@section('libraiesJS')
<!-- JS Libraies -->
<script src="{{asset('template/dist/assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{asset('template/dist/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('template/dist/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
<script src="{{asset('template/dist/assets/modules/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('template/dist/assets/js/page/bootstrap-modal.js')}}"></script>
<script src="{{asset('template/dist/assets/modules/summernote/summernote-bs4.js')}}"></script>

<!-- Page Specific JS File -->
<script src="{{asset('template/dist/assets/js/page/modules-datatables.js')}}"></script>
@endsection

@section('script')
      <script>
        $(document).ready(function() {
            read()
        });
        // Read Database
        function read() {
            $.get("{{ url('/admin/customers/read') }}", {}, function(data, status) {
                $("#read").html(data);
            });
        }
        // Untuk modal halaman create
        // function create() {
        //     $.get("{{ url('/admin/customers/create') }}", {}, function(data, status) {
        //         $("#exampleModalLabel").html('Create Product')
        //         $("#page").html(data);
        //         $("#exampleModal").modal('show');
        //     });
        // }
        // untuk proses create data
        // function store() {
        //     var name = $("#name").val();
        //     var name = $("#name").val();
        //     var name = $("#name").val();
        //     $.ajax({
        //         type: "get",
        //         url: "{{ url('store') }}",
        //         data: "name=" + name,
        //         success: function(data) {
        //             $(".btn-close").click();
        //             read()
        //         }
        //     });
        // }
        // Untuk modal halaman edit show
        // function show(id) {
        //     $.get("{{ url('show') }}/" + id, {}, function(data, status) {
        //         $("#exampleModalLabel").html('Edit Product')
        //         $("#page").html(data);
        //         $("#exampleModal").modal('show');
        //     });
        // }
        // untuk proses update data
        // function update(id) {
        //     var name = $("#name").val();
        //     $.ajax({
        //         type: "get",
        //         url: "{{ url('update') }}/" + id,
        //         data: "name=" + name,
        //         success: function(data) {
        //             $(".btn-close").click();
        //             read()
        //         }
        //     });
        // }
        // untuk delete atau destroy data
        // function destroy(id) {
        //     $.ajax({
        //         type: "get",
        //         url: "{{ url('destroy') }}/" + id,
        //         data: "name=" + name,
        //         success: function(data) {
        //             $(".btn-close").click();
        //             read()
        //         }
        //     });
        // }
    </script>
@endsection