-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 08 2020 г., 23:51
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `img`
--

CREATE TABLE `img` (
  `id` int(10) NOT NULL,
  `img_name` varchar(20) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `price` int(8) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `views` int(10) NOT NULL COMMENT 'Просмотров'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `img`
--

INSERT INTO `img` (`id`, `img_name`, `item_name`, `price`, `description`, `views`) VALUES
(1, '1.jpg', 'Стивен Кинг: Институт', 750, 'Еще недавно у двенадцатилетнего Люка Эллиса была вполне привычная жизнь: школа, обеды с родителями в любимой пиццерии, вечера в компании лучшего друга… Пока одним июньским утром он не просыпается в собственной комнате, вот только в ней нет окон и находится она в тщательно укрытом от всего мира месте под названием \"Институт\".\r\nЗдесь над похищенными из разных городов детьми, обладающими даром телепатии или телекинеза, проводят жестокие эксперименты с целью максимально развить их паранормальные способности.\r\nБежать невозможно. Будущее предопределено, и это будущее - загадочная Дальняя половина Института, откуда не возвращался еще никто…\r\nОднако Люк не намерен сдаваться. Он уверен: в любой системе есть слабое место и он дождется часа, когда сможет вновь оказаться на свободе...', 15),
(2, '2.jpg', 'Гузель Яхина: Зулейха открывает глаза', 502, 'Гузель Яхина родилась и выросла в Казани, окончила факультет иностранных языков, учится на сценарном факультете Московской школы кино. Публиковалась в журналах \"Нева\", \"Сибирские огни\", \"Октябрь\".\r\nРоман \"Зулейха открывает глаза\" начинается зимой 1930 года в глухой татарской деревне. Крестьянку Зулейху вместе с сотнями других переселенцев отправляют в вагоне-теплушке по извечному каторжному маршруту в Сибирь.\r\nДремучие крестьяне и ленинградские интеллигенты, деклассированный элемент и уголовники, мусульмане и христиане, язычники и атеисты, русские, татары, немцы, чуваши - все встретятся на берегах Ангары, ежедневно отстаивая у тайги и безжалостного государства свое право на жизнь.\r\nВсем раскулаченным и переселенным посвящается.', 13),
(3, '3.jpg', 'Михаил Лабковский: Хочу и буду. Принять себя, полюбить жизнь и стать счастливым', 499, 'Вы сможете понять, почему ваша жизнь не складывается так, как вам этого хочется; поймете, в какой момент что-то пошло не так, и сможете решить свои проблемы с помощью советов Михаила Лабковского, одного из самых известных и авторитетных психологов России.\r\nВ этой книге вы найдете узнаваемые ситуации и даже словечки, характерные для каждой российской семьи \"школы жизни\", примеры проявления \"родной\" ментальности и поймете, в чем подвохи такой знакомой нам психологии поведения. Узнаете, откуда в нас агрессия, неуверенность в себе, в чем корни психологии жертвы и неумения постоять за себя.\r\nИзучив эту книгу, вы узнаете, как гарантированно наладить отношения с самим собой, обрести счастье в личной жизни и вырастить счастливых детей.\r\nЭта книга из тех, что не устаревают с годами; из тех, в которых отмечают важные места карандашом; из тех, что дарят друзьям и близким, а свой экземпляр бережно хранят в домашней библиотеке, чтобы передать детям. И, конечно, из тех, что разбирают на...', 37),
(4, '4.png', 'Роберт Стивенсон: Остров Сокровищ', 1920, 'Знаменитый роман Роберта Льюиса Стивенсона в сопровождении подробного историко-бытового комментария, посвященного морскому делу в Англии XVIII века и \"золотому веку\" пиратства. Рисунки, гравюры, карты, страницы из книг того времени, интерактивные элементы помогают воссоздать живую атмосферу эпохи. В Англии, близ Бристоля, в таверне \"Адмирал Бенбоу\", в комнате старого капитана, в матросском сундуке, в пакете из клеенки надежно спрятано то, с чего начинаются приключения, известные каждому мальчишке. В Англию XVIII века мы отправимся с этой книгой, чтобы тут же выйти в море и в долгом плавании к острову Сокровищ постичь все морские премудрости. Здесь за текстом знакомого романа оживает эпоха, а в рассказах Капитана Флинта встает перед глазами грозная история пиратства. Здесь можно рассмотреть каждый уголок шхуны от салинга до кильсона, заглянуть в сундучок доктора Ливси, набрать команду корабля вместе со сквайром Трелони, научиться вести судовой журнал, прокладывать курс, считать пиастры...', 96),
(5, '5.png', 'Джон Фарндон: Большое путешествие по телу человека', 588, 'В этой книге подробно, наглядно и невероятно увлекательно рассказано о том, как устроен и как работает человеческий организм. Из чего состоит наше тело, что такое клетки, ткани и органы? Как работают мышцы, нервы и гормоны? Для чего нужны вода и еда и что с ними происходит в организме человека? Почему мы болеем и как выздоравливаем, как распознаем запахи и вкусы? Как мы думаем? Почему мы похожи на своих родителей?\r\nПодробный ответ на каждый вопрос разбит на удобные блоки и проиллюстрирован так, что становится ясно не только как устроено человеческое тело, но и как именно происходят в нем все жизненные процессы.\r\nСовременная и оригинальная по замыслу и исполнению научно-популярная книга написана известным британским писателем Джоном Фарндоном, лауреатом книжных премий в США и Великобритании.\r\nДля детей 8-12 лет', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `review`
--

CREATE TABLE `review` (
  `id` int(8) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `text` varchar(2000) NOT NULL,
  `item_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `review`
--

INSERT INTO `review` (`id`, `user_name`, `text`, `item_id`) VALUES
(4, 'Эдуард', 'Хорошая книга!', 4),
(5, 'Аноним', 'Неплохо.', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `img_name` (`img_name`);

--
-- Индексы таблицы `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `img`
--
ALTER TABLE `img`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `review`
--
ALTER TABLE `review`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
