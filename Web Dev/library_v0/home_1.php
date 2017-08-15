<!DOCTYPE html>
<html>

<head>
  <title>Nice image capture button</title>
  <style>
  label.cameraButton {
  display: inline-block;
  margin: 1em 0;

  /* Styles to make it look like a button */
  padding: 0.5em;
  border: 2px solid #666;
  border-color: #EEE #CCC #CCC #EEE;
  background-color: #DDD;
}

/* Look like a clicked/depressed button */
label.cameraButton:active {
  border-color: #CCC #EEE #EEE #CCC;
}

/* This is the part that actually hides the 'Choose file' text box for camera inputs */
label.cameraButton input[accept*="camera"] {
  display: none;
}
</style>
</head>

<body>
  <video autoplay id="vid" style="display:none;"></video>
<canvas id="canvas" width="1280" height="720" style="border:1px solid #d3d3d3;"></canvas><br>
<button onclick="runUpdateScreenShort();">Take Picture</button>
<button onclick="stopUpdateScreenShort();">Take Picture</button>

<script type="text/javascript">
    var video = document.querySelector("#vid");
    var canvas = document.querySelector('#canvas');
    var ctx = canvas.getContext('2d');
    var localMediaStream = null;

var vgaConstraints = {
    video: {
        mandatory: {
            maxWidth: 640,
            maxHeight: 480,
            /*Added by Chad*/
            minWidth: 640,
            minHeight: 480
        }
    }
};

var hdConstraints = {
    video: {
        mandatory: {
            minWidth: 1280,
            minHeight: 720,
            /*Added by Chad*/
            maxWidth: 1280,
            maxHeight: 720
        }
    }
};

    var onCameraFail = function (e) {
        console.log('Camera did not work.', e);
    };

    function snapshot() {
        if (localMediaStream) {
            ctx.drawImage(video, 0, 0);
        }
    }

    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
    window.URL = window.URL || window.webkitURL;
    navigator.getUserMedia(hdConstraints, function (stream) {
        video.src = window.URL.createObjectURL(stream);
        localMediaStream = stream;
    }, onCameraFail);

var interval;
function runUpdateScreenShort(){
    
    
    interval =  setInterval(function(){ snapshot(); }, 100);
   // setInterval(,1000);
}

function stopUpdateScreenShort(){
    clearInterval(interval);
}

</script>

<h1>Upload Canvas Data to PHP Server</h1>
		<canvas width="80" height="80" id="canva s">canvas</canvas>
		<script type="text/javascript">
			window.onload = function() {
				var canvas = document.getElementById("canvas");
				var context = canvas.getContext("2d");
				context.rect(0, 0, 80, 80);
				context.fillStyle = 'yellow';
				context.fill();
			}
		</script>

		<div>
			<input type="button" onclick="uploadEx()" value="Upload" />
		</div>

		<form method="post" accept-charset="utf-8" name="form1">
			<input name="hidden_data" id='hidden_data' type="hidden"/>
		</form>

		<script>
			function uploadEx() {
				var canvas = document.getElementById("canvas");
				var dataURL = canvas.toDataURL("image/png");
				document.getElementById('hidden_data').value = dataURL;
				var fd = new FormData(document.forms["form1"]);

				var xhr = new XMLHttpRequest();
				xhr.open('POST', 'upload_data.php', true);

				xhr.upload.onprogress = function(e) {
					if (e.lengthComputable) {
						var percentComplete = (e.loaded / e.total) * 100;
						console.log(percentComplete + '% uploaded');
						alert('Succesfully uploaded');
					}
				};

				xhr.onload = function() {

				};
				xhr.send(fd);
			};
		</script>
</body>

</html>