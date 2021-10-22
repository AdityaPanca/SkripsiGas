<script src="https://cdn.jsdelivr.net/npm/moment@2.24.0/min/moment.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-streaming@1.8.0"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.js" data-turbolinks-track="true"></script>
<script>
    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
</script>

    <script type="text/javascript">
            function showTime() {
                var a_p = "";
                var today = new Date();
                var curr_hour = today.getHours();
                var curr_minute = today.getMinutes();
                var curr_second = today.getSeconds();
                if (curr_hour < 12) {
                    a_p = "AM";
                } else {
                    a_p = "PM";
                }
                if (curr_hour == 0) {
                    curr_hour = 12;
                }
                if (curr_hour > 12) {
                    curr_hour = curr_hour - 12;
                }
                curr_hour = checkTime(curr_hour);
                curr_minute = checkTime(curr_minute);
                curr_second = checkTime(curr_second);
                document.getElementById('time').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
            }
             
            function checkTime(i) {
                if (i < 10) {
                    i = "0" + i;
                }
                return i;
            }
            setInterval(showTime, 500);         
    </script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.2/mqttws31.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        var MQTTbroker = '3.239.41.191';
	    // var dataTopics = new Array();
        var messagePayloadTemperature = 0;
        var messagePayloadHumidity = 0;
        var messagePayloadMq = 0;

        var client = new Paho.MQTT.Client(MQTTbroker, 9099, "myclientid_" + parseInt(Math.random() * 100, 10));
        
        //mqtt connecton options including the mqtt broker subscriptions
        client.connect ({
            onSuccess: function () {
                console.log("mqtt connected");
                // Connection succeeded; subscribe to our topics
                // client.subscribe(MQTTsubTopic, {qos: 1});
                client.subscribe("gas/iot/temperature");
                client.subscribe("gas/iot/humidity");
                client.subscribe("gas/iot/mq");
                client.subscribe("gas/iot/mac"); 
                client.subscribe("nodemcu/kipas");
                client.subscribe("nodemcu/buzzer");
                client.subscribe("nodemcu/manual");
                client.subscribe("nodemcu/device");
                //topic mac address

                client.onMessageArrived = onMessageArrived;
                client.onConnectionLost = onConnectionLost;
            },

            onFailure: function (message) {
                console.log("Connection failed, ERROR: " + message.errorMessage);
                //window.setTimeout(location.reload(),20000); //wait 20seconds before trying to connect again.
            }
        });

        //can be used to reconnect on connection lost
        function onConnectionLost(responseObject) {
            console.log("connection lost: " + responseObject.errorMessage);
            //window.setTimeout(location.reload(),20000); //wait 20seconds before trying to connect again.
        };

        //what is done when a message arrives from the broker
        function onMessageArrived(message) {
            console.log(message.destinationName, '',message.payloadString);

            //check if it is a new topic, if not add it to the array
            
            if(message.destinationName == "gas/iot/temperature"){
                console.log("Message Arrived : " + message.payloadString);
                // document.getElementById("temperature").innerHTML = '<span>' + message.payloadString +' </span>';
                messagePayloadTemperature = parseInt(message.payloadString);
                // Creating a cookie after the document is ready
                $(document).ready(function () {
                    createCookie("suhu", messagePayloadTemperature, "10");
                });
                    
                // Function to create the cookie
                function createCookie(name, value, days) {
                    var expires;
                        
                    if (days) {
                        var date = new Date();
                        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                        expires = "; expires=" + date.toGMTString();
                    }
                    else {
                        expires = "";
                    }
                        
                    document.cookie = escape(name) + "=" + 
                        escape(value) + expires + "; path=/";
                }
                console.log("Temperature: " + messagePayloadTemperature);

            } if(message.destinationName == "gas/iot/humidity"){
                console.log("Message Arrived : " + message.payloadString);
                // document.getElementById("humidity").innerHTML = '<span>' + message.payloadString +' </span>';
                messagePayloadHumidity = parseInt(message.payloadString);
                // Creating a cookie after the document is ready
                $(document).ready(function () {
                    createCookie("hum", messagePayloadHumidity, "10");
                });
                    
                // Function to create the cookie
                function createCookie(name, value, days) {
                    var expires;
                        
                    if (days) {
                        var date = new Date();
                        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                        expires = "; expires=" + date.toGMTString();
                    }
                    else {
                        expires = "";
                    }
                        
                    document.cookie = escape(name) + "=" + 
                        escape(value) + expires + "; path=/";
                }
                console.log("Humidity: " + messagePayloadHumidity);

            } if(message.destinationName == "gas/iot/mq"){
                console.log("Message Arrived : " + message.payloadString);
                // document.getElementById("mq2").innerHTML = '<span>' + message.payloadString +' </span>';
                messagePayloadMq = parseInt(message.payloadString);
                // Creating a cookie after the document is ready
                $(document).ready(function () {
                    createCookie("gas", messagePayloadMq, "10");
                });
                    
                // Function to create the cookie
                function createCookie(name, value, days) {
                    var expires;
                        
                    if (days) {
                        var date = new Date();
                        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                        expires = "; expires=" + date.toGMTString();
                    }
                    else {
                        expires = "";
                    }
                        
                    document.cookie = escape(name) + "=" + 
                        escape(value) + expires + "; path=/";
                }
                console.log("mq2: " + messagePayloadMq);
            }
            if(message.destinationName== "gas/iot/mac"){
                console.log("Message Arrived: " + message.payloadString);
                // document.getElementById("coba").innerHTML  = '<span>' +message.payloadString +' </span>';
                messagePayloadMac = message.PayloadString;
                if(message.payloadString == <?php echo json_encode($_SESSION["id_perangkat"]);?>){
                    // document.getElementById("coba").innerHTML  = '<span>' +message.payloadString +' </span>';
                    document.getElementById("temperature").innerHTML  = '<span>' +messagePayloadTemperature +' </span>';
                    document.getElementById("humidity").innerHTML  = '<span>' +messagePayloadHumidity +' </span>';
                    document.getElementById("mq").innerHTML  = '<span>' +messagePayloadMq +' </span>';
                }
            } 
        };

        function publishToMQTT(message) {
            message = new Paho.MQTT.Message(message ? "1" : "0");
            message.destinationName = "nodemcu/manual";
            client.send(message);
        }

        function publishToMQTT_Kipas(message) {
            message = new Paho.MQTT.Message(message);
            message.destinationName = "nodemcu/kipas";
            client.send(message);
        }

        function publishToMQTT_Buzzer(message) {
            message = new Paho.MQTT.Message(message);
            message.destinationName = "nodemcu/buzzer";
            client.send(message);
        }
        function publishToMQTT_de() {
            var device = <?php echo json_encode($_SESSION["id_perangkat"]);?>;
            message = new Paho.MQTT.Message(device);
            message.destinationName = "nodemcu/device";
            client.send(message);
        }
        $(document).ready(function () {
            $("#manualBtn").bootstrapSwitch();

            $('#manualBtn').on('switchChange.bootstrapSwitch', function (event, state) {
                publishToMQTT(state);
                publishToMQTT_de();
            });
        });
        
        $(document).ready(function () {
            setInterval(function() {
                $("#kipas").load('sugeno.php');
            }, 10000);
            setInterval(function() {
                publishToMQTT_Kipas(document.getElementById("kipas").innerHTML);
            }, 10000);

            setInterval(function() {
                $("#buzzer").load('sugeno2.php');
            }, 10000);
            setInterval(function() {
                publishToMQTT_Buzzer(document.getElementById("buzzer").innerHTML);
            }, 10000);
        });

        function refreshTemperature(chart){
            chart.config.data.datasets.forEach(function (dataset){
                dataset.data.push({
                    x: Date.now(),
                    y: messagePayloadTemperature
                });
            });
        }

        function onrefreshHum(chart){
            chart.config.data.datasets.forEach(function (dataset){
                dataset.data.push({
                    x: Date.now(),
                    y: messagePayloadHumidity
                })
            });
        }

        function onrefreshMq(chart){
            chart.config.data.datasets.forEach(function (dataset){
                dataset.data.push({
                    x: Date.now(),
                    y: messagePayloadMq
                })
            });
        }
        var chartColors = {
            red: 'rgb(255, 99, 132)',
            orange: 'rgb(255, 159, 64)',
            yellow: 'rgb(255, 205, 86)',
            green: 'rgb(75, 192, 192)',
            blue: 'rgb(54, 162, 235)',
            purple: 'rgb(153, 102, 255)',
            grey: 'rgb(201, 203, 207)'
        };
        var color = Chart.helpers.color;
        var configTemperature = {
            type: 'line',
            data: {
                datasets: [{
                    label: 'Temperature',
			        backgroundColor: color(chartColors.red).alpha(0.5).rgbString(),
                    borderColor: chartColors.yellow,
                    fill: false,
                    // lineTension: 0,
                    // borderDash: [8, 4],
                    data: []
                }]
            },
            options: {
                title: {
                    display: true,
                    // text: "Temperature"
                },
                scales: {
                    xAxes: [{
                        type: 'realtime',
                        realtime: {
                            duration: 20000,
                            refresh: 2000,
                            delay: 3000,
                            onRefresh: refreshTemperature
                        }
                    }],
                    yAxis: [{
                        title: {
                            display: true,
                            text: 'Value'
                        }
                    }]
                },
                tooltips: {
                    mode: 'nearest',
                    intersect: false
                },
                hover: {
                    mode: 'nearest',
                    intersect: false
                }
            }
        };

        var configHumidity = {
            type: 'line',
            data: {
                datasets: [{
                    label: 'Humidity',
			        backgroundColor: color(chartColors.grey).alpha(0.5).rgbString(),
                    borderColor: chartColors.blue,
                    fill: false,
                    // lineTension: 0,
                    // borderDash: [8, 4],
                    data: []
                }]
            },
            options: {
                title: {
                    display: true,
                    // text: "Temperature"
                },
                scales: {
                    xAxes: [{
                        type: 'realtime',
                        realtime: {
                            duration: 20000,
                            refresh: 2000,
                            delay: 3000,
                            onRefresh: onrefreshHum
                        }
                    }],
                    yAxis: [{
                        title: {
                            display: true,
                            text: 'Value'
                        }
                    }]
                },
                tooltips: {
                    mode: 'nearest',
                    intersect: false
                },
                hover: {
                    mode: 'nearest',
                    intersect: false
                }
            }
        };

        var configMq = {
            type: 'line',
            data: {
                datasets: [{
                    label: 'Gas',
			        backgroundColor: color(chartColors.yellow).alpha(0.5).rgbString(),
                    borderColor: chartColors.orange,
                    fill: false,
                    // lineTension: 0,
                    // borderDash: [8, 4],
                    data: []
                }]
            },
            options: {
                title: {
                    display: true,
                    // text: "Temperature"
                },
                scales: {
                    xAxes: [{
                        type: 'realtime',
                        realtime: {
                            duration: 20000,
                            refresh: 2000,
                            delay: 3000,
                            onRefresh: onrefreshMq
                        }
                    }],
                    yAxis: [{
                        title: {
                            display: true,
                            text: 'Value'
                        }
                    }]
                },
                tooltips: {
                    mode: 'nearest',
                    intersect: false
                },
                hover: {
                    mode: 'nearest',
                    intersect: false
                }
            }
        };

        window.onload = function() {
            var ctx = document.getElementById("ChartTemperature").getContext("2d");
            window.ChartTemperature = new Chart(ctx, configTemperature);
            var ctx1 = document.getElementById("ChartHumidity").getContext("2d");
            window.ChartHumidity = new Chart(ctx1, configHumidity);
            var ctx2 = document.getElementById("ChartMq").getContext("2d");
            window.ChartMq = new Chart(ctx2, configMq);
        };
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.js" data-turbolinks-track="true"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Knob/1.2.13/jquery.knob.min.js" integrity="sha512-NhRZzPdzMOMf005Xmd4JonwPftz4Pe99mRVcFeRDcdCtfjv46zPIi/7ZKScbpHD/V0HB1Eb+ZWigMqw94VUVaw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/jquery.vmap.min.js" integrity="sha512-Zk7h8Wpn6b9LpplWXq1qXpnzJl8gHPfZFf8+aR4aO/4bcOD5+/Si4iNu9qE38/t/j1qFKJ08KWX34d2xmG0jrA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Bootstrap Switch -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.js" data-turbolinks-track="true"></script>
