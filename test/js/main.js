$(document).ready(function(){
  var conn = new WebSocket('ws://192.168.43.133:8000');
  conn.onopen = function(e){
    console.log("Connection Established!");
  };

});
