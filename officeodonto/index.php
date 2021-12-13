<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="icon" 
      type="image/png" 
      href="img/fav.png">
    <title>Login</title>
    <!-- <style>
        body {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            background-image: url(img/background.jpg);
            background-repeat: no-repeat;
            background-size: 1920px 1080px;
        }

        div {
            background-color: rgba(1, 71, 71, 0.616);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 80px;
            border-radius: 15px;
            color: white;
            
        }

        input {
            padding: 15px;
            border: none;
            outline: none;
            font-size: 15px;
        }

        button {
            background-color: dodgerblue;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            color: white;
            font-size: 15px;
        }

        button:hover {
            background-color: deepskyblue;
            cursor: pointer;
        }

        .logo{
            width: 150px;
            position: absolute;
            top: 85%;
            left: 50%;
            transform: translate(-50%);
        }
        h1{
            text-align: center;
        }

    </style> -->
    <style>
          body {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            background-image: url(img/background.jpg);
            background-repeat: no-repeat;
            background-size: 1920px 1080px;
        }

        .logo{
            width: 250px;
            position: absolute;
            top: 82%;
            left: 50%;
            transform: translate(-50%);
           
        }

        input {
            padding: 15px;
            border: none;
            outline: none;
            font-size: 15px;
            width: 100%;
            border-radius: 10px;
        }

        button {
            background-color: dodgerblue;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            color: white;
            font-size: 15px;
            
        }

        button:hover {
            background-color: deepskyblue;
            cursor: pointer;
        }

        .formulario{
            background-color: rgba(1, 71, 71, 0.616);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 80px;
            border-radius: 15px;
            color: white;
            width: 700px;
            padding-bottom: 150px;

        }

        h1{
            text-align: center;
        }

    </style>
</head>

<body>
    <div>
        <?php 
        
                    session_start();
            if(isset($_SESSION["usuario"])){
                header(("location: ./agenda/lista.php"));
                return;
            }
        ?>
        <div class="formulario">
        <form method="post" action="./login/autenticar.php">
          
            <?php if(isset($_GET['msg']) && !empty($_GET['msg'])){ ?>
                <div class="">
                    <div class="alert alert-danger">
                        <?php echo $_GET['msg']; ?>
                    </div>
                </div>
            <?php } ?>
            
            <h1>Entrar</h1>
            <input type="text" name="email" placeholder="E-mail">
            <br><br>
            <input type="password" name="senha" placeholder="Senha">
            <br><br>
            <button>Enviar</button>
            <img class="logo" src="img/logo-office.png" alt="logo office odonto">
            </div>
        </form>
    </div>
</body>

</html>