@if (session('success'))
    <script>
        // On load Toast
        setTimeout(function () {
            toastr['success'](
                "{{session('success')}}",
                'success!',
                {
                    closeButton: true,
                    tapToDismiss: false,
                }
            );
        }, 2000);
    </script>
@endif

@if (session('error'))
    <script>
        // On load Toast
        setTimeout(function () {
            toastr['error'](
                "{{session('error')}}",
                'error!',
                {
                    closeButton: true,
                    tapToDismiss: false,
                }
            );
        }, 2000);
    </script>
@endif
