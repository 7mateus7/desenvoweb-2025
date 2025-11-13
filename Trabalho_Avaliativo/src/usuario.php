<?php 
    require_once('db.php');

    class Usuario{
        private $userName;
        private $userLogin;
        private $userPass;

        public function loadUsuario($userLogin, $dbLigacao) { 
            $comando = 'SELECT * FROM usuarios_admin WHERE login = :login';
            try{
                $stmt = $dbLigacao->prepare($comando);

                $stmt->execute([
                    ':login' => $userLogin
                ]);

                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if($user){

                    $this->setUserPass($user['senha']);
                    $this->setUserLogin($user['login']);
                    $this->setUserName($user['nome']);
                    
                    return true;
                }else{
                    return false;
                }
            }catch(PDOException $e){
                die("Erro ao encontrar o usuário no banco de dados: " . $e->getMessage());
            }
        }

        public function getUserPass(){
            return $this->userPass;
        }

        public function getUserLogin(){
            return $this->userLogin;
        }

        public function getUserName(){
            return $this->userName;
        }

        public function setUserPass($userPass){
            $this->userPass = $userPass;
        }

        public function setUserLogin($userLogin){
            $this->userLogin = $userLogin;
        }

        public function setUserName($userName){
            $this->userName = $userName;
        }
    }

?>