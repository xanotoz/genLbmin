function addpacient(){

	rut=$("").val();
	nombre=$("").val();
	apaterno=$("").val();
	amanterno=$("").val();
	fechadenac=$("").val();
	telefono=$("").val();

	 var parametros = {
                "rut" : rut
                
        };
        $.ajax({
                data:  parametros,
                url:   'assets/ajax/addpacient.php',
                type:  'post',
                dataType : 'json',
               
                success:  function (res) {  
                  $('#PersNombre').val('antes de if');
                   $('#PersApaterno').val(res['nombre']);
                  if(res.rExiste==1){ //si esque existe ne la bd de bloqueo
              
                          msjAlerta.style.display = 'block';
                          btnGuardar.attr('disabled', true);
              
                          }else{
              
                          $('#PersNombre').val(nombre.res);
                    };  
                }
        });
      }
}