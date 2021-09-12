$(document).ready(function () {
    $(function () {
        $("#playli li").onclick = function () {
            console.log("hi");
            $("#videoarea").attr({
                src: $(this).attr("movieurl"),
            });
        };
        $("#videoarea").attr({
            src: $("#playli").eq(0).attr("movieurl")
        })
    });
});