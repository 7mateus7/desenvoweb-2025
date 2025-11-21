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

<?php 

    require_once 'conexaobd.php';

    class query {
        private $sql;
        private $registros;
        private $connection;
        private $queryResource;

        public function __construct($oConn) {
            $this->registros = 0;
            $this->connection = $oConn;
        }

        public function open() {
            $this->queryResource = pg_query($this->connection->getInternalConnection(), $this->sql);
            if($this->queryResource) {
                //Retorna a quantidade de linhas da query.
                $this->registros = pg_num_rows($this->queryResource);
                return true;
            }
            return false;
        }

        public function getNextRow() {
            $row = pg_fetch_assoc($this->queryResource);
            if($row) {
                return $row;
            }
            return false;
        }

        public function update($stabela, $aColunas, $aValores, $sWhere) {
            for ($iCampo = 1; $iCampo <= count($aColunas); $iCampo++) {
                $varCol = "$".$iCampo;
            }

            $result = pg_query_params($this->connection->getInternalConnection(), 
                                      "UPDATE " . $stabela . " SET " . $aColunas . " = " . $varCol . " WHERE " . $sWhere, 
                                      $aValores);
            return $result;
        }

        public function insert($sTabela, $aColunas, $aValores) {
            //TODO implementar método de insert
        }

        public function delete($sTabela, $sWhere) {
            //TODO implementar método de delete
        }

        public function getRegistros() {
            return $this->registros;
        }

        public function setSql($sSql) {
            $this->sql = $sSql;
        }

    }

?>
query.php
Exibindo query.php…