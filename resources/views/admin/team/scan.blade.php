@extends('layouts.app')

@section('content')
    <div id="reader" width="600px"></div>
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/html5-qrcode.js') }}" type="text/javascript"></script>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            $.ajax({
                url: decodedText,
                method: 'GET',
            }).done(function(res){
                message = JSON.parse(res).message;
                alert(message);
                // location.reload();
            })
        }

        function onScanFailure(error) {
            // handle scan failure, usually better to ignore and keep scanning.
            // for example:
            // console.warn(`Code scan error = ${error}`);
        }

        $(function(){
            let html5QrcodeScanner = new Html5QrcodeScanner(
                "reader", {
                    fps: 10,
                    qrbox: {
                        width: 250,
                        height: 250
                    }
                },
                /* verbose= */
                false);
            html5QrcodeScanner.render(onScanSuccess, onScanFailure);
        });
    </script>
@endsection
