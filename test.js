function testClick(){
        $.ajax({
        type: "POST",
        url: "./test.php",
        data: {"login_email": $("#loginEmail").val(),"login_password":$("#loginPassword").val(),"login":true},
        success: function (response) {
            console.log(response);
            if(response === "success"){
                window.location = "datatable.php";
            } else {
                $(".registration-form-error").css({"display": "block"});
            }
        }
    });
}

function returnHandler(){
    $.ajax({
    type: "POST",
    url: "./test.php",
    data: {"logout":true},
    success: function (response) {
        console.log(response);
        if(response === 'logout'){
            window.location = "index.php";
        }
    }
});
}