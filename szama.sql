-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 25 Wrz 2023, 20:25
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `szama`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`id`, `name`, `image_path`) VALUES
(1, 'Słodkie', 'szukaj/slodkie.jpg'),
(2, 'Słone', 'szukaj/slone.jpg'),
(3, 'Dania główne', 'szukaj/danie.jpg'),
(4, 'Śniadania', 'szukaj/sniadanie.jpg'),
(5, 'Kolacja', 'szukaj/kolacja.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `message` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `comment`
--

INSERT INTO `comment` (`id`, `date`, `message`, `user_id`, `post_id`) VALUES
(1, '2023-09-22 16:28:54', 'Test', 1, 1),
(7, '2023-09-25 16:13:25', 'test', 1, 2),
(8, '2023-09-25 17:58:26', 'Test z 2 konta', 2, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `ingredients` text NOT NULL,
  `preparation` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `post`
--

INSERT INTO `post` (`id`, `title`, `description`, `ingredients`, `preparation`, `date`, `user_id`, `image_path`, `categories_id`, `status`) VALUES
(1, 'Przepis na batony miodowe.', 'Baton z miodem to wyjątkowa przekąska, która łączy w sobie słodycz miodu, kremowość masła orzechowego oraz chrupkość płatków owsianych i orzechów. To smaczny i pożywny sposób na dostarczenie sobie energii w ciągu dnia. Konsystencja batona jest miękka i lekko klejąca, dzięki czemu doskonale komponuje się z chrupiącymi orzechami i delikatnie słodkimi owocami. Dodatek ekstraktu z wanilii podkreśla głęboki smak miodu, a szczypta soli balansuje całość, nadając nieco kontrastu. Baton z miodem jest idealny na szybki posiłek po treningu, jako przekąska do pracy lub po prostu jako słodki i sycący smakołyk w każdym momencie dnia.\n', '1 szklanka płatków owsianych| 1/2 szklanki miodu, 1/2 szklanki masła orzechowego| 1/2 szklanki posiekanych orzechów (np. orzechów włoskich lub migdałów)| 1/4 szklanki suszonych owoców, 1 łyżeczka ekstraktu z wanilii| Szczypta soli', 'W dużym rondlu lub kastrolu rozpuść masło orzechowe i miód na średnim ogniu. |\nMieszaj, aż składniki się połączą i masa stanie się gładka. |\nDodaj ekstrakt z wanilii oraz szczyptę soli. |\nMieszaj, aby równomiernie rozprowadzić składniki. |\nZdejmij rondel z ognia i dodaj płatki owsiane, posiekane orzechy oraz opcjonalnie suszone owoce. |\nDokładnie wymieszaj, aby wszystkie składniki były równomiernie pokryte masą. |\nPrzygotuj formę o wymiarach około 20x20 cm, wyłożoną pergaminem. |\nPrzenieś masę do formy i równomiernie ją rozprowadź, delikatnie dociskając wierzch, aby uzyskać jednolitą powierzchnię. |\nWłóż formę do lodówki na co najmniej 2-3 godziny lub do momentu, aż masa stwardnieje. |\nPo schłodzeniu wyjmij baton z formy, wytnij go na mniejsze kawałki i podawaj.', '2023-09-25 20:04:01', 2, 'burger.PNG', 1, 0),
(2, 'Przepis na Pieczone Skrzydełka z Miodem', 'Pieczone skrzydełka z miodem to pyszna przekąska lub danie główne, które łączy w sobie słodycz miodu z delikatnymi przyprawami. Skrzydełka przed pieczeniem marynują się w mieszance miodu, sosu sojowego, imbiru i innych aromatycznych składników, co nadaje im wyjątkowy smak. Pieczone do złocistego koloru, są soczyste w środku, a lekko karmelizowana glazura nadaje im apetyczny wygląd. To idealna propozycja na przyjęcia, spotkania ze znajomymi czy rodzinne obiady. ', '500 g skrzydełek kurczaka |\n3 łyżki miodu |\n2 łyżki sosu sojowego |\n1 łyżka oliwy z oliwek |\n2 ząbki czosnku, drobno posiekane |\n1 łyżeczka świeżego imbiru, startego |\nSól i pieprz do smaku |\nŚwieża kolendra lub natka pietruszki do posypania (opcjonalnie)', 'W misce przygotuj marynatę, mieszając miód, sos sojowy, oliwę z oliwek, posiekany czosnek, starty imbir, sól i pieprz. Marynatę dobrze wymieszaj, aż składniki się połączą. |\n\nSkrzydełka umyj i osusz. Następnie umieść je w misce i polej przygotowaną marynatą. Dokładnie wymieszaj, aby skrzydełka były równomiernie pokryte marynatą. Możesz zostawić je w misce na około 30 minut lub dłużej, aby składniki się przegryzły. |\n\nPrzed rozpoczęciem pieczenia, nagrzej piekarnik do 200°C. |\n\nNa blasze wyłożonej pergaminem ułóż skrzydełka, układając je obok siebie, ale nie za bardzo na siebie nachodzące. |\n\nPiecz skrzydełka w nagrzanym piekarniku przez około 30-35 minut lub do momentu, gdy będą złociste i dobrze przypieczone. W trakcie pieczenia możesz skręcić je na drugą stronę, aby równomiernie się upiekły. |\n\nPo wyjęciu ze piekarnika, skrzydełka polej pozostałą marynatą, aby dodatkowo podkreślić smak miodu i przypraw. |\n\nPrzed podaniem posyp skrzydełka świeżą kolendrą lub natką pietrusz', '2023-09-25 20:04:01', 1, 'skrzydelka.jpg', 3, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `username`) VALUES
(1, 'admin', 'admin', 'mateusz'),
(2, 'admin2', 'admin', 'Mateusz Maniak'),
(4, 'admin3', 'admin', 'admin1');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indeksy dla tabeli `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`);

--
-- Ograniczenia dla tabeli `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
