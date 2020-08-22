<?php
    /*ПОМЕЩАЕМ ДАННЫЕ ИЗ ПОЛЕЙ В ПЕРЕМЕННЫЕ*/
    $email = $_POST["email_popup"];
    $teleg = $_POST["teleg_popup"];

    /*ЗДЕСЬ ПРОВЕРЯЕМ ЕСЛИ ХОТЯ БЫ ОДНО ИЗ ПОЛЕЙ НЕ ЗАПОЛНЕНО МЫ ВОЗВРАЩАЕМ СООБЩЕНИЕ*/
    if($email=="" or $teleg==""){
        echo "Заполните все поля";
    }

    else{
        /*ЕСЛИ ВСЕ ПОЛЯ ЗАПОЛНЕНЫ НАЧИНАЕМ СОБИРАТЬ ДАННЫЕ ДЛЯ ОТПРАВКИ*/
        $to = "Limontiktok@mail.ru"; /* Адрес, куда отправляем письма */
        // $to = "	97fyl97@gmail.com"; /* Адрес, куда отправляем письма */
        $subject = "Покупка курса ПОД КРЫЛО"; /*Тема письма*/
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        $headers .= "From: <Limontiktok@mail.ru>\r\n";/*ОТ КОГО*/

        /*ВО ВНУТРЬ ПЕРЕМЕННОЙ $message ЗАПИСЫВАЕМ ДАННЫЕ ИЗ ПОЛЕЙ */
        $message .= "Почта пользователя: ".$email."\n";
        $message .= "Соц сети покупателя: ".$teleg."\n";
        $check = '';
       if (!empty($_POST["check"]) && is_array($_POST["check"]))
         {
             $check = implode(" ", $_POST["check"]);
         }
         $message .= "Платежка: ".$check."\n";
        /*ДЛЯ ОТЛАДКИ ВЫ МОЖЕТЕ ПРОВЕРИТЬ ПРАВИЛЬНО ЛИ ЗАПИСАЛИCM ДАННЫЕ ИЗ ПОЛЕЙ*/

        $send = mail($to, $subject, $message, $headers);
        
        /*ЕСЛИ ПИСЬМО ОТПРАВЛЕНО УСПЕШНО ВЫВОДИМ СООБЩЕНИЕ*/
        if ($send == "true")
        {
           
            header('Location: http://limontiktok.com/');
            echo '<script language="javascript">';
            echo 'alert("Курс будет у вас на почте в ближайщее время")';
             echo '</script>';
        }
        /*ЕСЛИ ПИСЬМО НЕ УДАЛОСЬ ОТПРАВИТЬ ВЫВОДИМ СООБЩЕНИЕ ОБ ОШИБКЕ*/
        else
        {
          
             header('Location: http://limontiktok.com/');
             echo '<script language="javascript">';
             echo 'alert("Не удалось отправить, попробуйте снова!")';
              echo '</script>';
        }
    }

?>