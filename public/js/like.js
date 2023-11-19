$(function () {
    $(document).on("click", ".like-btn", function () {
        var tweet_id = $(this).data("tweet");
        var button    = $(this);
        var counter=$(this).find('.tweet_like_count');
        $.ajax({
            type: "post",
            url: "/likedTweet",
            data: { like: tweet_id },
            success: function (data) {
                counter.text(data);
                button.addClass('unlike-btn');
                button.removeClass('like-btn');
           
            },
        });
    });
    $(document).on("click", ".unlike-btn", function () {
        var tweet_id = $(this).data("tweet");
        var button    = $(this);
        var counter=$(this).find('.tweet_like_count');
        $.ajax({
            type: "post",
            url: "/unlikedTweet",
            data: { like: tweet_id },
            success: function (data) {
                counter.text(data);
                button.removeClass('unlike-btn');
                button.addClass('like-btn');
                
            },
        });
    });
});


