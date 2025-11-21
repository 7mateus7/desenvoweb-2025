Pular para o conteúdo principal
Google Sala de Aula
Sala de Aula
BSN22025T29F4 - Programação Web I
Sistemas de Informação
Início
Agenda
Recursos
Minhas inscrições
Pendentes
B
BSN22024T29F2 - Algoritmos II
Sistemas de Informação
E
Estruturas de Dados II_2.2025
B
BSN22025T29F4 - Engenharia de Software II
Sistemas de Informação
A
Administração e Sistemas de Informação_2.2025
B
BSN22025T29F4 - Programação Web I
Sistemas de Informação
B
BSN22025T29F4 - Banco de Dados II
Sistemas de Informação
M
MONITORIAS - UNIDAVI
Turmas arquivadas
Configurações
Aula 15 - Programação Orientada a Objetso com PHP - Parte 3
Cleber Nardelli
•
13 de nov.
Nesta aula praticaremos dois modelos de implementação orientado a objeto:
1 - Modelo de Conexão com banco de dados e execução de query
2 - Modelo de fábrica de objetos HTML

Também falaremos sobre o trabalho e entrega da parte 1.
Aula 15-PHP-Orientação a Objetos 3.pptx
Microsoft PowerPoint

conexaobd.php
PHP

htmlelement.php
PHP

htmlinput.php
PHP

htmltable.php
PHP

query.php
PHP

07_index_html_render.php
PHP

08_index_conexao_bd.php
PHP

Comentários da turma

Adicionar comentário para a turma...

Aula 15 - Programação Orientada a Objetso com PHP - Parte 3
<?php 

    class conexaobd {
        private $ip;
        private $porta;
        private $user;
        private $password;
        private $database;
        private $dbconn;
        private $status;

        public function __construct()
        {
            $this->inicializaInstancia();
        }

        private function inicializaInstancia() {
            $this->user = 'postgres';
            $this->porta = 5432;
            $this->ip = 'localhost';
            $this->desconecta();
        }

        private function setStatus($sStatus) {
            $this->status = $sStatus;
        }

        public function getStatus() {
            return $this->status;
        }

        public function conecta() {
            try {
                $this->setStatus('Conectando');
                $this->dbconn = pg_connect("host=". $this->ip . " port=" . $this->porta . " dbname=" . $this->database . " user=" . $this->user . " password=" . $this->password);
                if($this->dbconn) {
                    $this->setStatus('Conectado');
                    return true;
                }
            } catch (Exception $e){
                $this->setStatus('Erro: ' . $e->getMessage());
            }
        }

        public function getInternalConnection() {
            return $this->dbconn;
        }

        public function desconecta() {
            if($this->dbconn) {
                pg_close($this->dbconn);
            }
            $this->setStatus('Desconectado');
        }

        public function setIp($sIp) {
            $this->ip = $sIp;
        }

        public function setPorta($iPorta) {
            $this->porta = $iPorta;
        }

        public function setUser($sUser) {
            $this->user = $sUser;
        }

        public function setPassword($sPassword) {
            $this->password = $sPassword;
        }

        public function setDatabase($sDatabase) {
            $this->database = $sDatabase;
        }

    }

?>
conexaobd.php
Exibindo conexaobd.php…