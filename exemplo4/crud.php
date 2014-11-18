<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);
$acao     = (isset($_POST['acao'])) ? $_POST['acao'] : '';
$nome     = (isset($_POST['nome'])) ? $_POST['nome'] : '';
$email    = (isset($_POST['email'])) ? $_POST['email'] : '';
$telefone = (isset($_POST['telefone'])) ? $_POST['telefone'] : '';
$pdo = new PDO("pgsql:host=localhost;dbname=blog;", 'blog', '123456');

if ($acao == 'incluir'):
	$sql = "INSERT INTO tab_cliente (nome, email, telefone)VALUES('$nome', '$email', '$telefone')";
	$stm = $pdo->prepare($sql);
	$retorno = $stm->execute();

	sleep(2);
	echo $retorno;
endif;


if ($acao == 'ver'):
	$sql = "SELECT id, nome, email, telefone FROM tab_cliente";
	$stm = $pdo->prepare($sql);
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);

	$tabela = "<table>
				<thead>
					<tr>
						<th>ID</th>
						<th>NOME</th>
						<th>E-MAIL</th>
						<th>TELEFONE</th>
					</tr>
				</thead>
				<tbody>";

	foreach($dados as $reg):
		$tabela .= "<tr>";
		$tabela .= "<td>{$reg->id}</td>";
		$tabela .= "<td>{$reg->nome}</td>";
		$tabela .= "<td>{$reg->email}</td>";
		$tabela .= "<td>{$reg->telefone}</td>";
		$tabela .= "</tr>";
	endforeach;

	$tabela .= "</tbody></table>";

	sleep(2);
	echo $tabela;
endif;

?>