$(document).ready(function ()
{
    // CSRF for ajax requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Vuejs demo
    var demo = new Vue({
        el: '#demo',
        data: {
            message: ""
        }
    });
});
