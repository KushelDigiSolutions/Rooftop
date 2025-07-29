<script>
    window.onload = function() {

        @if(Session::has('success'))
            Toastify({
                text: "{{ Session::get('success') }}",
                duration: 4000,
                gravity: "top",
                position: "right",
                backgroundColor: "#28a745", // green
                stopOnFocus: true
            }).showToast();
        @endif

        @if(Session::has('error'))
            Toastify({
                text: "{{ Session::get('error') }}",
                duration: 4000,
                gravity: "top",
                position: "right",
                backgroundColor: "#dc3545", // red
                stopOnFocus: true
            }).showToast();
        @endif

        @if($errors->any())
            @foreach ($errors->all() as $error)
                Toastify({
                    text: "{{ $error }}",
                    duration: 4000,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#dc3545", // red
                    stopOnFocus: true
                }).showToast();
            @endforeach
        @endif

    };
</script>