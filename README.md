# Passo-a-passa para rodar o projeto Discografia


1- Precisa ter o MySQL, Apache e o PHP instalado <br>
    -Instalando o XAMMP já vem com tudo isso instalado<br>
    <a href="https://packagist.org/packages/laravel/framework">Clique aqui para Instalar</a><br>


2- Inicie o XAMMP<br>
    <a href="https://packagist.org/packages/laravel/framework">Clique aqui ver como inicia</a><br>

3- Crie um Banco de dados chamado (discografia)<br>
    No browser, consegue criar acessando (http://localhost/phpmyadmin/)<br>
    Clicar em (Novo) e colocar o nome (discografia)<br>
    OBS:Não precisa criar nenhuma tabela

4- Clone o projeto <br>
    Acesse o CMD ou Terminar, entre na pasta que o projeto vai ficar. <br>
    Execute o comando: git clone https://github.com/LeonardoBarbosa1/discografia.git

5- Acesse o projeto na sua IDE.

6- Abra um terminal na IDE ou na pasta do projeto

7- Execute o comando: php artisan migrate

8- Execute o comando: php artisan serve

9- Acesse pelo browser o endereço que estara disponivel após o passo 8.
    Ex: http://127.0.0.1:8000

