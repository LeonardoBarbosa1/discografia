# Passo-a-passa para rodar o projeto Discografia

### Certifique-se que o git esteja instalado
-Abra o terminal/cmd e digite: git -v
- Caso não esteja instalado, <a href="https://git-scm.com/downloads" target="_blank">Clique Aqui</a><br>

### 1- Precisa o PHP instalado e configurado<br>
-<a href="https://dev.to/marcelochia/instalando-o-php-8-no-windows-237m" target="_blank">instalação e configuração do php</a><br>

### 2- Precisa ter o MySQL e o Apache instalado <br>
-Instalando o XAMMP já vem com tudo isso instalado<br>
-<a href="https://www.apachefriends.org/pt_br/download.html" target="_blank">Clique aqui para Instalar</a><br>


### 3- Inicie o XAMMP<br>
-<a href="https://pt.wikihow.com/Iniciar-o-XAMPP-na-Inicializa%C3%A7%C3%A3o-do-Windows" target="_blank">Clique aqui ver como inicia</a><br>

### 4- Crie um Banco de dados chamado (discografia)<br>
-No browser, consegue criar acessando (http://localhost/phpmyadmin/)<br>
-Clicar em (Novo) e colocar o nome (discografia)<br>
#### -OBS:Não precisa criar nenhuma tabela

### 5- Clone o projeto <br>
-Acesse o CMD ou Terminar, entre na pasta que o projeto vai ficar. <br>
#### -Execute o comando: git clone https://github.com/LeonardoBarbosa1/discografia.git

### 6- Acesse o projeto na sua IDE.

### 7- Abra um terminal na IDE ou na pasta do projeto

### 8- Execute o comando: php artisan migrate

### 9- Execute o comando: php artisan serve

### 10- Acesse pelo browser o endereço que estará disponível após o passo 8.
Ex: http://127.0.0.1:8000

