const mysql = require('mysql');
const mqtt = require('mqtt');

var con = mysql.createConnection({
    host: "*****", // Servidor 
    user: "******",  // Usuario
    password: "*****", // Contraseña
    database: "*****" // Base de datos
});

con.connect(function (err) {

    if (err) throw err;

    console.log("Conexión a MySQL OK");
    
});

var options = {

    port: 1883,
    host: 'cubaelectronica.com', // servidor
    clientId: 'MQTT_Node', // ID Cliente
    username: 'curso_iot', // Usuario
    password: 'cubaelectronica', // Contraseña
    keepalive: 60
    
};



var client = mqtt.connect("mqtt://cubaelectronica.com", options);

client.on('connect', function(){

   console.log("Conexión a MQTT");

   client.subscribe('+/#', function(err){
     
      console.log("Suscripción Exitosa a todos los topicos");

   })

});

client.on('message', function(topic, message){

      console.log("Topico " + topic + "\nMensaje " + message.toString());

      var topic_splitter = topic.split("/");
      var device_id = topic_splitter[0];
      var topico = topic_splitter[1];

      switch (topico) {
          case "valores":
              var query = "SELECT device_id FROM `devices` WHERE device_serie = '" + device_id + "'";

              con.query(query, function(err, result,fields){
                   
                 console.log(result);
                  if (err) throw err;
                   
                  var mensaje = message.toString();
                  var msg = mensaje.split(",");
                  var tempcpu = msg[0];
                  var tempdht = msg[1];
                  var wifi = msg[2];
                  var humdht = msg[3];
                  var inddht = msg[4];
                 
                  var query1 = "INSERT INTO `data`(`data_device_id`, `data_temp_cpu`, `data_temp_dht`, `data_hum_dht`, `data_ind_dht`, `data_wifi`) VALUES ("+result[0].device_id+","+tempcpu+","+tempdht+","+humdht+","+inddht+","+wifi+")";
                  con.query(query1, function (err, result, fields) {
                      if (err) throw err;
                        console.log("Registro Guardado en la Base de Datos");
                
                  })

              })
              break;
          case "command":
              console.log("comando que llegó");
              break;
          default:
              console.log("Otro topico");
              break;
      }

});

setInterval(function () {
    con.ping(function (err) {
        if (err) throw err;
        //console.log('Server responded to ping');
    });
}, 5000);









