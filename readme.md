<h1>Observações</h1>

  
PROJETO CADASTRO DE PRODUTOS E CATEGORIAS PHP 


    Tenha instalado no seu computador os seguintes itens.

    * PHP 7.4
    * Composer 2.2
    * MySql
    * Xampp
    * postman ou alguma ferramenta similar.


<br>

<h1>OBS</h1>

    * Dentro do arquivo Config.php localizado em /source está denifido um BASE_URL com a rota     principal 'http://localhost/webjump'.
<br>

<h1>Instalação das dependências do projeto</h1>

Use os seguintes comandos para o funcionamento da aplicação.
    
    * composer install
    * composer update


Verifique as configurações no arquivo Config.php dentro de /source para a conexão com BD.

    "driver" => "mysql",
    "host" => "localhost",
    "port" => "3306",
    "dbname" => "webjump",
    "username" => "root",
    "passwd" => "123456",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]

O projeto possui a parte de Produtos e Categorias. Existe uma dependencia de Produtos e suas categorias. Para cadastrar um produto é necessario que exista uma categoria.

<br>

<h1>Migrations</h1>

* Verifique os arquivos phinx.php e phinx.yml.dist e configure conforme o seu banco de dados.

Execute os comandos abaixo

* vendor\bin\phinx migrate    => Necessario para criar as tabelas products e category.
* vendor\bin\phinx seed:run   => Irá popular com algumas informações.






<h1>Rotas</h1>

    * Na raiz do projeto existe o arquivo chamado 'index.php', nele está contido as rotas do projeto.


<h1>Uso</h1>

 Usando o Postman, todos os dados foram passados da seguinte forma.

 * Para as rotas de  CREATE , UPDATE e DELETE as informações foram passadas usando o 'Body' na opção 'form-data', sendo na lacuna key os campos descritos abaixo e em value algum valor de desejo.

   Para Product: 
   <br>
    * id (caso seja update )<br>
    * name<br>
    * code<br>
    * price<br>
    * description<br>
    * amount<br>
    * category_id
    <br>
    
    Para Category:
    <br>
    * id (caso seja update )<br>
    * name<br>
    * code<br>
<br>
 * Para as outras rotas, os dados foran passados no 'Headers'
    

