# UNIDAVI - Desenvolvimento Web 2025
## Projeto: Sistema de Avaliação de Qualidade de Serviços

## 📖 Descrição
Este repositório armazena os arquivos desenvolvidos durante a disciplina de **Desenvolvimento Web 1**. O foco principal é o projeto final: um sistema completo de avaliação de serviços, composto por uma interface pública para tablets (Front-end) e um painel administrativo para gestão (Back-end).

## 🗂️ Índice
- [Sobre o Projeto](#-sobre-o-projeto)
- [Pré-requisitos](#-pré-requisitos)
- [Instalação e Configuração](#-instalação-e-configuração)
- [Como Utilizar](#-como-utilizar)
- [Estrutura de Arquivos](#-estrutura-do-projeto)

---

## 📋 Pré-requisitos
Para executar o projeto final, você precisará de:
* **Servidor Web com PHP:** XAMPP (recomendado) ou similar.
* **Banco de Dados:** PostgreSQL.
* **Gerenciador de Dependências:** NPM (Opcional, caso use pacotes JS).
* **Navegador Web:** Chrome, Firefox ou Edge.

---

## ⚙️ Instalação e Configuração

## 📋 Pré-requisitos

Para executar este projeto, você precisará de:

* **Servidor Web com PHP:** XAMPP (recomendado) ou similar.

* **Banco de Dados:** PostgreSQL.

* **Navegador Web:** Chrome, Firefox ou Edge.

---

## ⚙️ Passo a Passo de Instalação



### 1. Configuração do Ambiente (XAMPP + PostgreSQL)

Como o XAMPP vem configurado nativamente para MySQL, é necessário ativar o driver do PostgreSQL manualmente:



1.  Abra o painel de controle do XAMPP.

2.  Clique no botão **Config** na linha do Apache e selecione **PHP (php.ini)**.

3.  No arquivo de texto que abrir, procure (Ctrl+F) e **remova o ponto e vírgula (;)** do início das seguintes linhas:

    ```ini

    extension=pdo_pgsql

    extension=pgsql

    ```

4.  Salve o arquivo e **Reinicie o Apache** no painel do XAMPP (Stop -> Start).



### 2. Configuração do Banco de Dados

1.  Abra o seu gerenciador de banco de dados (pgAdmin ou DBeaver).

2.  Crie um novo banco de dados chamado **`feedbackSystem`**.

3.  Abra a ferramenta de consulta (Query Tool) neste novo banco.

4.  Copie o conteúdo do arquivo **`sql/setup.sql`** (presente na pasta deste projeto) e execute-o. Isso criará as tabelas `usuarios_admin`, `dispositivos`, `perguntas` e `avaliacoes`.



### 3. Configuração da Aplicação

1.  Copie a pasta do projeto para dentro do diretório `htdocs` do seu XAMPP (geralmente `C:\xampp\htdocs\`).

2.  Abra o arquivo **`config.php`** localizado na raiz do projeto.

3.  Edite as credenciais para corresponder ao seu ambiente local:

    ```php

    define('DB_HOST', 'localhost');

    define('DB_USER', 'seu_usuario_postgres'); // Ex: postgres

    define('DB_PASS', 'sua_senha_postgres');   // Ex: admin

    define('DB_NAME', 'feedbackSystem');

    ```

4. Em ambiente de desenvolvimento foi utilizando as credenciais:

    ```php

        define('DB_HOST', 'localhost');

        define('DB_USER', 'postgres');

        define('DB_PASSWORD', '123456');

        define('DB_NAME', 'feedbackSystem');

        define('DB_PORT', '5432');

    ```

---



## 🚀 Como Utilizar



### Acesso ao Cliente (Tablet)

Acesse a URL abaixo para simular a interface de avaliação do cliente:

* **URL:** `http://localhost/seu-projeto/public/index.php`

* **Simular Setores:** Você pode simular diferentes tablets adicionando o ID na URL:

    * `index.php?id=1` (Simula o Tablet 1)

    * `index.php?id=2` (Simula o Tablet 2)



### Acesso Administrativo (Retaguarda)

Acesse o painel de gestão para visualizar o dashboard e gerenciar perguntas:

* **URL:** `http://localhost/seu-projeto/public/login.php`



**Credenciais de Acesso Padrão:**

* **Usuário:** `teste@exemple.com.br`

* **Senha:** `123456`

---


## 🛠️ Estrutura do Projeto

O projeto segue o padrão MVC (Model-View-Controller) simplificado:

* **/public**: Arquivos acessíveis ao navegador (Controladores e Views).

* **/src**: Lógica de negócios, Classes e Fábricas de HTML (Models e Helpers).

* **/sql**: Scripts de banco de dados.