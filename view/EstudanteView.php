<?php $listaEstudantes = $_REQUEST["estudantes"]; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
<header class="container-fluid bg-info text-white text-center p-4 ">
        <h1 class="mb-2">Semana da Acessibilidade</h1>
    </header>
    <div class="align-items-center d-flex container justify-content-center " style="height: 60vh;">
  
  <img src="https://nova-escola-producao.s3.amazonaws.com/MrVhaQgxJudZYVpeAZ3KAcNKymYSkHKkDnj58dvDUkEme4eaDndkWhYheEjj/crianca-com-deficiencia-tem-os-mesmos-direitos-a-educacao-getty-images.jpg" style="width: 500px;" alt="Nesta Imagem temos uma criança com síndrome de down mostrando a palma da mão cheia de tinta com diversas cores a criança está sorrindo praticando algo que gosta">

</div>
<br>
    <a href="/aula04/?controller=Estudante&acao=salvar" class="btn btn-success">Cadastrar Estudante</a>
    <br>
    <br>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Idade</th>  
    </tr>
  </thead>

  <tbody>
  <?php foreach ($listaEstudantes as $estudante) { ?>
           <tr>

                <td><?php echo $estudante["id"]; ?></td>
                <td><?php echo $estudante["nome"]; ?></td>
                <td><?php echo $estudante["idade"]; ?></td>
           </tr>
        <?php } ?>
  </tbody>
</table>
    
</body>

</html>