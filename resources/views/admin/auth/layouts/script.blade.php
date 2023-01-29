<script src="{{asset('template/base-admin/dist/assets/modules/jquery.min.js')}}"></script>
<script src="{{asset('template/base-admin/dist/assets/modules/popper.js')}}"></script>
<script src="{{asset('template/base-admin/dist/assets/modules/tooltip.js')}}"></script>
<script src="{{asset('template/base-admin/dist/assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('template/base-admin/dist/assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('template/base-admin/dist/assets/modules/moment.min.js')}}"></script>
<script src="{{asset('template/base-admin/dist/assets/js/stisla.js')}}"></script>
<!-- Template JS File -->
<script src="{{asset('template/base-admin/dist/assets/js/scripts.js')}}"></script>
<script src="{{asset('template/base-admin/dist/assets/js/custom.js')}}"></script>
  <!-- JS Libraies -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
<script>
    $(document).ready(function() {

        $("#submit").click( function() {

            var email = $("#email").val();
            var password = $("#password").val();
            var token = $("meta[name='csrf-token']").attr("content");

            if(email.length == "") {

                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Alamat Email Wajib Diisi !'
                });

            } else if(password.length == "") {

                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Password Wajib Diisi !'
                });

            } else {

                $.ajax({

                    url: "{{ route('admin.login.submit') }}",
                    type: "POST",
                    dataType: "JSON",
                    cache: false,
                    data: {
                        "email": email,
                        "password": password,
                        "_token": token
                    },

                    success:function(response){

                        if (response.success) {

                            Swal.fire({
                                type: 'success',
                                title: 'Login Berhasil!',
                                text: 'Anda akan di arahkan dalam 3 Detik',
                                timer: 3000,
                                showCancelButton: false,
                                showConfirmButton: false
                            })
                                .then (function() {
                                    window.location.href = "{{ route('admin.dashboard') }}";
                                });

                        } else {

                            console.log(response.success);

                            Swal.fire({
                                type: 'error',
                                title: 'Login Gagal!',
                                text: 'silahkan coba lagi!'
                            });

                        }

                        console.log(response);

                    },

                    error:function(response){

                        Swal.fire({
                            type: 'error',
                            title: 'Gagal login!',
                            text: 'Anda Bukan ADMIN!'
                        });

                        console.log(response);

                    }

                });

            }

        });

    });
</script>
