<script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.2/mqttws31.min.js" type="text/javascript"></script>
<script type="text/javascript">

const MQTTbroker = '3.239.41.191';
  var client = new Paho.MQTT.Client(MQTTbroker, 9099, "myclientid_" + parseInt(Math.random() * 100, 10));

  //mqtt connecton options including the mqtt broker subscriptions
  client.connect({
    onSuccess: function () {
      console.log("mqtt connected");
      client.subscribe("nodemcu/connect");
      client.subscribe("nodemcu/disconnect");
      client.subscribe("nodemcu/dis");
      client.subscribe("nodemcu/mac");

      client.onMessageArrived = onMessageArrived;
      client.onConnectionLost = onConnectionLost;
    },
    onFailure: function (message) {
      console.log("Connection failed, ERROR: " + message.errorMessage);
      //window.setTimeout(location.reload(),20000); //wait 20seconds before trying to connect again.
    }
  });
  
  function onConnectionLost(responseObject) {
    console.log("connection lost: " + responseObject.errorMessage);
    //window.setTimeout(location.reload(),20000); //wait 20seconds before trying to connect again.
  };

  function onMessageArrived(message) {
    console.log(message.destinationName, '',message.payloadString);
  }

  function publishMQTT_Connect(message){
    // alert(message);
    var cond = message.toString();
    // alert(cond);
    message = new Paho.MQTT.Message(cond);
    message.destinationName = "nodemcu/connect";
    client.send(message);
    
  }
  
  function publishMQTT_Disconnect(message){
    // alert(message);
    var cond = message.toString();
    // alert(cond);
    message = new Paho.MQTT.Message(cond);
    message.destinationName = "nodemcu/disconnect";
    client.send(message);
    
  }

  function publishMQTT_Mac(){
    var macNumber = document.getElementById('id_perangkat').selectedOptions[0].value;
    // alert(macNumber);
    // var macDis = document.getElementById('macadd').textContent;
    // if(!empty(macNumber)){
    message = new Paho.MQTT.Message(macNumber);
    //   alert(message);
    // } if(!empty(macDis)){
    //   message = new Paho.MQTT.Message(macDis);
    // }
    message.destinationName = "nodemcu/mac";
    client.send(message);
    
  }

  function publishMQTT_Dis(message){
    // var macDis = document.getElementById('macadd').textContent;
    var macDis = message.toString();
    message = new Paho.MQTT.Message(macDis);
    // alert(macDis);
    message.destinationName = "nodemcu/dis";
    client.send(message);
  }

</script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.js" data-turbolinks-track="true"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Knob/1.2.13/jquery.knob.min.js" integrity="sha512-NhRZzPdzMOMf005Xmd4JonwPftz4Pe99mRVcFeRDcdCtfjv46zPIi/7ZKScbpHD/V0HB1Eb+ZWigMqw94VUVaw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
