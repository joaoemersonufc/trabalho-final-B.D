<?php
    
    session_start();

    if(!isset($_SESSION['matricula'])){
        header('Location: logar.php?erro=1');
    }
    
    require_once("../database/banco.php"); // caminho do seu arquivo de conexão ao banco de dados
    $consulta = "SELECT * FROM livro ORDER BY titulo ASC";
    $objDb = new db();
    $link = $objDb->conecta_mysql();
    $con      = mysqli_query($link,$consulta) or die();

    $VERIFICADOR = false;

?>
<title>Livros</title>
<link rel="shortcut icon" href="../img/logoico.png">
<link rel="stylesheet" href="../css/livros.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/3822b36004.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src='js/bootstrap.min.js'></script>
<script type="text/javascript" src="ajax.js"></script>
<script type="text/javascript" src="../js/javascriptpersonalizado.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<style>
    .title-second {
       color: #9457A1;
    }

    .title {
        font-weight: bold;
        text-transform: capitalize;
    }
    .image {
        opacity: 1;
        display: block;
        width: 100%;
        height: auto;
        transition: .5s ease;
        backface-visibility: hidden;
    }

    .middle {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
    }

    .card-news:hover .image {
        opacity: 0.1;
    }

    .card-news:hover .middle {
        opacity: 1;
    }

    .text {
        /* background-color: #4CAF50; */
        color: white;
        font-size: 16px;
        /* padding: 16px 32px; */
    }

    .text .btn{
        border-radius: 20px;
    }
</style>
<script>
    function SomenteNumero(e){
        var tecla=(window.event)?event.keyCode:e.which;   
        if((tecla>47 && tecla<58)) return true;
            else{
                if (tecla==8 || tecla==0) return true;
            else  return false;
        }
    }
    $(document).ready(function(){
      $('#campo_contatoTelefone').mask('(00) 0000-0000');
      });
</script>
<script>
    function InvalidMsg(textbox) {
        
        if (textbox.value == '') {
            textbox.setCustomValidity('Preencha com o Código');
        }
        else {
            textbox.setCustomValidity('');
        }
        return true;
    }
    function InvalidMsg2(textbox) {
            
        if (textbox.value == '') {
            textbox.setCustomValidity('Preencha com o Título');
        }
        else {
            textbox.setCustomValidity('');
        }
        return true;
    }
    function InvalidMsg3(textbox) {
            
        if (textbox.value == '') {
            textbox.setCustomValidity('Informe a Edição');
        }
        else {
            textbox.setCustomValidity('');
        }
        return true;
    }
    function InvalidMsg4(textbox) {
            
        if (textbox.value == '') {
            textbox.setCustomValidity('Preencha com a Sinopse');
        }
        else {
            textbox.setCustomValidity('');
        }
        return true;
    }
    function InvalidMsg5(textbox) {
            
        if (textbox.value == '') {
            textbox.setCustomValidity('Informe o gênero do Livro');
        }
        else {
            textbox.setCustomValidity('');
        }
        return true;
    }
    function InvalidMsg6(textbox) {
            
        if (textbox.value == '') {
            textbox.setCustomValidity('Informe o Nome da Editora');
        }
        else {
            textbox.setCustomValidity('');
        }
        return true;
    }
    function InvalidMsg7(textbox) {
            
        if (textbox.value == '') {
            textbox.setCustomValidity('Informe o Email');
        }
        else {
            textbox.setCustomValidity('');
        }
        return true;
    }
    function InvalidMsg9(textbox) {
            
        if (textbox.value == '') {
            textbox.setCustomValidity('Informe o Autor');
        }
        else {
            textbox.setCustomValidity('');
        }
        return true;
    }
    function InvalidMsg11(textbox) {
            
        if (textbox.value == '') {
            textbox.setCustomValidity('Escolha uma Imagem');
        }
        else {
            textbox.setCustomValidity('');
        }
        return true;
    }
</script>
<div class="container-fluid">

    <div class="row" style="padding-top: 25px">
        <div class="col-xl-12 mx-auto actions">
                <a href="./home.php" class="btn btn-outline-dark" style="border-radius: 30px"><i class="fa fa-arrow-circle-left">
                </i> Voltar</a>
        </div>
        <div class="col-xl-12 mt-3 mx-auto actions" style="padding-top: 20px">
            <h1 class="font-weight-lighter title-second" style="border: bold;">Livros</h1>
            <hr>
            <div class="row">
                <div class="col-lg-6">
                    <div class="dropdown nav">
                        <button class="btn btn-outline-dark dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="border-radius: 30px;">
                            Ordenar Por <i class="fa fa-filter"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="livroscrescente.php">Ordem Crescente</a>
                            <a class="dropdown-item" href="livrosdecrescente.php">Ordem Decrescente</a>
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-right">
                    <div class="dropdown">
                        <a href="#modal" data-toggle="modal" class="btn btn-outline-dark btn-sm" style="border-radius: 30px;"><i class="fa fa-plus"></i> Cadastrar Livros</a>

                        <button class="btn btn-outline-dark dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="border-radius: 30px;">
                        <i class="fa fa-bookmark"></i> Editoras dos Livros
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#modal2" data-toggle="modal">Cadastrar Editora</a>
                            <!--<a class="dropdown-item" href="#modal2" data-toggle="modal">Ver Editoras</a>-->
                        </div>
                    </div>
                </div>
                <?php while($dado = $con->fetch_array()) {  if($dado['reservado'] == 0 && $dado['alugado'] == 0 ) { ?>
                    <style type="text/css">
                        div{
                            display: inline-block;
                        }
                    </style>
                        <div style="width:auto; padding-left:60px" class="col-lg-3 py-5 card-news">
                            <img src="../img/livroroxo.png" style="width:250px;height:250px" class="img-assoc image" alt="">
                            <div style="padding-left:50px" class="middle">
                                <div class="text">
                                    <h5 class="text-dark" align="center"></h5>
                                    <tr>
                                      <td><?php echo "<b><font color=\"#9457A1\">" . $dado['titulo'] . "</font></b>"?></td>
                                      <td><?php echo "<b><font color=\"#000000\">" . $dado['autor'] . "</font></b>"?></td>
                                    </tr>
                                    <br>
                                    <a class="btn btn-outline-primary my-1"  href="#modal3-<?php echo $dado['cod']; ?>" value="echo $dado['cod'];" data-toggle="modal">Ver informações
                                    <i class="fa fa-info-circle"></i>
                                    </a>
                                    <a href="cadastrar_Reserva.php?codigo=<?php echo $dado['cod']; ?>" align="center" class="btn btn-outline-success my-1">
                                            Reservar Livro
                                    <i class="fa fa-archive"></i>
                                    </a>
                                    <a href="excluir_Livro.php?codigo=<?php echo $dado['cod']; ?>" align="center" class="btn btn-outline-danger my-1">
                                            Excluir Livro
                                    <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="modal" id="modal3-<?php echo $dado['cod']; ?>" tabindex="-1" role="dialog">
                          <div class="modal-dialog" role="document" style="display: flex">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Autor:</h5>
                               
                                <?php echo " <b><font color=\"#0000\"> " . $dado['autor'] . " </font></b>"?>
                                
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <p>Sinopse:</p>
                                <?php echo " <b><font color=\"#0000\"> " . $dado['sinopse'] . " </font></b>"?>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                <?php $VERIFICADOR = true; } }?>
                <?php if(!($VERIFICADOR)) { ?>   
                    <div class="col-xl-12 mt-3 mx-auto actions" style="padding-top: 20px">
                        <div class="row">   
                            <div class='col-2 mx-auto text-center' style='padding-top: 40px'>
                                <h1><i class='fas fa-book' style='color: #9457A1'></i></h1>
                                <hr class='my-1'>
                            </div>
                        </div>
                        <div class='row align-items-center'>
                        </div>

                        <div class='row mt-4'>
                            <div class='col-12 text-center'>
                                <h2 class='font-weight-lighter'>Sem livros para visualizar. Que tal cadastrar alguns?</h2>
                                <br>
                            </div>
                        </div>
                    </div>
                <?php  } ?>       
            </div>
        <hr>
    </div>
</div>

<!-- Modal Cadastrar Livro-->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div style="display: flex" class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastrar Livro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="cadastrarLivro.php" id="formCadastroLivro" >
        <div class="modal-body">
            <label class="label-input" for="">
                <br>Código:
                <input id="campo_codigoEditora" class="form-control" name="campo_codigoEditora" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required="required" type="text" placeholder="Código da Editora" style="color:black" onkeypress='return SomenteNumero(event)'>
            </label>
            <span>
                <?php
                    $verificarURL = $_SERVER['REQUEST_URI'];
                    if(strstr($verificarURL, 'erro_editora2=1&')){
                        echo "<script>
                                $(document).ready(function() {
                                    $('#modal').modal('show');
                                })
                            </script><h8 style='font-size:10px;color:red'>Editora não está cadastrada</h8>";
                    }
                ?>
            </span>
                                
            <label class="label-input" for="">
                <br>Título:
                <input id="campo_titulo" class="form-control" name="campo_titulo" oninvalid="InvalidMsg2(this);" oninput="InvalidMsg2(this);" required="required" type="text" style="color:black" placeholder="Título">
            </label>
                <span>
                <?php
                    $verificarURL = $_SERVER['REQUEST_URI'];
                    if(strstr($verificarURL, 'erro_titulo=1&')){
                        echo "<script>
                                $(document).ready(function() {
                                    $('#modal').modal('show');
                                })
                            </script><h8 style='font-size:10px;color:red'>Este livro já está cadastrado</h8>";
                    }
                ?>
                </span>

            <label class="label-input" for="">
                <br>Autor:
                <input id="campo_autor" class="form-control" name="campo_autor" oninvalid="InvalidMsg9(this);" oninput="InvalidMsg9(this);" required="required" type="text" style="color:black" placeholder="Autor">
            </label>
            
            <label class="label-input" for="">
                <br>Edição:
                <input id="campo_edicaoLivro"  class="form-control" name="campo_edicaoLivro" oninvalid="InvalidMsg3(this);" oninput="InvalidMsg3(this);" required="required" type="text" placeholder="Edição do Livro"  style="color:black" onkeypress='return SomenteNumero(event)'>
            </label>

            <label class="label-input" for="">
                <br>Sinopse:
                <textarea cols="30" rows="5" id="campo_sinopse" style="width: 465px;height: 340px;resize: none;color:black" class="form-control" name="campo_sinopse" oninvalid="InvalidMsg4(this);" oninput="InvalidMsg4(this);" required="required" type="text"></textarea>
            </label>

            <label class="label-input" for="">
                <br>Gênero:
                <input id="campo_genero"  class="form-control" name="campo_genero" oninvalid="InvalidMsg5(this);" oninput="InvalidMsg5(this);" required="required" type="text" style="color:black" placeholder="Gênero do Livro">
            </label>
            <br><hr>
        </div>
        <span style="padding-left:210px">
            <button class="btn btn-danger" data-dismiss="modal">Fechar</button>
            <button type="submit" id="salvar" value="cadastro" class="btn btn-success">Salvar mudanças</button>
        </span>
      </form>
    </div>
  </div>
</div>

<!-- Modal Cadastrar Editora-->
<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div style="display: flex" class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel2">Cadastrar Editora</h5>
            <button type="button" class="close" data-dismiss="modal2" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="post" action="cadastrarEditora.php" id="formCadastroEditora" >
            <div class="modal-body">
                <label class="label-input" for="">
                    <br>Código:
                    <input id="campo_codigo"  class="form-control" name="campo_codigo" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required="required" type="number" placeholder="Código Editora" style="color:black" onkeypress='return SomenteNumero(event)'>
                </label>
                <span>
                    <?php
                        $verificarURL = $_SERVER['REQUEST_URI'];
                        if(strstr($verificarURL, 'erro_editora=1&')){

                            echo "<script>
                                $(document).ready(function() {
                                    $('#modal2').modal('show');
                                })
                            </script><h8 style='font-size:10px;color:red'>Editora já cadastrada!</h8>";
                        }
                    ?>
                    
                </span>
                                
                <label class="label-input" for="">
                    <br>Nome:
                    <input id="campo_nome" class="form-control" name="campo_nome" oninvalid="InvalidMsg5(this);" oninput="InvalidMsg5(this);" required="required" type="text" style="color:black" placeholder="Nome">
                </label>
                <span>
                    <?php
                        $verificarURL = $_SERVER['REQUEST_URI'];
                        if(strstr($verificarURL, 'erro_codigo=1&')){
                            echo "<script>
                                $(document).ready(function() {
                                    $('#modal2').modal('show');
                                })
                            </script><h8 style='font-size:10px;color:red'>Esta editora já está cadastrada!</h8>";
                        }
                    ?>
                </span>
                <div>
                    Contato:
                    <input id="campo_contatoTelefone" class="form-control" name="campo_contatoTelefone" oninvalid="InvalidMsg6(this);" oninput="InvalidMsg6(this);" required="required" type="text" placeholder="Telefone" style="width: 230px;color:black" onkeypress='return SomenteNumero(event)'><br>
                    <input id="campo_contatoEmail" class="form-control" name="campo_contatoEmail" oninvalid="InvalidMsg7(this);" oninput="InvalidMsg7(this);" required="required" type="email" style="color:black" placeholder="Email"><br>

                </div>
                <br><hr>
            </div>
            <span style="padding-left:210px">
                <button class="btn btn-danger" data-dismiss="modal">Fechar</button>
                <button type="submit" id="save" class="btn btn-success">Salvar mudanças</button>
            </span>
        </form>
    </div>
  </div>
</div>