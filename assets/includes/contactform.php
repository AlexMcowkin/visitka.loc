<div class="contactformblock">

    <div class="mailmessage">
        <?php
        if(isset($_GET['message']))
        {
            if($_GET['message'] == 'yes')
            {
                echo '<div class="success"><p>Ваше сообщение отправлено!</p></div>';
            }
            elseif($_GET['message'] == 'no')
            {
                echo '<div class="error"><p>Вы не верно заполнили форму!</p></div>';
            }
            else
            {
                echo '<div class="error"><p>Тут шаманило НЛО!</p></div>';
            }
        }
        ?>
    </div>

    <form action="assets/php/email.php" method="post" id="contactform">
    <!-- <form action="/assets/php/email.php" method="post" id="contactform"> -->
        
        <div class="alignleft">
            <input type="text" name="inputName" id="inputName" value="" placeholder="Ваше Имя" required pattern="[A-Za-z0-9 ]{3,30}"/>
            
            <input type="email" name="inputEmail" id="inputEmail" value="" placeholder="Ваш Email" required/>
            
            <div class="alignleft">
                <img src="assets/php/kartinka.php?sid=<?= md5(time());?>" alt="код" title="код" id="kartinka" />
                <a href="#" class="refresh" onclick="document.getElementById('kartinka').src = 'assets/php/kartinka.php?sid=' + Math.random(); return false;">обновить</a>
            </div>

            <input type="text" name="inputCode" id="inputCode" value="" placeholder="Введите код с картинки" required class="alignright" autocomplete="off" pattern="[A-Za-z0-9]{5}"/> 

            <div class="clear"></div>  
        </div>

        <div class="alignright">
            <textarea name="inputText" id="inputText" placeholder="Ваше Сообщение..." required></textarea>  
        </div>
        <div class="clear"></div>

        <input type="submit" name="submitButton" id="submitButton" value="Отпрвить">
        <input type="reset" name="resetButton" id="resetButton" value="Отказаться">
    </form>
</div>