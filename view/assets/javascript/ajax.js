$(document).ready(function() {
    $("#LiveSearch").keyup(function(e) {
        e.preventDefault();
        var articleName = $(this).val();

        $.ajax({
            url: "../../article.php",
            method: "POST",
            data: {
                articleName: articleName
            },
            success: function(data) {
                $("#articlesContainer").html(data);
            }
        });
    });
});
