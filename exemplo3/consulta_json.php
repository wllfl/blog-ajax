<?php 
$acao = (isset($_POST['acao'])) ? $_POST['acao'] : '' ;
$pdo = new PDO("pgsql:host=localhost;dbname=blog;", 'blog', '123456');

if($acao == 'carregar_json'):
	$sql = 'SELECT descricao FROM tab_cidade';
	$stm = $pdo->prepare($sql);
	$stm->execute();
	$dados = $stm->FetchAll(PDO::FETCH_OBJ);

	sleep(5);
	echo json_encode($dados);
endif;

?>