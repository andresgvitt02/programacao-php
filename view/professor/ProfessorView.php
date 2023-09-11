<?php $listaProfessores = $_REQUEST["professores"]; ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body>

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Atenção</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Você deseja realmente excluir este registro?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close-modal">Fechar</button>
          <button type="button" class="btn btn-danger" id="delete-button">EXCLUIR</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="userDeleted" tabindex="-1" aria-labelledby="userDeletedLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="userDeletedLabel">Parabéns</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Usuário deletado com sucesso!!!
        </div>
      </div>
    </div>
  </div>

  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/' . FOLDER . '/view/navbar.php'; ?>

  <header class="container-fluid bg-info text-white text-center p-4 ">
    <h1 class="mb-2">Semana da Acessibilidade</h1>
  </header>
  <div class="align-items-center d-flex container justify-content-center " style="height: 60vh;">

    <img
      src="https://nova-escola-producao.s3.amazonaws.com/MrVhaQgxJudZYVpeAZ3KAcNKymYSkHKkDnj58dvDUkEme4eaDndkWhYheEjj/crianca-com-deficiencia-tem-os-mesmos-direitos-a-educacao-getty-images.jpg"
      style="width: 500px;"
      alt="Nesta Imagem temos uma criança com síndrome de down mostrando a palma da mão cheia de tinta com diversas cores a criança está sorrindo praticando algo que gosta">

  </div>
  <br>
  <a href="/<?php echo FOLDER; ?>/?controller=Professor&acao=salvar" class="btn btn-success">Cadastrar Professor</a>
  <br>
  <br>
  <table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Idade</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($listaProfessores as $professoresAtual) { ?>
        <tr>

          <td>
            <?php echo $professoresAtual["id"]; ?>
          </td>
          <td>
            <?php echo $professoresAtual["nome"]; ?>
          </td>
          <td>
            <?php echo $professoresAtual["idade"]; ?>
          </td>
          <td>
            <a href="/<?php echo FOLDER; ?>?controller=Professor&acao=editar&id=<?php echo $professoresAtual['id']; ?>"
              class="btn btn-primary">Editar</a>
            <!-- <a href="/<?php echo FOLDER; ?>?controller=Professor&acao=excluir&id=<?php echo $professoresAtual['id']; ?>" -->
            <!-- class="btn btn-primary">Excluir</a> -->
            <button type="button" class="btn btn-primary select-user-to-delete" data-bs-toggle="modal"
              data-bs-target="#staticBackdrop" data-id="<?php echo $professoresAtual['id']; ?>">
              Excluir
            </button>

          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>

  <script>
    $("#delete-button").on("click", function () {
      let idUsuario = $(this).attr('data-id');

      let url = "/<?php echo FOLDER; ?>/?controller=Professor&acao=excluir&id=" + idUsuario;
      $.get(url, function (data) {
        $("#close-modal").click();
        var myModal = new bootstrap.Modal(document.getElementById('userDeleted'))
        myModal.show();

      });
      console.log("O usuario para ser deletado é: " + idUsuario);
    });

    $("#userDeleted").on("hidden.bs.modal", function () {
      location.reload();
    });

    $(".select-user-to-delete").on("click", function () {

      $("#delete-button").attr("data-id", $(this).attr('data-id'));
      console.log("O usuário escolheu o estudante que talvez possa ser deletado");
    });
  </script>
</body>

</html>