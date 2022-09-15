# Reto Dafiti

## Preguntas.
Las respuetas de las preguntas se encuentran en el archivo "Prueba técnica Dafiti Juan Sebastian Ormaza.pdf"

## Ejercicio
El algoritmo se realiza con Lumen, un microframework heredado de Laravel.
### Pasos
1. Clonar el repositorio ```git clone https://github.com/JuanOrmaza123/retoDafiti.git```.
2. Pasar a la carpeta ```pokerDafiti```.
3. Ejecutar ```composer install```.
4. Cambiarle el nombre al archivo ```.env.example``` a ```.env```.
5. Ejecutar ```php -S localhost:8000 -t public```.
6. Realizar una peticion tipo ```GET``` a esta URL ```http://localhost:8000/poker/``` añadiendo al final la baraja de cartas que desea validar ejemplo ```http://localhost:8000/poker/2,3,4,5,6,7``` Adicional se adjunta una coleccion de Postman con varios ejemplos ```Dafiti.postman_collection.json```.
7. Los tests se ejecutan con ```vendor/bin/phpunit```.
