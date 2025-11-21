<?php 
    require_once('db.php');
    require_once('session.php');
    require_once('usuario.php');

    function redirecionar(){
        header('Location: ../public/admin.php');
        exit;
    }

    function limpaDadosForm(){
        $loginInfo = filter_input(INPUT_POST, 'emailInfo', FILTER_SANITIZE_EMAIL);
        $senhaInfo = $_POST['senhaInfo']; 

        return ['loginInfo' => $loginInfo, 'senhaInfo' => $senhaInfo];
    }

    function inicializacao(&$pdo, &$sessao, &$usuario){
        $pdo = getDbConnection();
        $sessao = new Sessao;
        $usuario = new Usuario;
    }

    function validarSenha($senhaInformada, $senhaBanco){
        if(password_verify($senhaInformada, $senhaBanco)){
            return true;
        }else{
            return false;
        };
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $coletaDados = limpaDadosForm();

        $login = $coletaDados['loginInfo'];
        $senha = $coletaDados['senhaInfo'];

        inicializacao($pdo, $sessao, $usuario);

        if($usuario->loadUsuario($login, $pdo)){
            if(validarSenha($senha, $usuario->getUserpass())){
                $sessao->setUsuario($usuario);

                $sessao->salvaSessao();
                
                redirecionar();
            }else{
                echo "Senha Incorreta";
            }
        }else{
            echo "Usuário não inválido";
        }

    }else{
        echo "Dados não enviados";
    }
?>