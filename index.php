<?php  
session_start(); 
include('actions.php');
?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Jarvi</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/shoelace-css/1.0.0-beta16/shoelace.css">
        <link rel="stylesheet" href="styles.css">

    </head>
    <body>
    	<style type="text/css">
    		html, body {
			  display: -webkit-flex;
			  display: flex;
			  -webkit-flex-direction: column;
			  flex-direction: column;
			  -webkit-align-items: center;
			  align-items: center;
			  -webkit-justify-content: center;
			  justify-content: center;
			  width: 100%;
			  height: 100%;
			  background: #fff;
			}

			.logo {
			  position: relative;
			  width: 600px;
			  height: 220px;
			}

			.logo__orbit {
			  border: 25px solid;
			  position: absolute;
			}

			.logo__orbit--outer {
			  border-radius: 50%;
			  width: 200px;
			  height: 200px;
			  border-color: #000;
			}
			.logo__orbit--outer > .logo__electron {
			  top: 82.5px;
			  left: 82.5px;
			}
			@-moz-keyframes rotate1of4 {
			  0% {
			    -moz-transform: rotateZ(0deg) translateX(112.5px);
			    transform: rotateZ(0deg) translateX(112.5px);
			  }
			  100% {
			    -moz-transform: rotateZ(360deg) translateX(112.5px);
			    transform: rotateZ(360deg) translateX(112.5px);
			  }
			}
			@-webkit-keyframes rotate1of4 {
			  0% {
			    -webkit-transform: rotateZ(0deg) translateX(112.5px);
			    transform: rotateZ(0deg) translateX(112.5px);
			  }
			  100% {
			    -webkit-transform: rotateZ(360deg) translateX(112.5px);
			    transform: rotateZ(360deg) translateX(112.5px);
			  }
			}
			@keyframes rotate1of4 {
			  0% {
			    -moz-transform: rotateZ(0deg) translateX(112.5px);
			    -ms-transform: rotateZ(0deg) translateX(112.5px);
			    -webkit-transform: rotateZ(0deg) translateX(112.5px);
			    transform: rotateZ(0deg) translateX(112.5px);
			  }
			  100% {
			    -moz-transform: rotateZ(360deg) translateX(112.5px);
			    -ms-transform: rotateZ(360deg) translateX(112.5px);
			    -webkit-transform: rotateZ(360deg) translateX(112.5px);
			    transform: rotateZ(360deg) translateX(112.5px);
			  }
			}
			.logo__orbit--outer > .logo__electron:nth-child(1) {
			  -moz-animation: rotate1of4 4s infinite linear normal;
			  -webkit-animation: rotate1of4 4s infinite linear normal;
			  animation: rotate1of4 4s infinite linear normal;
			}
			@-moz-keyframes rotate2of4 {
			  0% {
			    -moz-transform: rotateZ(90deg) translateX(112.5px);
			    transform: rotateZ(90deg) translateX(112.5px);
			  }
			  100% {
			    -moz-transform: rotateZ(450deg) translateX(112.5px);
			    transform: rotateZ(450deg) translateX(112.5px);
			  }
			}
			@-webkit-keyframes rotate2of4 {
			  0% {
			    -webkit-transform: rotateZ(90deg) translateX(112.5px);
			    transform: rotateZ(90deg) translateX(112.5px);
			  }
			  100% {
			    -webkit-transform: rotateZ(450deg) translateX(112.5px);
			    transform: rotateZ(450deg) translateX(112.5px);
			  }
			}
			@keyframes rotate2of4 {
			  0% {
			    -moz-transform: rotateZ(90deg) translateX(112.5px);
			    -ms-transform: rotateZ(90deg) translateX(112.5px);
			    -webkit-transform: rotateZ(90deg) translateX(112.5px);
			    transform: rotateZ(90deg) translateX(112.5px);
			  }
			  100% {
			    -moz-transform: rotateZ(450deg) translateX(112.5px);
			    -ms-transform: rotateZ(450deg) translateX(112.5px);
			    -webkit-transform: rotateZ(450deg) translateX(112.5px);
			    transform: rotateZ(450deg) translateX(112.5px);
			  }
			}
			.logo__orbit--outer > .logo__electron:nth-child(2) {
			  -moz-animation: rotate2of4 4s infinite linear normal;
			  -webkit-animation: rotate2of4 4s infinite linear normal;
			  animation: rotate2of4 4s infinite linear normal;
			}
			@-moz-keyframes rotate3of4 {
			  0% {
			    -moz-transform: rotateZ(180deg) translateX(112.5px);
			    transform: rotateZ(180deg) translateX(112.5px);
			  }
			  100% {
			    -moz-transform: rotateZ(540deg) translateX(112.5px);
			    transform: rotateZ(540deg) translateX(112.5px);
			  }
			}
			@-webkit-keyframes rotate3of4 {
			  0% {
			    -webkit-transform: rotateZ(180deg) translateX(112.5px);
			    transform: rotateZ(180deg) translateX(112.5px);
			  }
			  100% {
			    -webkit-transform: rotateZ(540deg) translateX(112.5px);
			    transform: rotateZ(540deg) translateX(112.5px);
			  }
			}
			@keyframes rotate3of4 {
			  0% {
			    -moz-transform: rotateZ(180deg) translateX(112.5px);
			    -ms-transform: rotateZ(180deg) translateX(112.5px);
			    -webkit-transform: rotateZ(180deg) translateX(112.5px);
			    transform: rotateZ(180deg) translateX(112.5px);
			  }
			  100% {
			    -moz-transform: rotateZ(540deg) translateX(112.5px);
			    -ms-transform: rotateZ(540deg) translateX(112.5px);
			    -webkit-transform: rotateZ(540deg) translateX(112.5px);
			    transform: rotateZ(540deg) translateX(112.5px);
			  }
			}
			.logo__orbit--outer > .logo__electron:nth-child(3) {
			  -moz-animation: rotate3of4 4s infinite linear normal;
			  -webkit-animation: rotate3of4 4s infinite linear normal;
			  animation: rotate3of4 4s infinite linear normal;
			}
			@-moz-keyframes rotate4of4 {
			  0% {
			    -moz-transform: rotateZ(270deg) translateX(112.5px);
			    transform: rotateZ(270deg) translateX(112.5px);
			  }
			  100% {
			    -moz-transform: rotateZ(630deg) translateX(112.5px);
			    transform: rotateZ(630deg) translateX(112.5px);
			  }
			}
			@-webkit-keyframes rotate4of4 {
			  0% {
			    -webkit-transform: rotateZ(270deg) translateX(112.5px);
			    transform: rotateZ(270deg) translateX(112.5px);
			  }
			  100% {
			    -webkit-transform: rotateZ(630deg) translateX(112.5px);
			    transform: rotateZ(630deg) translateX(112.5px);
			  }
			}
			@keyframes rotate4of4 {
			  0% {
			    -moz-transform: rotateZ(270deg) translateX(112.5px);
			    -ms-transform: rotateZ(270deg) translateX(112.5px);
			    -webkit-transform: rotateZ(270deg) translateX(112.5px);
			    transform: rotateZ(270deg) translateX(112.5px);
			  }
			  100% {
			    -moz-transform: rotateZ(630deg) translateX(112.5px);
			    -ms-transform: rotateZ(630deg) translateX(112.5px);
			    -webkit-transform: rotateZ(630deg) translateX(112.5px);
			    transform: rotateZ(630deg) translateX(112.5px);
			  }
			}
			.logo__orbit--outer > .logo__electron:nth-child(4) {
			  -moz-animation: rotate4of4 4s infinite linear normal;
			  -webkit-animation: rotate4of4 4s infinite linear normal;
			  animation: rotate4of4 4s infinite linear normal;
			}

			.logo__orbit--inner {
			  border-radius: 50%;
			  width: 100px;
			  height: 100px;
			  position: absolute;
			  top: 25px;
			  left: 25px;
			  border-color: #FD8204;
			}
			.logo__orbit--inner > .logo__electron {
			  top: 32.5px;
			  left: 32.5px;
			}
			@-moz-keyframes rotate1of2 {
			  0% {
			    -moz-transform: rotateZ(0deg) translateX(62.5px);
			    transform: rotateZ(0deg) translateX(62.5px);
			  }
			  100% {
			    -moz-transform: rotateZ(360deg) translateX(62.5px);
			    transform: rotateZ(360deg) translateX(62.5px);
			  }
			}
			@-webkit-keyframes rotate1of2 {
			  0% {
			    -webkit-transform: rotateZ(0deg) translateX(62.5px);
			    transform: rotateZ(0deg) translateX(62.5px);
			  }
			  100% {
			    -webkit-transform: rotateZ(360deg) translateX(62.5px);
			    transform: rotateZ(360deg) translateX(62.5px);
			  }
			}
			@keyframes rotate1of2 {
			  0% {
			    -moz-transform: rotateZ(0deg) translateX(62.5px);
			    -ms-transform: rotateZ(0deg) translateX(62.5px);
			    -webkit-transform: rotateZ(0deg) translateX(62.5px);
			    transform: rotateZ(0deg) translateX(62.5px);
			  }
			  100% {
			    -moz-transform: rotateZ(360deg) translateX(62.5px);
			    -ms-transform: rotateZ(360deg) translateX(62.5px);
			    -webkit-transform: rotateZ(360deg) translateX(62.5px);
			    transform: rotateZ(360deg) translateX(62.5px);
			  }
			}
			.logo__orbit--inner > .logo__electron:nth-child(1) {
			  -moz-animation: rotate1of2 4s infinite linear reverse;
			  -webkit-animation: rotate1of2 4s infinite linear reverse;
			  animation: rotate1of2 4s infinite linear reverse;
			}
			@-moz-keyframes rotate2of2 {
			  0% {
			    -moz-transform: rotateZ(180deg) translateX(62.5px);
			    transform: rotateZ(180deg) translateX(62.5px);
			  }
			  100% {
			    -moz-transform: rotateZ(540deg) translateX(62.5px);
			    transform: rotateZ(540deg) translateX(62.5px);
			  }
			}
			@-webkit-keyframes rotate2of2 {
			  0% {
			    -webkit-transform: rotateZ(180deg) translateX(62.5px);
			    transform: rotateZ(180deg) translateX(62.5px);
			  }
			  100% {
			    -webkit-transform: rotateZ(540deg) translateX(62.5px);
			    transform: rotateZ(540deg) translateX(62.5px);
			  }
			}
			@keyframes rotate2of2 {
			  0% {
			    -moz-transform: rotateZ(180deg) translateX(62.5px);
			    -ms-transform: rotateZ(180deg) translateX(62.5px);
			    -webkit-transform: rotateZ(180deg) translateX(62.5px);
			    transform: rotateZ(180deg) translateX(62.5px);
			  }
			  100% {
			    -moz-transform: rotateZ(540deg) translateX(62.5px);
			    -ms-transform: rotateZ(540deg) translateX(62.5px);
			    -webkit-transform: rotateZ(540deg) translateX(62.5px);
			    transform: rotateZ(540deg) translateX(62.5px);
			  }
			}
			.logo__orbit--inner > .logo__electron:nth-child(2) {
			  -moz-animation: rotate2of2 4s infinite linear reverse;
			  -webkit-animation: rotate2of2 4s infinite linear reverse;
			  animation: rotate2of2 4s infinite linear reverse;
			}

			.logo__electron {
			  border-radius: 50%;
			  width: 25px;
			  height: 25px;
			  position: absolute;
			  background: #FD8204;
			  border: 5px #000 solid;
			}

			.logo__arbon {
			  position: absolute;
			  top: 7px;
			  left: 198px;
			}

			#start-record-btn{
				background:#FD8204;
				color: black;
			}
		</style>
        <div class="container">

            <div class="app"> 
                <div class="logo">
				  <div class="logo__orbit logo__orbit--outer">
				    <div class="logo__electron"></div>
				    <div class="logo__electron"></div>
				    <div class="logo__electron"></div>
				    <div class="logo__electron"></div>
				    <div class="logo__orbit logo__orbit--inner">
				      <div class="logo__electron"></div>
				      <div class="logo__electron"></div>
				    </div>
				  </div>
				  <img class="logo__arbon" src="media/imgs/jarvi.png" />
				</div>
                <div class="input-single">
                    <textarea id="note-textarea" placeholder="Jarvi chat" rows="6"></textarea>
                </div>         
                <button id="start-record-btn" title="Start Recording">Speak</button>
                <p id="recording-instructions">Press the <strong>Speak</strong> button to talk.</p>
                <?php 
				    if(empty($_SESSION['usuario_nombre'])) { // comprobamos que las variables de sesión estén vacías         
				?> 
				    <p>For Start Session say "Identify"(English) or "Identificame"(Spanish).</p>                        
				<?php 
				    }else if(isset($_SESSION['usuario_nombre'])) { 
				?> 
				        <p>Hi <strong><?=$_SESSION['usuario_nombre']?></strong> | <a href="#!">LogOut</a></p> 
				<?php 
				    } 
				?>
            </div>

        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
        <script src="http://client1tpv.aitssc.com/media/js/jquery.min.js"></script>
        <script src="script.js"></script>

    </body>
</html>


