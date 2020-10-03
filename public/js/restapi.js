let $csrf_token = '';
let $api_token = '';
if(window.jQuery) {
    //Fire this only after document loads
    $(document).ready(function () {

        $csrf_token = $('meta[name="csrf-token"]').attr('content');
        $api_token = $('meta[name="api-token"]').attr('content');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $csrf_token,
            }
        });
    });
}
