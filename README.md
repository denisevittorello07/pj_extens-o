# Sistema de Controle Financeiro para Jovens e Adolescentes

## Sobre o Projeto

O Sistema de Controle Financeiro para Jovens e Adolescentes foi desenvolvido como Trabalho de Conclusão de Curso (TCC) com o objetivo de auxiliar usuários no gerenciamento de suas finanças pessoais, incentivando a educação financeira e o planejamento de gastos.

A aplicação permite o controle de contas bancárias, transações financeiras, metas de economia, grupos financeiros colaborativos e conteúdos de educação financeira, oferecendo uma experiência prática para o aprendizado da gestão financeira.

---

## Objetivos

* Promover a educação financeira entre jovens e adolescentes.
* Facilitar o controle de receitas e despesas.
* Auxiliar no planejamento financeiro por meio de metas.
* Permitir a organização das finanças pessoais.
* Incentivar hábitos financeiros saudáveis.

---

## Tecnologias Utilizadas

* PHP
* HTML5
* CSS3
* JavaScript
* MySQL
* Bootstrap
* GitHub

---

## Funcionalidades

### Autenticação

* Cadastro de usuários
* Login de usuários
* Gerenciamento de dados pessoais

### Contas Bancárias

* Cadastro de conta bancária
* Consulta de contas
* Edição de contas
* Exclusão de contas

### Transações Financeiras

* Cadastro de receitas e despesas
* Consulta de transações
* Alteração de transações
* Exclusão de transações

### Metas Financeiras

* Criação de metas
* Acompanhamento de objetivos financeiros
* Atualização de metas
* Exclusão de metas

### Grupos Financeiros

* Cadastro de grupos financeiros
* Compartilhamento de informações financeiras
* Gerenciamento de grupos

### Educação Financeira

* Cadastro de conteúdos educativos
* Consulta de conteúdos
* Atualização de conteúdos
* Exclusão de conteúdos

---

## Estrutura do Projeto

```text
ProjetoFinanceiro/
│
├── DAO/
├── ativos/
│
├── cadastro.php
├── login.php
├── index.php
├── meus_dados.php
│
├── CNova_contaBancaria.php
├── CConsultar_contaBancaria.php
├── CEditar_contaBancaria.php
├── CAtualizar_contaBancaria.php
├── CExcluir_contaBancaria.php
│
├── TransNova_transacao.php
├── TransConsultar_transacao.php
├── TransEditar_transacao.php
├── TransAtualizar_transacao.php
├── TransExcluir_transacao.php
│
├── MNova_meta.php
├── MConsultar_meta.php
├── MEditar_meta.php
├── MAtualizar_meta.php
├── MExcluir_meta.php
│
├── GNovo_grupoFinanceiro.php
├── GConsultar_grupoFinanceiro.php
├── GEditar_grupoFinanceiro.php
├── GAtualizar_grupoFinanceiro.php
├── GExcluir_grupoFinanceiro.php
│
├── EduNovo_educacao.php
├── EduConsultar_educacao.php
├── EduEditar_educacao.php
├── EduAtualizar_conteudo.php
├── EduExcluir_educacao.php
│
├── config.php
├── usuario_model.php
└── README.md
```

---

## Como Executar o Projeto

### 1. Clonar o Repositório

```bash
git clone https://github.com/SEU-USUARIO/SEU-REPOSITORIO.git
```

### 2. Configurar o Banco de Dados

* Criar um banco de dados MySQL.
* Importar o script SQL do projeto.
* Configurar as credenciais de acesso no arquivo `config.php`.

### 3. Executar o Sistema

Utilizar um servidor local como:

* XAMPP
* WAMP
* Laragon

ou hospedar em servidor web compatível com PHP e MySQL.

---

## Requisitos do Sistema

* PHP 8.0 ou superior
* MySQL 5.7 ou superior
* Servidor Apache
* Navegador Web atualizado

---

## Autor

**Denise Vittorello**

Trabalho de Conclusão de Curso (TCC)

Sistema de Controle Financeiro para Jovens e Adolescentes

Ano: 2026


