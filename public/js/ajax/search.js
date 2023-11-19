$(function () {
    $(".select-search").on("keyup", function () {
        var search = $(this).val();
        // console.log(search);
        $.post("/searchUser", { search: search }, function (data) {
            // console.log(data);
            $(".result-data").html(data);
            if (search =="") {
                $(".result-data").html("");
                $(".result-data").hide();
            }
        });
    });
});
