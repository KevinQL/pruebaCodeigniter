(function($) {

    $("#formLogin").submit(function(ev){
        ev.preventDefault();
        // return
        $("#email").removeClass("is-invalid")
        $("#password").removeClass("is-invalid")
        $("button + div.alert").addClass('d-none')

        $.ajax({
            url: "login/login_user",
            type: "POST",
            dataType: "json",
            data: $(this).serialize() ,
            success: function (data){
                
                // console.log(data);

                window.location.replace(data.url);

            },
            statusCode: {
                400: function (xhr) {
                    let res = JSON.parse(xhr.responseText);

                    // console.log(res);

                    if(res.email.length != 0) {
                        $("#email").addClass("is-invalid")
                        $("#email + *").html(res.email);
                    }
                    if(res.password.length != 0){
                        $("#password").addClass("is-invalid")
                        $("#password + *").html(res.password);
                    }
                },
                401 : function(xhr){
                    let res = JSON.parse(xhr.responseText);
                    console.log(res);

                    $("button + div.alert").removeClass('d-none').html(res.msj);
                }
            }
        });

    })


})(jQuery);