
function getFileName () {
// Получаем имя загружаемого файла по id
var file = document.getElementById ('uploaded-file').value;


if (file.lastIndexOf('\\')) {
        var i = file.lastIndexOf('\\') + 1;
    }
    else {
        var i = file.lastIndexOf('/') + 1;
    }						
    var filename = file.slice(i);

document.getElementById('file-name').innerHTML = $("#NAME_FILE").text()+" "+ filename;
}

$(document).ready(function(){

// alert($("#VAL_LOGREQ").text());




//Подключение валидации на стороне клиента
	$("#loginform").validate({

       rules:{

            name:{
                required: true,
                minlength: 3,
                maxlength: 16,
            },

            password:{
                required: true,
                minlength: 6,
                maxlength: 16,
            },
            email:{
                email: true,
                required: true,
            },
       },

       messages:{

            name:{
                required: $("#VAL_LOGREQ").text(),
                minlength: $("#VAL_LOGMINLEN").text(),
                maxlength: $("#VAL_LOGMAXLEN").text(),
            },

            password:{
                required:  $("#VAL_PASREQ").text(),
                minlength: $("#VAL_PASMINLEN").text(),
                maxlength: $("#VAL_PASMAXLEN").text(),
            },

            email:{
                email: $("#VAL_MAIL_TRUE").text(),
                required:  $("#VAL_MAIL_ENTER").text(),
            },

       }

    });
});


