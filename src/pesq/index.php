<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscando...</title>
</head>
<?php
include('../login/config.php');
include('../login/verifica_login.php');
include('../login/redirect.php');
include('../conect.php');

// Recuperamos a ação enviada pelo formulário
$a = $_GET['a'];

// Verificamos se a ação é de busca
if ($a == "buscar") {

    // Pegamos a palavra
    $pes_cpf = trim($_POST['cpf']);

    // Verificamos no banco de dados produtos equivalente a palavra digitada
    $sql = mysqli_query($con, "SELECT * FROM arquivos WHERE id_cliente LIKE '%" . $pes_cpf . "%' ORDER BY id_cliente");

    // Descobrimos o total de registros encontrados
    $numRegistros = mysqli_num_rows($sql);
?>

<body>
    <p>Olá <b><?php echo $_SESSION['nome_usuario'] ?></b>,
    <a href="../../login/sair.php">clique aqui</a>
    para sair.<br>
    Para enviar novos arquivos <a href="../upload">clique aqui</a>
<?php
if ($_SESSION['usuario'] === 'rayan') {
	echo '<a href="../cria-usuarios/">Criar usuário</a>';
};
?>
    <form name="frmBusca" method="post" action="?a=buscar">
        <input type="text" name="cpf" oninput="mascara(this)"/>
		<input type="submit" value="Buscar" />
    </form>
    <table border="1">
        <tr>
            <td>Data</td>
            <td>Titulo do Arquivo</td>
            <td>Tipo do Arquivo</td>
            <td>CPF do Cliente</td>
            <td>Ler/Download</td>
            <td>Excluir</td>
        </tr>
<?php
    // Se houver pelo menos um registro, exibe-o
    if ($numRegistros != 0) {
        // Exibe os produtos e seus respectivos preços
        while ($arquivo = mysqli_fetch_object($sql)) {
            $data = $arquivo->dat;
            $data = implode("/",array_reverse(explode("-",$data)));
?>
        <tr>
            <td><?php echo $data ?></td>
            <td><?php echo $arquivo->titulo ?></td>
            <td><?php echo $arquivo->tipo ?></td>
            <td><?php echo $arquivo->id_cliente ?></td>
            <td><a href="../../data/<?php echo $arquivo->link ?>" target="_blank">Ver e Baixar</a></td>
            <td><a style="color:red;" href="../../data/del.php?del=<?php echo $arquivo->id ?>&&link=<?php echo $arquivo->link ?>&&nome=<?php echo $arquivo->titulo ?>">Apagar</a> </td>
        </tr>
<?php
        }
        // Se não houver registros
    } else {
        echo "Nenhum arquivo foi encontrado com o CPF: " . $pes_cpf . "";
    }
}
    ?>
    </table>
	<script src="../app.js"></script>
</body>

</html>