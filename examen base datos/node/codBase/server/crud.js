var Usuario = require('./modelUsuarios.js')
module.exports.crearUsuarioDemo = function(callback){ 
  var arr = [{ email: 'alison@mail.com', user: "alison", password: "123456"}, { email: 'nicole@mail.com', user: "nicole", password: "123456"}];
  Usuario.insertMany(arr, function(error, docs) { 
    if (error){ 
      if (error.code == 11000){ 
        callback("Utilice los siguientes datos: </br>usuario: alison | password:123456 </br>usuario: nicole | password:123456")
      }else{
        callback(error.message)
      }
    }else{
      callback(null, "El usuario 'alison ' y 'nicole' se ha registrado correctamente. </br>usuario: alison | password:123456 </br >usuario: nicole | password:123456")
    }
  });
}
