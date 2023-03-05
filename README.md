# Survey service

Service aggregator for conducting fake surveys

A necessary service that can provide functionality for managing fake surveys (with a predetermined number of votes) (hereinafter referred to as "surveys").

The service user should be able to enter the public part of the program, register, and create any number of surveys with a predetermined number of answers to a particular question in the format:

Question?

1. Answer 1
2. Answer 2
3. ...
   ...
   n. ...

Necessary functionality:

1. Authentication on the service.
   Registration page
   Login page
   Logout
2. The user only needs an email and password.
3. Authenticated users go to their personal account.
4. Personal cabinet:
   Contains a section with a list of their own surveys.
   Sorting the list by "creation date", "title", "status".
   CRUD for managing surveys.
   Each survey contains:
   	text of the question (title);
   	any number of answers;
   	number of votes for each answer;
   	status "draft" or "published".

The end user who uses this service should have access to the API to receive data on a published random survey from their list.
The data should include:
Title
response items with the number of votes for each of them.

The API will be tested using Postman.

Implementation requirements:

It is necessary to implement the MVC model using pure PHP
PHP frameworks cannot be used, libraries can be used.
This application does not require a complex architecture, solve the tasks set with the minimum amount of code.
Bootstrap layout, no special requirements.

After completing the task, it is necessary to:
Provide a link to the git repository of your work.
Provide minimal necessary documentation in any readable format with a description of the API's operation.
Deploy on any free hosting so that you can see the result.

# Сервіс опитувань

Сервіс агрегатор для проведення фіктивних опитувань

Необхідний сервіс, який може надати функціонал управління фіктивними (з попередньо визначеною кількістю голосів) опитуваннями (далі просто - "опитування").

Користувач сервісу повинен мати можливість зайти на публічну частину програми, зареєструватися та створити будь-яку кількість опитувань, із заздалегідь проставленою кількістю відповідей на той чи інший пункт, у форматі:

Запитання?

1. Відповідь 1
2. Відповідь 2
3. …
   …
   n. …

Необхідний функціонал:

1. Аутентифікація на сервісі.
   Сторінка реєстрації
   Сторінка логіна
   Розлогіна
2. Від користувача потрібен лише email та пароль.
3. Аутентифікований користувач потрапляє до особистого кабінету.
4. Особистий кабінет:
   Містить розділ зі списком власних опитувань.
   Сортування списку за “датою створення”, “заголовком”, “статусом”.
   CRUD для керування опитуваннями.
   Кожне опитування містить:
   	текст питання (заголовок);
   	будь-яку кількість відповідей;
   	кількість голосів до кожної з відповідей;
   	статус "чернетка" або "опублікований".

Кінцевий користувач, який використовує цей сервіс, повинен отримати доступ до API для отримання даних опублікованого рандомного опитування зі свого списку.
Дані повинні містити:
Заголовок
пункти відповідей з кількістю голосів щодо кожного з них.

API тестуватиметься з використанням Postman.

Вимоги до реалізації:

Потрібно за допомогою чистого PHP реалізувати модель MVC
Фреймворки PHP використовувати не можна, бібліотеки можна.
Цьому додатку не потрібна складна архітектура, розв'яжіть поставлені завдання мінімально необхідною кількістю коду.
Верстка на bootstrap, до особливих вимог немає.

Після виконання завдання необхідно:
Надати посилання на git репозиторій Вашої роботи.
Надати мінімально необхідну документацію в будь-якому зручному для читання вигляді з описом роботи API.
Розгорнути на будь-якому безкоштовному хостингу, щоб можна було подивитися на результат.
