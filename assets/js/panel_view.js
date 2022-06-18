
// Jquery 
(function($) {
    /**
     * Funcion para obtener la lista de todos los libros
     */
    function get_data_library(){
    
        let txt_input = $('#txtSearch').val();
        $.ajax({
            url: "welcome/api/",        
            type: "POST",
            dataType: "json",
            data: { txt_isbn: txt_input }, 
            success: function(data){  
    
                $("#form_search_panel input#txtSearch").removeClass("is-invalid");
    
                let data_html = ""; 
                let count=0;
                data.forEach(el => {
                    data_html += `
                        <tr>
                            <th scope="row">${++count}</th>
                            <td>${ el.ISBN }</td>
                            <td>${ el.Titulo }</td>
                            <td>${ el.NumeroEjemplares }</td>
                            <td>${ el.NombreAutor }</td>
                            <td>${ el.NombreEditorial }</td>
                            <td>${ el.NombreTema }</td>
                            <td>
                                <form action="update/index/${el.idLibro}" method="post">
                                    <input type="submit" value="update" class="btn btn-warning d-inline py-1 my-1">
                                </form>
                            </td>
                            <td>
                                <input type="button" value="delete" class="btn btn-danger d-inline py-1 my-1" onclick="deleteItem(${el.idLibro}')">
                            </td>
                            
                        </tr>
                    `
                });
    
                $(".table-results").html(data_html);
    
            },
            statusCode: {
                400: function(xhr){
                    $res = JSON.parse(xhr.responseText);
        
                    $("#form_search_panel input#txtSearch").removeClass("is-invalid");
                    if(xhr.status == 400){
                        if($res.txt_isbn.length !== 0){
                            $("#form_search_panel input#txtSearch").addClass("is-invalid");
                            $("#form_search_panel div").html($res.txt_isbn);
                        }
                    }
                },
                
                401: function(xhr) {
                    $res = JSON.parse(xhr.responseText);
                    if(xhr.status == 401){
                        $("#form_search_panel input#txtSearch").addClass("is-invalid");
                        $("#form_search_panel div").html($res.msj);
                        $(".table-results").html('');
                    }
                }
            }
        });
        
    }

    // input text buscar 
    $('#txtSearch').keyup(function(ev){
        get_data_library();
    });

    // boton buscar por isbn
    $('#btn_txtSearch').click(function(ev){
        console.log("test click", ev.target.value);
        get_data_library();
    });

})(jQuery);