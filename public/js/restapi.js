//First check if jQuery available or not
let $api_token = '';
let $csrf_token = '';
if(window.jQuery) {
    //Fire this only after document loads
    $(document).ready(function () {
        $api_token = $('meta[name="api-token"]').attr('content');
        $csrf_token = $('meta[name="csrf-token"]').attr('content');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $csrf_token,
            }
        });
    });
}
