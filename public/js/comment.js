$(function () {
    $(document).on("click", ".comment", function () {
        var tweet_id = $(this).data("tweet");
        $.post("/comment", { tweet_cmnt: tweet_id }, function (data) {
            $(".popUpComment").html(data);
        });
    });

    $(document).on("click", ".getcomment", function (e) {
        var tweet_id = $(this).data("tweet");
        console.log(tweet_id);
  
        var counter=$(this).find('.tweet_comment_count');
        var comment;
        $(".comment-text").each(function () {
            comment = $(this).val();
        });

        $.post(
            "/storeComment",
            { comment: comment, commentId: tweet_id },
            function (data) {
                $("#exampleModal").modal("hide");
                console.log(data);
                counter.text(data);
            }
        );
    });
});
