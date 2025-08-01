-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 01 août 2025 à 16:07
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tomtroc`
--

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int DEFAULT NULL,
  `images` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(256) NOT NULL,
  `sell_by` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `available` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user_idx` (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`id`, `id_user`, `images`, `title`, `author`, `sell_by`, `description`, `available`) VALUES
(1, 4, 'images/images_book/The Kinkfolk Table.jpg', 'The Kinkfolk Table', 'Nathan Williams', 'Alexlecture', 'J\'ai récemment plongé dans les pages de \'The Kinfolk Table\' et j\'ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d\'une simple collection de recettes ; il célèbre l\'art de partager des moments authentiques autour de la table. Les photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité. Chaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers. \'The Kinfolk Table\' incarne parfaitement l\'esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.', '1'),
(2, 5, 'images/images_book/Esther', 'Esther', 'Alabaster', 'CamilleClubLit', 'The Book of Esther: Un livre curieux et passionnant sur l\'expérience de Dieu à l\'œuvre au milieu des rencontres fortuites, du destin et de la providence divine.\r\n\r\nLa beauté de la Bible. Images visuelles et conception réfléchie intégrées au texte de la Bible. Des images qui éclairent les thèmes et les messages du texte aideront le lecteur à interagir avec les Écritures d\'une nouvelle manière. Utilisation judicieuse de l\'espace, police des caractères facilitant la lecture et mise en page permettant une exploration réfléchie entre le texte et les images. Imprimé sur du papier de haute qualité pour une expérience belle au regard et au toucher.', '1'),
(3, 4, 'images/images_book/Wabi Sabi.jpg', 'Wabi Sabi', 'Beth Kempton', 'Alexlecture', 'Dans un monde gouverné par la quête perpétuelle de la perfection, l\'accélération du temps et la performance en tout, le wabi sabi se présente comme une faille salvatrice. Ce fascinant concept japonais, intraduisible dans notre culture occidentale, est une invitation à nous accepter tels que nous sommes. Il nous donne les outils nécessaires pour échapper aux pressions de la vie moderne en nous aidant à nous contenter de moins. Grâce à des applications concrètes des principes du wabi sabi (honorer les rythmes de la nature, aménager son intérieur, s\'intéresser aux détails du quotidien...), ce livre révèle comment cultiver le plaisir et multiplier les moments parfaits dans un monde imparfait.', '1'),
(4, 3, 'images/images_book/Milk & honey.jpg', 'Milk & honey', 'Rupi Kaur', 'Hugo1990_12', 'De l’expérience de la violence, des abus sexuels, de l’amour, de la perte et de la féminité. Le recueil comprend quatre chapitres, et chacun obéit à une motivation différente, traite une souffrance différente, guérit une peine différente. lait et miel convie les lecteurs à un voyage à travers les moments les plus amers de l’existence, mais y trouve de la douceur, parce qu’il y a de la douceur partout si l’on sait regarder.', '1'),
(5, 5, 'images/images_book/Delight!.jpg', 'Delight!', 'Justin Rossow', 'CamilleClubLit', 'Ce livre vous aidera à découvrir la Joie, la Pensée, le Jeu, le Délicieux et le Désirable dans votre vie avec Dieu. « La Joie !» vous invite à vivre l\'aventure de suivre Jésus d\'une manière authentique, accessible et concrète. Bien sûr, vous connaîtrez les difficultés et l\'échec. Bien sûr, vous connaîtrez le chagrin et la honte. Mais vous n\'avez pas à porter le fardeau de bien marcher dans la foi ; vous faites déjà bondir Jésus de joie et chanter son chant joyeux. Le Créateur de l\'Univers vous considère comme quelqu\'un d\'exceptionnel. Même lorsque la vie est confuse ou difficile, l\'Esprit vous façonne avec soin et joie.\r\nLâchez prise. Respirez profondément. Et explorons ce que signifie suivre Jésus dans l\'aventure de votre vie : une aventure marquée par les défis, la repentance et les difficultés, mais surtout par la joie mutuelle !', '1'),
(6, 4, 'images/images_book/Minimalist Graphics.jpg', 'Minimalist Graphics', 'Julia Schoniau', 'Alexlecture', 'Maia Francisco présente une approche avant-gardiste du design graphique, minimaliste, dans son ouvrage révolutionnaire « Minimal Graphics ». Après son ouvrage « Sourcebook of Contemporary Graphic Design », salué par la critique, Maia Francisco propose un regard éclairant sur les tendances et concepts les plus récents et les plus recherchés du secteur : une ressource efficace et indispensable pour le graphiste moderne. Cette description peut provenir d\'une autre édition de ce produit.', '0'),
(7, 3, 'images/images_book/hygge.jpg', 'Hygge', 'Meik Wiking', 'Hugo1990_12', 'Pourquoi les Danois sont-ils les gens les plus heureux du monde ? Pour Meik Wiking, directeur de l’Institut de recherche sur le bonheur à Copenhague, la réponse est simple : grâce au hygge.\r\n\r\nSans équivalent français, le terme « hygge » (à prononcer « hoo-ga ») évoque les notions de confort, du vivre-ensemble et de bien-être profond.\r\n\r\n« Le hygge est une ambiance, une véritable atmosphère » explique Meik Wiking. » C’est profiter de ceux que l’on aime en passant du temps auprès d’eux, avec ce sentiment de se sentir chez soi, en sécurité. »\r\n\r\nLe hygge, c’est ce que vous éprouvez lorsque vous vous prélassez sur votre canapé, des chaussettes douillettes aux pieds, emmitouflé dans une couverture douce tout en observant par la fenêtre les éclairs d’un gros orage. C’est le bonheur que vous ressentez lorsque vous partagez une conversation et un délicieux repas avec vos proches autour d’une table ornée de bougies. C’est la chaleur des premiers rayons de soleil sur votre visage un jour de ciel bleu.\r\n\r\nLe hygge est une philosophie de vie\r\n\r\nLe hygge c’est un peu la Dolce vita à la danoise… Le constat est simple ; les Danois caracolent en tête du World happiness report depuis plusieurs années, en dépit d’un hiver très froid et d’un taux d’ensoleillement moindre. Quel est leur secret ? Le hygge pardi !\r\n\r\nSelon Meik Wiking, auteur du Livre du Hygge et président de l’Institut de recherche sur le bonheur de Copenhague, ce mot « dérive d’un terme norvégien qui signifie “bien-être” ». Ce concept est associé au confort d’un intérieur douillet avec un éclairage chaleureux et aux sentiments de partage, de convivialité et d’authenticité.\r\n\r\nLe hygge est un art de vivre\r\n\r\nLe hygge s’inspire du mode de vie des Danois qui passent beaucoup de temps en intérieur l’hiver. Pour « survivre » à l’hiver danois, ils ont développé une stratégie axée sur le coconning et la simplicité : matières douillettes, éclairages chaleureux, feu de cheminée et moments de partage en famille ou entre amis autour d’un bon dîner, d’un goûter ou d’une tasse de thé.\r\n\r\nLe hygge se partage\r\n\r\nUn moment hygge, c’est aussi avoir une certaine ouverture d’esprit à l’autre en général. Profiter d’un dîner partagé et éclairé à la bougie en ayant des discussions calmes et chaleureuses (le contraire du dîner de famille qui finit en éclatante polémique), lire un bon livre, être installés dans le confort d’un canapé à plusieurs quand chacun vaque à ses occupations, passer du temps précieux à jouer avec ses enfants – tout ça sans avoir le portable à la main bien sûr.\r\n\r\nLe Livre du Hygge vous invite à découvrir les grands principes de cette philosophie de vie danoise, avec de nombreux conseils et idées pour l’incorporer à votre quotidien :\r\n\r\nSe mettre à l’aise et faire un break ;\r\nProfiter de l’instant présent (et couper son téléphone) ;\r\nÉteindre les lumières et profiter de la lueur des bougies ;\r\nPrendre soin de ses relations et passer plus de temps avec ses proches ;\r\nS’autoriser des petits écarts et mettre de côté les principes de bonne santé (les gâteaux font bien partie du hygge !)\r\nVivre chaque jour, et chaque café, comme si c’était le dernier.', '1'),
(8, 4, 'images/images_book/Innovation.jpg', 'Innovation', 'Matt Ridley', 'Alexlecture', 'Dans son livre « How Innovation Works », Matt Ridley offre un aperçu complet de l\'histoire de l\'innovation et de son influence sur notre monde. L\'ouvrage explore les différentes formes d\'innovation à travers l\'histoire, du développement du langage à l\'invention d\'Internet. Ridley soutient que l\'innovation n\'est pas seulement le fruit du génie individuel, mais plutôt un effort collectif qui implique collaboration, tâtonnements et capitalisation sur le travail des autres.', '0'),
(9, 5, 'images/images_book/Psalms.jpg', 'Psalms', 'Alabester', 'CamilleClubLit', 'A beautiful representation of The Book of Psalms --raw, honest poems telling the story of humans and the desire to know God. This ancient and timeless book of poetry and songs highlights the full range of emotional and spiritual experiences we live through as human beings. Readers learn about mourning, grief, lament, love, joy, forgiveness, and what it means to connect with God in the midst of our complex lives. Alabaster\'s approach reimagines the entire experience of the book. Incorporating images that illuminate the themes and messages of the text, this book will help the reader engage scripture in a fresh way. The Book of Psalms in the New Living Translation (NLT) is great for Bible studies, church groups, or individual devotional times. Alabaster creates with the reader in mind--including careful use of negative space, legible typefaces, and layouts that allow a thoughtful exploration between text and images.', '0'),
(10, 5, 'images/images_book/Thinking, Fast & Slow.jpg', 'Thinking, Fast & Slow', 'Daniel Kahneman', 'CamilleClubLit', 'Le livre de Daniel Kahneman \"Thinking, Fast, and Slow\" traite de deux systèmes, l\'intuition et la pensée lente, qui nous aident à former notre jugement. Dans ce livre, il nous explique les principes de l\'économie comportementale et la manière dont nous pouvons éviter les erreurs lorsque les enjeux sont importants.\r\n\r\nIl le fait en abordant tous les sujets, de la psychologie humaine à la prise de décision, en passant par les paris boursiers et la maîtrise de soi.\r\n\r\nLe livre nous apprend que notre esprit combine deux systèmes : Le système 1, le mode de pensée rapide, fonctionne sans effort et instinctivement, en s\'appuyant sur l\'intuition et les expériences passées. En revanche, le système 2, le mode de pensée lente, s\'engage dans une analyse délibérée et logique, qui demande souvent plus d\'efforts.\r\n\r\nKahneman met en évidence la \"loi du moindre effort\" : l\'esprit humain est programmé pour emprunter la voie de la moindre résistance, et il n\'y a pas d\'autre choix que de s\'en remettre à la loi du moindre effort résoudre des problèmes complexes épuise notre capacité de réflexion. Cela explique pourquoi nous ne pouvons pas souvent réfléchir en profondeur lorsque nous sommes fatigués ou stressés.\r\n\r\nIl explique également comment les deux systèmes fonctionnent simultanément pour affecter nos perceptions et nos prises de décision. L\'être humain a besoin de ces deux systèmes, et la clé est de prendre conscience de la manière dont nous pensons afin d\'éviter des erreurs importantes lorsque les enjeux sont élevés.', '1'),
(11, 3, 'images/images_book/Le soleil et ses fleurs.jpg', 'Le soleil et ses fleurs', 'Rupi Kaur', '	\r\nHugo1990_12', 'Mêlant courts textes en prose, empruntant au journal intime comme aux maximes de sagesse indienne, à des dessins aux traits élégants et simples, sa poésie est à la frontière des genres – inclassable et universelle.\r\n\r\nDivisé en cinq parties, ce recueil est construit comme un voyage existentiel conduisant à la guérison : se faner, tomber, pourrir, se redresser puis fleurir et célébrer l\'amour sous toutes ses formes. Un voyage transcendant où il est question de racines, d\'apaisement, d\'épanouissement – mais aussi d\'expatriation et de rébellion ; où il s\'agit de trouver sa place et de s\'accepter.', '0'),
(12, 3, 'images/images_book/The Subtle Art Of Not Giving A Fuck.jpg', 'The Subtle Art Of Not Giving A Fuck', 'Mark Manson', '	\r\nHugo1990_12', 'Le subtil art de s\'en foutre\" de Mark Manson offre une perspective unique sur le développement personnel. Au lieu de promouvoir une positivité constante, il encourage les lecteurs à choisir ce qui compte vraiment et à accepter que la douleur et les défis font partie de la vie. Le message du livre consiste à donner la priorité à ce qui est important, à laisser de côté le futile et à trouver un bonheur authentique. Il allie humour, récits de la vie réelle et conseils pratiques pour vous aider à découvrir vos valeurs fondamentales. Plutôt que de prétendre que la vie est parfaite, il met l\'accent sur la reconnaissance des imperfections et sur la concentration sur ce qui compte réellement. Ce livre est un guide direct pour vivre une vie significative et authentique, remettant en question votre perspective et vous conduisant vers une existence plus épanouissante.', '0'),
(13, 6, 'images/images_book/Narnia.jpg', 'Narnia', 'C.S Lewis', 'Victoirefabre912', 'Quatre frères et sœurs, Peter, Susan, Edmund et Lucy, découvrent une armoire magique chez un vieux professeur qui les accueille durant les bombardements londoniens de la Seconde Guerre Mondiale. Pénétrer dans cette armoire, c’est franchir le seuil du monde de Narnia. Lucy, la benjamine, est la première, au cours d’une partie de cache-cache, à passer dans ce monde enneigé. Près d’un réverbère insolite isolé dans la forêt, elle y fait la rencontre d’un jeune faune abrité sous un parapluie. Lucy apprend alors que Narnia vit sous la coupe d’une impitoyable sorcière qui fait régner l’hiver et la terreur. Mais plusieurs créatures résistent en secret et attendent le retour du glorieux Lion Aslan, qui placera sur le trône de Narnia les Fils d’Adam et les Filles d’Eve…\r\nFruit du hasard et d’images dispersées dans l’esprit de Lewis, cette première Chronique charme en aussi peu de temps qu’il en faut pour franchir le fond de l’armoire. On pourrait feuilleter hâtivement le livre et croire qu’il s’agit d’un énième conte sans originalité. En fait, rien de manichéen dans ces personnages, hésitant entre la peur, le doute, l’espoir, la trahison, le repentir, la mesquinerie ou encore la jalousie. Narnia n’est pas un monde imaginaire où l’on s’évade mais où l’on se découvre.', '1'),
(14, NULL, 'images/images_book/Company Of One.jpg', 'Company Of One', 'Paul Jarvis', 'Victoirefabre912', 'Company of One explique comment vous pouvez atteindre le succès d\'une grande entreprise sans avoir à développer votre activité. L\'ouvrage fait valoir que le succès n\'est pas nécessairement défini par le volume ou le rythme de la croissance. En restant petit, vous pouvez construire votre entreprise en fonction des besoins et des préférences de votre style de vie grâce à des \"systèmes évolutifs\". En fin de compte, l\'accent mis sur le développement de systèmes évolutifs facilite la croissance sans avoir besoin d\'employés supplémentaires et favorise la satisfaction à long terme. ', ''),
(15, 6, 'images/images_book/The Two Towers.jpg', 'Le Seigneur des anneaux : Les Deux Tours', 'J.R.R Tolkien', 'Victoirefabre912', 'Après la mort de Boromir et la disparition de Gandalf, la Communauté s\'est scindée en trois. Perdus dans les collines d\'`Emyn Muil\', Frodon et Sam découvrent qu\'ils sont suivis par Gollum, une créature versatile corrompue par l\'anneau magique. Gollum promet de conduire les `Hobbits\' jusqu\'à la `Porte Noire\' du `Mordor\'. A travers la `Terre du Milieu\', Aragorn, Legolas et Gimli font route vers le `Rohan\', le royaume assiégé de Theoden.', '1'),
(16, 6, 'images/images_book/Harry Potter.jpg', 'Harry Potter à l\'école des sorciers', 'J. K. Rowling', 'Victoirefabre912', 'Harry Potter, un jeune orphelin, est élevé par son oncle et sa tante qui le détestent. Alors qu\'il était haut comme trois pommes, ces derniers lui ont raconté que ses parents étaient morts dans un accident de voiture. Le jour de son onzième anniversaire, Harry reçoit la visite inattendue d\'un homme gigantesque se nommant Rubeus Hagrid, et celui-ci lui révèle qu\'il est en fait le fils de deux puissants magiciens et qu\'il possède lui aussi d\'extraordinaires pouvoirs.', '0'),
(21, 4, 'images/images_book/book_688b6a4f57599.jpg', 'Orgueil et préjugés', 'Jane Austen', 'Alexlecture', 'Élisabeth Bennet a quatre sœurs et une mère qui ne songe qu\'à les marier. Quand parvient la nouvelle de l\'installation à Netherfield, le domaine voisin, de Mr Bingley, célibataire et beau parti, toutes les dames des alentours sont en émoi, d\'autant plus qu\'il est accompagné de son ami Mr Darcy, un jeune et riche aristocrate. Les préparatifs du prochain bal occupent tous les esprits...', '1');

-- --------------------------------------------------------

--
-- Structure de la table `conversations`
--

DROP TABLE IF EXISTS `conversations`;
CREATE TABLE IF NOT EXISTS `conversations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user1_id` int NOT NULL,
  `user2_id` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user1_id` (`user1_id`,`user2_id`),
  KEY `user2_id` (`user2_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `conversations`
--

INSERT INTO `conversations` (`id`, `user1_id`, `user2_id`, `created_at`) VALUES
(1, 3, 4, '2025-07-23 17:06:50'),
(2, 0, 3, '2025-07-23 17:48:47'),
(3, 0, 4, '2025-07-24 08:51:35'),
(4, 4, 4, '2025-07-24 08:51:41'),
(5, 5, 5, '2025-07-29 14:51:52'),
(6, 0, 5, '2025-07-29 14:53:15'),
(7, 3, 5, '2025-07-29 15:05:37');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `conversation_id` int NOT NULL,
  `sender_id` int NOT NULL,
  `receiver_id` int NOT NULL,
  `message` text NOT NULL,
  `sent_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `conversation_id` (`conversation_id`),
  KEY `sender_id` (`sender_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `conversation_id`, `sender_id`, `receiver_id`, `message`, `sent_at`, `is_read`) VALUES
(1, 1, 3, 1, 'bonjour', '2025-07-23 17:48:58', 0),
(2, 1, 4, 1, 'ça va ?', '2025-07-23 17:51:13', 0),
(3, 1, 3, 1, 'oui et toi ?', '2025-07-28 16:44:27', 0),
(4, 1, 4, 1, 'j\'adore tes livres', '2025-07-28 17:06:31', 0),
(5, 1, 3, 1, 'je vais en ajouter d\'autres bientôt', '2025-07-28 17:14:55', 0),
(6, 1, 4, 0, 'trop bien j\'ai hate', '2025-07-28 17:18:28', 0),
(7, 1, 3, 4, 'bonjour', '2025-07-28 17:37:49', 0),
(8, 6, 5, 0, 'bonjour', '2025-07-29 14:53:20', 0),
(9, 7, 3, 5, 'bonjour', '2025-07-29 15:05:41', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `picture` varchar(256) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_email` (`email`),
  UNIQUE KEY `unique_pseudo` (`pseudo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `email`, `password`, `created_at`, `picture`) VALUES
(1, 'damien', 'toto@hotmail.fr', '$2y$10$l7BffxqeWnBnnkONBLIH1exK2KksP/8aGrXxaVkn8G1pRpQXec./O', '2025-07-03 15:37:35', ''),
(2, 'David', 'damienchauveau33@gmail.com', '$2y$10$mn8eaVw70mIk0jfWGFLpyOKQ/QX0eYeI/v0pXJ0n0NUQ2WxWml/.6', '2025-07-03 15:48:53', ''),
(3, 'Hugo1990_12', 'hugotest@hotmail.fr', '$2y$10$THJ3J8q9QfJm72eYo7LWqeSrnKrZWGBSyqc80n0gBVWQmvS4cGjye', '2025-07-14 11:04:10', 'images/images_profile/profile_68889255eaad8.jpeg'),
(4, 'Alexlecture', 'alextest@hotmail.fr', '$2y$10$72YGFgped5i9Y3feRZL0CuBhzlrOdTYzGTrvOl4yRvgKU6o5wsGdW', '2025-07-16 15:16:55', 'images/images_profile/profile_6888fc71e904e.png'),
(5, 'CamilleClubLit', 'camilletest@hotmail.fr', '$2y$10$Ua06UkW21bi4LxkHMH6dGeGdFQn2TkgwMiYeQPkimCiYIKHKeImFu', '2025-07-29 14:47:58', 'images/images_profile/profile_6888c3cae2599.jpg'),
(6, 'Victoirefabre912', 'victoiretest@hotmail.fr', '$2y$10$MtzWGfaObjxxgHT/9vIO2eCeKiPxpgAZ0kIMfS8pjUs7AwHwBikyK', '2025-07-29 15:19:13', 'images/images_profile/profile_6888cadff117f.jpg');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
