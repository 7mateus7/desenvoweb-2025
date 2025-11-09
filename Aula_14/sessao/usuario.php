<?php 
    class Session{
        private $sessionID;
        private $status;
        private $usuario;
        private $dataHoraInicio;
        private $dataHoraUltimoAcesso;

        public function __construct()
        {
            $this->iniciaSessao();
        }

        public function iniciaSessao(){
            session_start();
            $this->sessionID = session_id();
            $this->dataHoraInicio = date('d/m/Y');
        }
        public function encerraSessao(){
            $this->gravaDadosSessao('dataHoraInicio',$this->dataHoraInicio);
            $this->gravaDadosSessao('dataHoraUltimoAcesso',$this->dataHoraUltimoAcesso);
            $this->gravaDadosSessao('usuario', $this->usuario->getIdUsuario);

            session_unset();
            session_destroy();
        }

        public function getUsuarioSessao(){
            return $this-> $usuario;
        }

        
    }

?>