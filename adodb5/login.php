<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
	<meta charset="utf-8" />
  	<meta name="viewport" content="width=device-width" />
  	<title>PrepaNet</title>
	<link rel="stylesheet" href="normalize.css" />
  	<link rel="stylesheet" href="foundation.css" />
    <script src="custom.modernizr.js"></script>
    
    
    
    
</head>
<body style="width:100%; height:100%; background-color:#E2E2E2;">
    <nav class="top-bar row" style=" z-index:25; left: 50%; margin-left: -480px;">
    	<ul class="title-area">
        	<li class="name">
          		<img src="header.png"></img>
        	</li>
        	
      	</ul>
      	<section class="top-bar-section">
        	<!-- Right Nav Section -->
        	<ul class="right" style="text-align:right;">
            		<h1 style="color:#FFF; font-family:Arial, Helvetica, sans-serif; text-shadow:black 0.1em 0.1em 0.2em; margin-bottom:0px;">PrepaNet</h1>
					<h5 style="color:#FFF; font-family:Arial, Helvetica, sans-serif; text-shadow:black 0.2em 0.2em 0.4em; margin-top:0px;">Sistema de Inscripciones</h5>
        	</u>
    	</section>
    </nav>
        <div style="width: 100%; height:100px; position:fixed; padding:20px; background-image:-webkit-gradient(linear, left top, left bottom, color-stop(0, #0078a7), color-stop(1, #005e7e)); z-index:20;"></div>
    
    
    <div style="width: 100%; height:20px; top:100px; position:fixed; padding:20px; background-image:-webkit-gradient(linear, left top, left bottom, color-stop(0, #004973), color-stop(1, #002f57)); z-index:19; box-shadow: 0px 5px 15px #555;">
    	<div class="row" style="position:absolute;  padding:5px; top:0px;  left: 50%; margin-left: -220px; width:700px; margin-top:7px; color:#FFF">
        
        <!-- Opciones del menú -->
        
        </div>
    </div>
    <!-- 
    ================
     Termina top-bar
    ================
    -->
	<div class="row" style="position:absolute; background-color:#FFF; top:100px; padding:5px; left: 50%; margin-left: -480px;border: 1px solid #AAA; height:500px;">
	
    <div style="width: 300px; position:relative; left: 50%; margin-left: -150px; top:100px; padding:20px; background-color:#E2E2E2; z-index:15; border-radius: 4px; border: 1px solid #AAA;
">
        <form method="post" action="index.php">
            <h3>Iniciar Sesión</h3>
            <div class="row">
                <div class="large-12 columns">
                    <label>Matrícula</label>
                    <input type="text" placeholder="A01234567">
                </div>
            </div>
            <div class="row">
                <div class="large-12 columns">
                    <label>Contraseña</label>
                    <input type="password" placeholder="******">
                </div>
            </div>            
            <div class="row" style="text-align:center;">
            	<? 
				include 'adodb5/adodb.inc.php';
	$c = oci_pconnect("A01225649", "tec649", "info.gda.itesm.mx");

$s = oci_parse($c, 'select * from alumno');
oci_execute($s);
oci_fetch_all($s, $res);
echo "<pre>\n";
var_dump($res);
echo "</pre>\n";
				?>
                    <input type="submit" value="Ingresar" style="height: 25px; width: 100px;">
            </div>
        </form>
        <a style="text-decoration:none; color:#000; font-size:11px; float:right; " href="reserPassword.php">Recuperar contraseña</a>
    </div>
    <!--Termina div de login-->
    </div><!-- Termina div principal (Blanco)-->


    
    	<!--<div style="width: 960px; height:200px; position:absolute; left: 50%; margin-left: -480px; top:550px; padding:20px; background-color:rgba(200,200,200,0.9); z-index:15; border-radius: 10px;
">
  	<h2>Texto</h2>
    <hr>
    <h5>PrepaNet: sistema de inscripciones.</h5>
    </div>-->
    
    



	<script>
    document.write('<script src=' +
    ('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') +
    '.js><\/script>')
    </script> 
    <script src="foundation.min.js"></script>

	
	</div>
	<script>
    	$(document).foundation();
	</script>
</body>
</html>
