function testClick(){
        $.ajax({
        type: "POST",
        url: "./test.php",
        data: {"login_email": $("#loginEmail").val(),"login_password":$("#loginPassword").val(),"login":true},
        success: function (response) {
            alert(response);
        }
    });
}