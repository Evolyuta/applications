<?
$title = 'Сайт заявок';
$header = "Добро пожаловать на наш сайт!";
$id = strtolower(strip_tags(trim($_GET['id'])));
// Инициализация заголовков страницы
switch ($id) {
    case 'contact':
        $title = 'Контакты';
        $header = 'Обратная связь';
        break;
    case 'gbook':
        $title = 'Гостевая книга';
        $header = 'Наша гостевая книга';
        break;
}
