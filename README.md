# ReliefsAppSymfony

don't forget to do the following commands:

composer install
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate

# POSTMAN

POST request :

URL : http://localhost:8000/historyJson/new
body(raw) : 
{
	"url":"https:\/\/www.youtube.com\/watch?v=test"
}

GET request :
URL : http://localhost:8000/historyJson
It should return the history.
