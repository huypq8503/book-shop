$(function () {
    $(document).on("click", ".follow-btn", function (e) {
        let follow_id = $(this).data("follow");
        let user_id = $(this).data("userid");
        let following, follower;

        $button = $(this);

        if ($button.hasClass("follow")) {
            $.post(
                "/followData/follow",
                { follow: follow_id },
                function (data) {
                    $button.addClass("following");
                    $button.removeClass("follow");
                    $button.text("Following");
                    $following = $(".count-following").html();
                    $following++;
                    console.log($following);
                    $(".count-following").html($following);
                }
            );
        } else {
            $.post(
                "/followData/unfollow",
                { unfollow: follow_id },
                function (data) {
                    $button.addClass("follow");
                    $button.removeClass("following");
                    $button.text("Follow");
                    $following = $(".count-following").html();
                    $following--;
                    console.log($following);
                    $(".count-following").html($following);
                }
            );
        }
    });
    $(document).on("mouseover", ".following", function (e) {
        $(this).html("Unfollow");
    });
    $(document).on("mouseout", ".following", function (e) {
        $(this).html("Following");
    });

});
