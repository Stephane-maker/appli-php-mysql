"use strict";
$(document).ready(function () {
    $('#search').click(function (e) {
        $.post("../ajax/search.php", { ma_variable: $("#search").val() }, function (data) {
            $('#result').html("<table><tr> <th>name</th> <th>bio</th> </tr><tr> <td>" + data + "</td> </tr></table>").show();
            
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
    });
    $('#search').keydown(function (e) {
        $.post("../ajax/search.php", { ma_variable: $("#search").val() }, function (data) {
            $('#result').html("<table><tr> <th>name</th> <th>bio</th> </tr><tr> <td>" + data + "</td> </tr></table>").show();
            if (!data) {
                $('#result').html("Aucun resultat ne correspond a votre recherche").show();
                
            }
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
    });
});
