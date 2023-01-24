$(document).ready(function () {
    $("#get_data").on("click", function () {
        var base_url = window.location.origin;
        let csrf_token = $("input[name=_token]").val();
        jQuery.ajax({
            url: base_url + "/ajax/response",
            // url:'http://127.0.0.1:8000/api/member-list',
            type: "post",
            data: {
                _token: csrf_token,
                id: 1,
                name: "tarun",
            },
            success: function (data) {
                console.log(data);
            },
        });
    });
});
