# Passo-a-passa para rodar o projeto Discografia


1- Precisa ter o MySQL, Apache e o PHP instalado
    -Instalando o XAMMP já vem com tudo isso instalado
    <a href="https://packagist.org/packages/laravel/framework">Clique aqui para Instalar</a>


2- Inicie o XAMMP
    <a href="https://packagist.org/packages/laravel/framework">Clique aqui ver como inicia</a>

3- Crie um Banco de dados chamado (discografia)
    No browser, consegue criar acessando (http://localhost/phpmyadmin/)
    Clicar em (Novo) e colocar o nome (discografia)
    OBS:Não precisa criar nenhuma tabela

4- Clone o projeto
    Acesse o CMD ou Terminar, entre na pasta que o projeto vai ficar. 
    Execute o comando: git clone https://github.com/LeonardoBarbosa1/discografia.git

5- Acesse o projeto na sua IDE.

6- Abra um terminal na IDE ou na pasta do projeto

7- Execute o comando: php artisan migrate

8- Execute o comando: php artisan serve

9- Acesse pelo browser o endereço que estara disponivel após o passo 8.
    Ex: http://127.0.0.1:8000

