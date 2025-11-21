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

    require_once 'lib/conexaobd.php';
    require_once 'lib/query.php';

    $connbd = new conexaobd();
    $connbd->setIp('localhost');
    $connbd->setPorta(5432);
    $connbd->setUser('postgres');
    $connbd->setPassword('123456');
    $connbd->setDatabase('local');

    if($connbd->conecta()) {
        echo $connbd->getStatus() . "<br>";
        
        $query = new query($connbd);
        $query->setSql("select * from tbpessoa");
        $query->open();
        while($row = $query->getNextRow()) {
            echo print_r($row) . "<br>";
        }

        //Fazer um update no registro código 2, trocando o nome de João para Maria.
        $query->update("tbpessoa", "pesnome, pesemail", array("maria", "maria@gmail.com"), "pescodigo = 2");
    }

    $connbd->desconecta();
    echo $connbd->getStatus();
?>
08_index_conexao_bd.php
Exibindo 08_index_conexao_bd.php…