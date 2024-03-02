<?php

echo '
<p>Conversor data - timestamp</p>
<span>Data(YYYY/MM/DD)</span><br />
<input type="text" id="data" />
<button id="btn_data" onClick="data_time();">Converter</button>

<br />

<span>Timestamp</span><br />
<input type="text" id="timestamp" />
<button id="btn_timestamp" onClick="time_data();">Converter</button>';

?>

<script>

function data_time(){
var data = document.getElementById('data').value;
alert(Math.round(new Date(data).getTime()/1000));  
}

function time_data(){
var time= document.getElementById('timestamp').value;
var d = new Date(time*1000);
alert(d);
}

</script>



