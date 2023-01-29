<script src="{{ asset('template/base-admin/dist/assets/modules/jquery.min.js')}}"></script>
<script src="{{ asset('template/base-admin/dist/assets/modules/popper.js')}}"></script>
<script src="{{ asset('template/base-admin/dist/assets/modules/tooltip.js')}}"></script>
<script src="{{ asset('template/base-admin/dist/assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('template/base-admin/dist/assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
<script src="{{ asset('template/base-admin/dist/assets/modules/moment.min.js')}}"></script>
<script src="{{ asset('template/base-admin/dist/assets/js/stisla.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@yield('libraiesJS')
<script type="text/javascript">
  $(document).ready(function() {
    $('.btn-delete').click(function(e) {
      e.preventDefault();
      var $this = $(this);

      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $this.parent('form').submit();
        }
      })
    });
    });
</script>


<!-- Template JS File -->
<script src="{{ asset('template/base-admin/dist/assets/js/scripts.js')}}"></script>
<script src="{{ asset('template/base-admin/dist/assets/js/custom.js')}}"></script>

@yield('script')
