<?php
    include_once 'conexion.php';

    $sql = "SELECT * FROM contacto";
    $resultado = mysqli_query($con,$sql);
    
    if ($fila=mysqli_fetch_assoc($resultado))
    {
        $telphone=$fila['tel'];
        $telwhatsapp=$fila['whatsapp'];
    }
?>

<script>
    var tel="<?php echo $telphone?>";
    tel="521"+tel;
</script>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API´s</title>

    <link rel="stylesheet" href="css/style.css">
    
    <script src="https://kit.fontawesome.com/ab4fa16bfb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/floating-wpp.min.css"> 
 
</head>

<style>

.burbuja-whatsapp{
    width: 7vmin;   
}

.burbujas{
    text-align: center;
}

</style>
<body>
    <h1>Implementación de API´s de whatsapp, mediante burbujas fijas y flotantes</h1>

     <!-- Burbujas Whatsapp y Phone -->
     <div class="callbutton">
        <div id="WAButton"></div>
        <div class="llamada">
           <a href="tel:<?php echo $telphone?>" class="fas fa-phone-alt"></a> 
        </div>
    </div>

    <footer>
        <!-- Burbujas de Redes Sociales -->
        <div class="burbujas">
            <!-- Utilizar dentro de los dispositivos moviles API-->
            <a href="https://api.whatsapp.com/send/?phone=+52<?php echo $telwhatsapp?>&text=Hola+que+tal+necesito+ayuda&app_absent=0" target="_blank"><img class="burbuja-whatsapp" src="img/whatsapp.jpeg" alt=""></a>
           
            <!-- Utilizar para PC, laptop Web.whatsapp-->
            <a href="https://web.whatsapp.com/send?phone=+52<?php echo $telwhatsapp?>&text=¡Buen dia ...!" target="_blank"><img class="burbuja-whatsapp" src="img/whatsapp.jpeg" alt=""></a>
           
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/floating-wpp.min.js"></script>
 
    <script>
        $(function() {
            $('#WAButton').floatingWhatsApp({
                phone: +tel, //Número de telefono (Con prefijo 521 para México)
                headerTitle: '¡Envíanos un mensaje!', //Título de la ventana
                popupMessage: '¡Hola!, Gracias por confiar en nosotros. ¿En qué te podemos ayudar?', //Mensaje de la ventana
                showPopup: true, //Permite que esté visible el botón flotante
                buttonImage: '<img src="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/whatsapp.svg" class="imgpop" />', //Button Image
                position: "right"
            });
        });
    </script>
</body>

</html>