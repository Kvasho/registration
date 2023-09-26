function testClick(){
    $.ajax({
        type: "POST",
        url: "./test.php",
        data: {"username":"username","password":"password","check_username":true},
        success: function (response) {
            ("#form").addClass("selected")
        }
    });
}

function testClick2(){
    $.ajax({
        type: "POST",
        url: "./test.php",
        data: {"username":"admin","password":"123","check_password":true},
        success: function (response) {
           alert(response);       
        }
    });
}