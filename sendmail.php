<?php 
// если была нажата кнопка "Отправить" 
//if (isset($_POST['submit'])) {
       // $name = substr(htmlspecialchars(trim($_POST['name'])), 0, 10); 
       // $mess =  substr(htmlspecialchars(trim($_POST['question'])), 0, 100); 
        // $to - кому отправляем 
       // $to = 'kren5@rambler.ru'; 
        // $from - от кого 
      //  $from = substr(htmlspecialchars(trim($_POST['email'])), 0, 30);  
        // функция, которая отправляет наше письмо
      //  if (mail($to, $name, $mess, 'From:'.$from)) echo 'Спасибо! Ваше письмо отправлено.'; 
      //  else echo 'Неудача'; 
//} 



//Если форма отправлена
  if (isset($_POST['submit'])) {
           //Проверка Поля ИМЯ
          if (trim($_POST['name']) == '') {
            $hasError = true;
            } else {
                $name =substr(htmlspecialchars(trim($_POST['name'])), 0, 10); 
                }
 
 //Проверка правильности ввода EMAIL
  if (trim($_POST['email']) == '')  {
  $hasError = true;
  } else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
  $hasError = true;
  } else {
  $email =substr(htmlspecialchars(trim($_POST['email'])), 0, 30);  
  }
 //Проверка наличия ТЕКСТА сообщения
  if(trim($_POST['question']) == '') {
  $hasError = true;
  } else {
  if(function_exists('stripslashes')) {
  $comments = stripslashes(trim($_POST['question']));
  } else {
  $comments = substr(htmlspecialchars(trim($_POST['question'])), 0, 100); 
  }
  }
 //Если ошибок нет, отправить email
  if(!isset($hasError)) {
  $emailTo = 'kren5@rambler.ru'; //Сюда введите Ваш email
  $body = "Name: $name \n\nEmail: $email \n\nComments: $comments\n\n";
   mail($emailTo, $body, $headers);
  $emailSent = true;
  }
      if ($emailSent == true) echo 'Спасибо! Ваше письмо отправлено.'; 
      else if ($hasError == true) echo 'Ваше письмо не отправлено! <br> Проверьте правильность заполнения полей!'; 
  }
?>


        <html>

        <head>
            <meta charset="UTF-8">
            <title>Отчет об отправлении</title>
        </head>

        <body>
            <a href="index.html">
                <input type="button" value="НАЗАД"></input>
            </a>
        </body>

        </html>