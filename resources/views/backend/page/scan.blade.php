@extends('layouts/appAdmin')
@section('content_admin')
    <center class="mt-3">
        <div class="col-lg-6 col-12">
            <div class="bg-dark rounded-3" id="reader" width="600px"></div>
            <input type="hidden" id="result">
        </div>
    </center>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function showAlertError(message) {
            Swal.fire({
                title: 'Warning !',
                text: message,
                icon: 'error',
                confirmButtonText: 'OK',
                willClose: () => {
                    window.location.href = "/admin/scan";
                }
            })
        }

        function showAlertSuccess(message) {
            Swal.fire({
                title: 'Success',
                text: message,
                icon: 'success',
                confirmButtonText: 'OK',
                willClose: () => {
                    window.location.href = "/admin/scan";
                }
            })
        }

        function showAlertInfo(message) {
            Swal.fire({
                title: 'Success',
                text: message,
                icon: 'info',
                confirmButtonText: 'Ok',
                willClose: () => {
                    window.location.href = "/admin/scan";
                }
            })
        }
    </script>

    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
        // $('#result').val('test');
        function onScanSuccess(decodedText, decodedResult) {
            // alert(decodedText);
            $('#result').val(decodedText);
            let id = decodedText;
            html5QrcodeScanner.clear().then(_ => {
                // var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({

                    url: "{{ route('validasi') }}",
                    type: 'POST',
                    data: {
                        _methode: "POST",
                        _token: "{{ csrf_token() }}",
                        qr_code: id
                    },
                    success: function(response) {

                        // console.log(response);
                        if (response.status == 200) {
                            showAlertSuccess(response.message)
                        } else if (response.status == 201) {
                            showAlertInfo(response.message)
                        } else {
                            showAlertError(response.message)
                        }

                    }
                });
            }).catch(error => {
                alert('something wrong');
            });

        }

        function onScanFailure(error) {
            // handle scan failure, usually better to ignore and keep scanning.
            // for example:
            // console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: {
                    width: 260,
                    height: 260
                }
            },
            /* verbose= */
            false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
@endsection
