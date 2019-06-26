<h3>Оставьте заявку в нашей Гостевой книге</h3>

<form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
    ФИО: <br/><input type="text" name="name"/><br/>
    Адрес: <br/><input type="text" name="address"/><br/>
    Телефон: <br/><input type="text" name="phone"/><br/>
    Email: <br/><input type="text" name="email"/><br/>
    Сообщение: <br/><textarea name="msg"></textarea><br/>

    <br/>

    <input type="submit" name="send" value="Отправить!"/>

</form>

