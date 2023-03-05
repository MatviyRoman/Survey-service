опис api:
Ця функція отримує випадкове опубліковане опитування, створене користувачем, який наразі ввійшов у систему, разом із відповідним запитанням і варіантами відповідей.

Метод запиту: POST

Кінцева точка: https://survey.matviy.pp.ua/api/random

Параметри:

email: (обов’язково) адреса електронної пошти користувача, який бажає пройти автентифікацію.
пароль: (обов’язково) Пароль користувача, який бажає авторизуватися.
Відповідь:

200 OK – повертає запитання та відповіді випадкового опитування у форматі JSON.
401 Unauthorized - повертає повідомлення про помилку, яке вказує на те, що користувач не автентифікований.
404 Не знайдено - повертає повідомлення про помилку, яке вказує на відсутність опублікованих опитувань поточного користувача.

Зразок запиту:

POST /api/random HTTP/1.1
Host: survey.matviy.pp.ua
Content-Type: application/json

{
    "email": "user@example.com",
    "password": "secretpassword"
}

Зразок відповіді:

HTTP/1.1 200 OK
Content-Type: application/json

{
    "question": "Яке твоє любиме місто?",
    "answers": [
        {
            "text": "Львів",
            "votes": 10
        },
        {
            "text": "Київ",
            "votes": 7
        },
        {
            "text": "Одеса",
            "votes": 3
        }
    ]
}


#####

api description:
This function retrieves a random published poll created by the currently logged in user, along with the corresponding question and answer options.

Request method: POST

End point: https://survey.matviy.pp.ua/api/random

Parameters:

email: (required) email address of the user who wants to be authenticated.
password: (required) Password of the user who wants to log in.
Answer:

200 OK - Returns random poll questions and answers in JSON format.
401 Unauthorized - returns an error message indicating that the user is not authenticated.
404 Not Found - returns an error message indicating that there are no published surveys for the current user.

Sample request:

POST /api/random HTTP/1.1
Host: survey.matviy.pp.ua
Content-Type: application/json

{
     "email": "user@example.com",
     "password": "secretpassword"
}

Sample answer:

HTTP/1.1 200 OK
Content-Type: application/json

{
     "question": "What is your favorite city?",
     "answers": [
         {
             "text": "Lviv",
             "votes": 10
         },
         {
             "text": "Kyiv",
             "votes": 7
         },
         {
             "text": "Odesa",
             "votes": 3
         }
     ]
}

