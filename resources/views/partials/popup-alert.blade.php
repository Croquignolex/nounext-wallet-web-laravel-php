@if(session()->has('notification.message'))
    <script> 
        notification(
            "{{ session('notification.title') }}", 
            "{{ session('notification.message') }}", 
            "{{ session('notification.type') }}", 
            "{{ session('notification.icon') }}", 
            "{{ session('notification.animate.enter') }}", 
            "{{ session('notification.animate.exit') }}", 
            "{{ session('notification.delay') }}"
        );
    </script>
@endif

{{--TODO: Fix popup alert for mobile--}}