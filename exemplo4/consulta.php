<?php 

$nome = (isset($_GET['nome'])) ? $_GET['nome'] : '';
$pdo = new PDO("pgsql:host=localhost;dbname=blog;", 'blog', '123456');

if(empty($nome)):
	$sql = "SELECT id, nome, email, telefone FROM tab_cliente";
	$stm = $pdo->prepare($sql);
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);
else:
	$sql = "SELECT id, nome, email, telefone FROM tab_cliente WHERE nome LIKE '$nome%'";
	$stm = $pdo->prepare($sql);
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);
endif;

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
?>