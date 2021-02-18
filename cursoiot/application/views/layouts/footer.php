<footer class="main-footer">
		<div class="float-right d-none d-sm-block">
				<b>Version</b> 3.3.0
		</div>
		<strong>Copyright &copy; <?php echo date("Y");?> <a href="<?php base_url();?>">freeiot.tk</a>.</strong> All rights
		reserved.
</footer>

<!-- /.control-sidebar -->
</div>


<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>dist/js/demo.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url(); ?>plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url(); ?>plugins/toastr/toastr.min.js"></script>
<!-- jQuery Knob -->
<script src="<?php echo base_url(); ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- Ion Slider -->
<script src="<?php echo base_url(); ?>plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<!-- Bootstrap slider -->
<script src="<?php echo base_url(); ?>plugins/bootstrap-slider/bootstrap-slider.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url(); ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>plugins/select2/js/select2.full.min.js"></script>
<!--  libreria MQTT -->
<script src="<?php echo base_url(); ?>dist/js/mqtt.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo base_url(); ?>plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url(); ?>plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url(); ?>plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo base_url(); ?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- Sweetalert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script>
  $(function () {
    //Date range picker inicio
    $('#reservationdate').datetimepicker({
    	format: 'YYYY-MM-DD HH:mm',
    	pickDate: false,
        pickSeconds: false,
        pick12HourFormat: false,
        use24hours: true,
    });

    //Date range picker fin
    $('#reservationdate2').datetimepicker({
        format: 'YYYY-MM-DD HH:mm',
        pickDate: false,
        pickSeconds: false,
        pick12HourFormat: false,
        use24hours: true,
    });
    
  })
</script>

<!-- Sección de Script -->
<script type="text/javascript">

		$(function() {
				const Toast = Swal.mixin({
						toast: true,
						position: 'top-end',
						showConfirmButton: false,
						timer: 3000
				});

				//toast mostrarlo
				<?php if ($this->session->flashdata('success')) {?>
								toastr.success("<?php echo $this->session->flashdata('success'); ?>");
				<?php } else if ($this->session->flashdata('error')) {?>
								toastr.error("<?php echo $this->session->flashdata('error'); ?>");
				<?php } else if ($this->session->flashdata('warning')) {?>
								toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
				<?php } else if ($this->session->flashdata('info')) {?>
								toastr.info("<?php echo $this->session->flashdata('info'); ?>");
				<?php }?>

				//con esta funcion pasamos los paremtros a los text del modal.
				selDevice = function(idDevice, nombre, serie){
						//Aplicamos el valor de la variable al Titulo
						document.getElementById('titulo').innerHTML= 'Dispositivo: ' + nombre + ' Serie: ' + serie;
								//Aplicamos los valores a los imput del Modal
						$('#idupdate').val(idDevice);
						$('#nombreupdate').val(nombre);
						$('#serieupdate').val(serie);
				};

				//////////////////////////////////////////////////
				/* ION SLIDER poner todos los Ranges con los Ids de los dispositivos */
				const ids = [...document.querySelectorAll('.rang')].map(el => el.id);

					for (var i = 0; i < ids.length; i++) {

							$('#'+ids[i]).ionRangeSlider({
									type: "single",
									grid: true,
									min: 0,
									max: 100,
									prefix: "%"
							});

							//////////////////////////////////////////////////
							/* IN JQUERY KNOB */
							////////// Inicializamor el Plugin ///////////////
											$('.knobCPU'+ids[i]).knob({  });
											$('.knobTemp'+ids[i]).knob({  });
											$('.knobHum'+ids[i]).knob({  });
											$('.knobSenT'+ids[i]).knob({  });
							//console.log(ids[i]);
							//////////////////////////////////////////////////
							/* END JQUERY KNOB */

					}
				//////////////////////////////////////////////////
				//con esta funcion enviamos el comando del boton ON/OFF.
				setRelay = function(comando, id){

					//Comando de mqtt y el topic, para abrir y cerrar el Relay GPIO13 ESP32
					    if(comando == "on"){
	                      client.publish(id + "/command", 'on', (error) => {console.log(error || 'Abrir - GPIO13 ' + 'Device: ' + id)})
	                    }else
	                    if(comando == "off"){
                          client.publish(id + "/command", 'off', (error) => {console.log(error || 'Cerrar - GPIO13 ' + 'Device: ' + id)})
	                    }else
	                    if(comando == "on1"){
                          client.publish(id + "/command", 'on1', (error) => {console.log(error || 'Abrir - GPIO14 ' + 'Device: ' + id)})
	                    }else
	                    if(comando == "off1"){
                          client.publish(id + "/command", 'off1', (error) => {console.log(error || 'Cerrar - GPIO14 ' + 'Device: ' + id)})
	                    }

				};

                //con esta funcion pasamos valor del Slide al Dimmer por MQTT.
				process_dimmer = function(id){

				    var valor=$('#range_'+id).val();

				    client.publish(id + "/dimmer", valor, (error) => {console.log(error || 'Valor dimmer a --> ' + valor) });

				};
				
	   	        

});

//para configurar las tablas
$(function () {
    $("#table").DataTable({
		"responsive": true,
		"autoWidth": false,
		language: {
           "lengthMenu": "Mostrar _MENU_ registros por página",
           "zeroRecords": "No se encontraron resultados en su búsqueda",
           "searchPlaceholder": "Buscar",
           "info": "Registros de _START_ al _END_ de un total de  _TOTAL_ ",
           "infoEmpty": "No existen registros",
           "infoFiltered": "(filtrado de un total de _MAX_ registros)",
           "search": "Buscar:",
           "paginate": {
           "first": "Primero",
           "last": "Último",
           "next": "Siguiente",
           "previous": "Anterior"
            },
           "sProcessing":"Procesando...",
         }
    });
});

// Sección MQTT ///

		function process_msg(topic, message){

                    var msg = message.toString();
                    //00001/CASA/VALORES
                    var splitted_topic = topic.split("/");
                    var serial_number = splitted_topic[0];
                    var query = splitted_topic[1];

                            if (query == "valores"){

		                          var msg = message.toString();
		                          var sp = msg.split(",");
		                          var tempCPU = sp[0];
		                          var tempTemp = sp[1];
		                          var wifi = sp[2];
		                          var humHum = sp[3];
		                          var tempSenT = sp[4];
		                          var ipDevice = sp[5];	                      
		                          update_values(serial_number,tempCPU,tempTemp,wifi,humHum,tempSenT,ipDevice);

	                        } //fin valores

	                        if (query == "digital"){

		                          if (msg == "GPIO25ON"){
		                           $("#Alrange_"+serial_number).removeClass("btn btn-app bg-gradient-purple").addClass("btn btn-app bg-gradient-danger"); 
		                           // cambio la clase para resaltar rojo
		                           ///////////////////////////////////////////////////////////////////
				                      var d = new Date();
				                    /////// msg //////////////////////////////////
				                      $("#display_time3"+serial_number).html('GPIO25ON');
				                    ///////////////////////////////////////////////////////////////////
				                    /////// Date: 27/04/2020 00:00:00 //////////////////////////////////
				                      $("#display_time4"+serial_number).html(d.toLocaleString());
				                    ///////////////////////////////////////////////////////////////////
		                           }

		                          if (msg == "GPIO25OFF") {
		                           $("#Alrange_"+serial_number).removeClass("btn btn-app bg-gradient-danger").addClass("btn btn-app bg-gradient-purple"); 
		                           // cambio la clase para volver por defecto
		                           ///////////////////////////////////////////////////////////////////
				                      var d = new Date();
				                    /////// msg //////////////////////////////////
				                      $("#display_time3"+serial_number).html('GPIO25OFF');
				                    ///////////////////////////////////////////////////////////////////
				                    /////// Date: 27/04/2020 00:00:00 //////////////////////////////////
				                      $("#display_time4"+serial_number).html(d.toLocaleString());
				                    ///////////////////////////////////////////////////////////////////
		                           }

		                    } //fin digital

		                    if (query == "respuesta"){

		                    	if (msg == "on_ok") {

		                          $("#btnON_"+serial_number).removeClass("btn btn-app bg-gradient-success").addClass("btn btn-app bg-gradient-success disabled"); 

		                          $("#btnOFF_"+serial_number).removeClass("btn btn-app bg-gradient-danger disabled").addClass("btn btn-app bg-gradient-danger");

		                         }else if (msg == "off_ok") {

		                          $("#btnON_"+serial_number).removeClass("btn btn-app bg-gradient-success disabled").addClass("btn btn-app bg-gradient-success"); 

		                          $("#btnOFF_"+serial_number).removeClass("btn btn-app bg-gradient-danger").addClass("btn btn-app bg-gradient-danger disabled");

		                         }else if (msg == "off1_ok") {

		                          $("#btnON1_"+serial_number).removeClass("btn btn-app bg-gradient-success disabled").addClass("btn btn-app bg-gradient-success"); 

		                          $("#btnOFF1_"+serial_number).removeClass("btn btn-app bg-gradient-danger").addClass("btn btn-app bg-gradient-danger disabled");

		                         }else if (msg == "on1_ok") {

		                          $("#btnON1_"+serial_number).removeClass("btn btn-app bg-gradient-success").addClass("btn btn-app bg-gradient-success disabled"); 

		                          $("#btnOFF1_"+serial_number).removeClass("btn btn-app bg-gradient-danger disabled").addClass("btn btn-app bg-gradient-danger");

		                         }

		                         //$("input").removeAttr('disabled');

	                        } //fin de respuesta



                } //fin proccess_msg

         function update_values(serial_number,tempCPU,tempTemp,wifi,humHum,tempSenT,ipDevice){
                     
                    console.log('llego mensaje a update values')
                    console.log(serial_number,tempCPU,tempTemp,wifi,humHum,tempSenT,ipDevice)
                    //enviamos temp a CPU Gauge
                    $('.knobCPUrange_'+serial_number)
							.val(tempCPU)
							.trigger('change');
					//enviamos temp a CPU Gauge
                    $('.knobTemprange_'+serial_number)
							.val(tempTemp)
							.trigger('change');
					//enviamos temp a CPU Gauge
                    $('.knobHumrange_'+serial_number)
							.val(humHum)
							.trigger('change');
					//enviamos temp a CPU Gauge
                    $('.knobSenTrange_'+serial_number)
							.val(tempSenT)
							.trigger('change');

					$("#wifi_"+serial_number).html(wifi + ' dBm'); 
                    
                    /*
                    Más de -76 dBm (números más cercanos a 0) = Excelente
					Entre -89 y -77 = Muy buena
					Entre -97 y -90 = Buena/Media
					Entre -103 y -98 = Baja cobertura
					Entre -112 y -104 = Bajísima cobertura (problemas para establecer llamadas)
					Entre -113 y -132 dBm = Muy poca cobertura (problemas para establecer llamadas y rendimiento bajisimo)
					A partir de -135 = Sin cobertura */
					
					if (wifi >= -76) {
						$("#wifi2_"+serial_number).html('Exelente');
					}else
					if (wifi <= -77 && wifi > -89) {
						$("#wifi2_"+serial_number).html('Muy Buena');
					}else
					if (wifi <= -90 && wifi > -97) {
						$("#wifi2_"+serial_number).html('Buena/Media');
					}else
					if (wifi <= -98 && wifi > -103) {
						$("#wifi2_"+serial_number).html('Baja');
					}else
					if (wifi <= -104 && wifi > -112) {
						$("#wifi2_"+serial_number).html('Bajísima');
					}else
					if (wifi <= -113 && wifi > -132) {
						$("#wifi2_"+serial_number).html('Muy Poca');
					}else{
						$("#wifi2_"+serial_number).html('Sin Señal');
					}

					///////////////////////////////////////////////////////////////////
                      var d = new Date();
                    /////// Date: 27/04/2020 //////////////////////////////////
                      $("#display_time"+serial_number).html(d.toLocaleDateString());
                    ///////////////////////////////////////////////////////////////////
                    /////// Time: 00:00:00 //////////////////////////////////
                      $("#display_time2"+serial_number).html(d.toLocaleTimeString());
                    ///////////////////Pasamos la IP local al Display//////////////////
                      $("#display_ip"+serial_number).html(ipDevice);
					        
                }

        // Opciones para conectarnos al servidor MQTT
        
		const options = {

		      connectTimeout: 4000,
		      clientId: 'Web_Page_CE'+ Math.round(Math.random() * (0- 10000) * -1), //Número aleatorio evitamos que existan 2 o mas id idénticos
		      username: 'curso_iot', //free user demo
		      password: 'cubaelectronica', //free password demo
		      keepalive: 60,
		      clean: true,
		      
		}

        var connected = false;

		// Servidor Websocket seguro.
		const WebSocket_URL = 'wss://cubaelectronica.com:8094/mqtt'

		// Para realizar la conexión.
        const client = mqtt.connect(WebSocket_URL, options)

        // Nos conectamos al Servidor MQTT
		client.on('connect', () => {

		    console.log('Conectado al Servidor WSS CubaElectronica, MQTT, Curso_IOT - con Exito')

      	    // Nos suscribimos a los topicos de todos los dispositivos de la BD!!!
		    <?php if(!empty($dispositivos)):?>
               <?php foreach($dispositivos as $dispositivo):?>
	        
	           client.subscribe('<?php echo $dispositivo->device_serie?>/valores', { qos: 0 }, 
	           	(error) => {

			           		  if (!error) {
						        console.log('Suscripción exitosa! valores')
						        // Sacamos por consola los Serial ID de los dispositivos.
						        console.log('<?php echo $dispositivo->device_serie?>')
						      }else{
						        console.log('Suscripción fallida! valores')
						      }

	                       })
	           client.subscribe('<?php echo $dispositivo->device_serie?>/digital', { qos: 0 }, 
	           	(error) => {

			           		  if (!error) {
						        console.log('Suscripción exitosa! digital')
						        // Sacamos por consola los Serial ID de los dispositivos.
						        console.log('<?php echo $dispositivo->device_serie?>')
						      }else{
						        console.log('Suscripción fallida! digital')
						      }

	                       })
	           //Nos suscribimos a las respuestas de los comandos!!!
	           client.subscribe('<?php echo $dispositivo->device_serie?>/respuesta', { qos: 0 }, 
	           	(error) => {

			           		  if (!error) {
						        console.log('Suscripción exitosa! respuesta')
						        // Sacamos por consola los Serial ID de los dispositivos.
						        console.log('<?php echo $dispositivo->device_serie?>')
						      }else{
						        console.log('Suscripción fallida! respuesta')
						      }

	                       })

	           <?php endforeach;?>
	        <?php endif;?>

		    // Publicamos el primer Topico => publish(topic, payload, options/callback)
		    client.publish('curso', 'Primer Topic', (error) => {
		      console.log(error || 'Mensaje enviado!!!')
		    })

       })

		// Sacamos por consola los topicos que llegan!!!!
		client.on('message', (topic, message) => {
		  
		  console.log('Topico recibido =>  ', topic, ' -> ', message.toString())

		  // Mandamos a una función para procesar el mensaje!!!!
		  process_msg(topic, message);

		})

		client.on('reconnect', (error) => {
		    console.log('Error al reconectar', error)
		})

		client.on('error', (error) => {
		    console.log('Error de conexión:', error)
		})



</script>




</body>
</html>
