$(document).ready(function () {
    $.post("../ajax/post.php", { id: window.location.href.split("id=")[1] }, function (data) {
    $('#post').html(data).show();
   
});
$.ajax({
    url: "../ajax/search.php",
    method: 'POST',
    async: true,
    dataType: 'html',
    success: function (data) {
        return data;
    },
    error: function (data) {
        console.error(data);
    }
});
})