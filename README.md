# Backend-Clube-do-Livro
 
Projeto aplicado para a vaga de emprego na WD7 Soluções a seguir as instruções.

## Passo 1

Ao baixar o projeto entre na pasta e duplique o .env:
````
cp .env.example .env
php artisan key:generate
````
Lembre-se de indicar o banco de dados também

# Passo 2
Rode o:

````
php artisan migrate
````

Eu criei uma seeder para agilizar o login então rode:
````
php artisan db:seed --class=UserTableSeeder
````
o login e senha são:
````
{
	"email":"user@gmail.com",
	"password":"password"
}
````
Na rota: http://127.0.0.1:8000/api/login 

# Passo 3 
As rotas do projeto são:

rota de login: http://127.0.0.1:8000/api/login 
no corpo json:

````
{
	"email":"exemple@gmail.com",
	"password":"exemplo"
}
````

rota de registro: http://127.0.0.1:8000/api/register 

no corpo json:

````
{
	"name":"Gabriel",
	"email":"g@gmail.com",
	"password":"12345678912"
}
````
OBSERVAÇÃO: a partir daqui você precisa estar logado, quando a rota de login é acionada ela gera um token pegue esse token gerado e adcione ao header das rotas:
````
Authorization Bearer 1|oppeQ2fRF8cBCsqBxMB5x7b38pwNWCjrm5Kiv8HK
```` 

rota de criação de livro: http://127.0.0.1:8000/api/book/create
no corpo json:

````
{
	"titulo":"Titulo exemplo",
	"descricao":"Descrição exemplo",
	"autor":"autor exemplo"
}
````

rota de edição de livro: http://127.0.0.1:8000/book/edit/{id}
no corpo json
````
{
	"titulo":"Titulo exemplo",
	"descricao":"Descrição exemplo",
	"autor":"autor exemplo"
}
````
rota de apagar livro: http://127.0.0.1:8000/book/delete/{id}

rota que retorna todos os livros cadastrados: http://127.0.0.1:8000/api/books 

rota que retorna um livro e seu dono: http://127.0.0.1:8000/api/books/show/{id}

rota de aluguel: http://127.0.0.1:8000/api/rent/create
no corpo json: 
````
{
	"book_id":"1",
	"data_recebimento":"2001/11/11",
	"data_entrega":"2001/12/12"
}
````
rota que retorna os alugueis de um livro: http://127.0.0.1:8000/api/rent/{id}