$(document).ready(function(){
  var conn = new WebSocket('ws://localhost:8080');
  conn.onopen = function(e){
    console.log("Connection Established!");
  };

});
