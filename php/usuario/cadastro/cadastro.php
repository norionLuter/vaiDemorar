<?php

/**
 *
 * Esta script verifica dados de cadastro da empresa
 * se estiver ok cadastra a empresa.
 *
 * @author	Norion de Luterano
 * @version	1.0 Debugada em 27/09/2011 no PHP 5.3.8
 *
 */



require_once('../../banco_dados/config.php');
require_once('../../funcoes/allEmpty.php');
require_once('../../funcoes/verificarDadosCadastroEmpresa.php');

// dados enviados do usuário para servidor
/*$nome_empresa  = $_POST["nome_empresa"];
$cnpj          = $_POST["cnpj"];
$estado        = $_POST["estado"];
$bairro        = $_POST["bairro"];
$endereco      = $_POST["endereco"];
$email         = $_POST["email"];
$senha         = $_POST["senha"];
*/

$nome_empresa  = "carlos pedor";
$cnpj          = "57.331.613/0001-29";
$estado        = "rio de janeiro";
$bairro        = "dasdxa dasdas";
$endereco      = "adasd asdas";
$email         = "andre@bol.com.br";
$senha         = "123456789";



//verifica se todos os dados foram enviados. Caso não informe e termina o script
if(!isset($nome_empresa,$cnpj,$estado,$bairro,$endereco,$email,$senha)){
  echo "Informe todos os dados necessários";
  exit();
}

//verifica se os dados foram preenchidos adequadamente sem dados vazios
if(allEmpty($nome_empresa,$cnpj,$estado,$bairro,$endereco,$email,$senha)){
  echo "Informe todos os dados necessários";
  exit();
}

//verifica se os dados são válidos se não encerra o script
verificaDadosCadastroEmpresa($email,$cnpj,$senha);

//constuir sql para banco de banco_dados
$sql= "call cadastroEmpresa(:Nome_empresa, :Cnpj, :Estado, :Bairro, :Endereco, :Email, :Senha)";

//setar dados para sql
$dados=$conexao->prepare($sql);
$dados->bindValue(':Nome_empresa',$nome_empresa);
$dados->bindValue(':Cnpj',$cnpj);
$dados->bindValue(':Estado',$estado);
$dados->bindValue(':Bairro',$bairro);
$dados->bindValue(':Endereco',$endereco);
$dados->bindValue(':Email',$email);
$dados->bindValue(':Senha',$senha);

//executar comando no banco de dados
$dados->execute();

//fechar conexão
$conexao=null;
$dados=null;

//enviar confirmação de cadastro
echo "Usuário cadastrado";

exit();

/*


*/

 ?>
