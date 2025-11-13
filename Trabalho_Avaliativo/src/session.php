<?php 
    class Sessao{
        private $sessionID;
        private $status;   
        private $usuario;
        private $dataHoraInicio;
        private $dataHoraUltimoAcesso;


        public function __construct(){
            $this->iniciaSessao();
        }

        private function iniciaSessao(){
            session_start();
            if (isset($_SESSION['usuario'])){
                $this->dataHoraInicio = $this->recuperaDados('dataHoraInicio');
                $this->dataHoraUltimoAcesso = date('d-m-Y H:i:s');
            }else{
                $this->dataHoraInicio =  date('d-m-Y H:i:s');      
            }
            $this->status = 1;
            $this->sessionID = session_id();
        }

        public function recuperaDados($var){
            if(isset($_SESSION[$var])){
                return $_SESSION[$var];
            }else
                return NULL;
        }

        public function salvaSessao(){
            $this->gravaDados('usuario',$this->usuario->getUserName());
            $this->gravaDados('dataHoraInicio',$this->dataHoraInicio);
            $this->gravaDados('dataHoraUltimoAcesso', $this->dataHoraUltimoAcesso);
        }
        
        public function gravaDados($chave, $valor){
            $_SESSION[$chave] = $valor;
        }

        public function encerraSessao() {
            session_unset();
            session_destroy();
        }

        public function getUsuario(){
            return $this->usuario;
        }

        public function setUsuario($usuario){
            $this->usuario = $usuario;
        }

        public function getStatus() {
            return $this->status;
        }
    }
?>