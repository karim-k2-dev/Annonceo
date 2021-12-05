-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Client :  sql2.cluster1.easy-hebergement.net
-- Généré le :  Jeu 11 Mars 2021 à 15:28
-- Version du serveur :  5.5.60-0+deb7u1-log
-- Version de PHP :  7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hassanmansour`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE IF NOT EXISTS `annonce` (
  `id_annonce` int(3) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description_courte` varchar(255) NOT NULL,
  `description_longue` text NOT NULL,
  `prix` int(11) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `pays` varchar(20) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `cp` int(5) NOT NULL,
  `membre_id` int(3) NOT NULL,
  `photo_id` int(3) NOT NULL,
  `categorie_id` int(3) NOT NULL,
  `date_enregistrement` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `annonce`
--

INSERT INTO `annonce` (`id_annonce`, `titre`, `description_courte`, `description_longue`, `prix`, `photo`, `pays`, `ville`, `adresse`, `cp`, `membre_id`, `photo_id`, `categorie_id`, `date_enregistrement`) VALUES
(1, 'Iphone 5s', 'Ce telephone vous donnera entiére satisfaction, il est comme neuf, tout est d''origine, je le vends egalement avec des accessoires.', 'Ce telephone vous donnera entiére satisfaction, il est comme neuf, tout est d''origine, je le vends egalement avec des accessoires.Ce telephone vous donnera entiére satisfaction, il est comme neuf, tout est d''origine, je le vends egalement avec des accessoires.', 175, 'annonce1.jpg', 'france', 'bagneux', '1 Avenue du Maréchal Foch', 92260, 1, 1, 5, '2021-02-25 14:02:54'),
(2, 'Peugeot 406', 'Peugeot 406 coupe en excellent etat. Sous garantie fabricant. Tous les papiers sont en regle.  Prix negociable', 'Peugeot 406 coupe en excellent etat. Sous garantie fabricant. Tous les papiers sont en regle.  Prix negociablePeugeot 406 coupe en excellent etat. Sous garantie fabricant. Tous les papiers sont en regle.  Prix negociable', 2500, 'annonce2.jpg', 'france', 'paris', '12 Rue Armand Moisant', 75015, 2, 2, 2, '2021-02-25 15:05:15'),
(3, 'Appartement', 'Appartement F2 en location. Possibilite de colocation. Travaux effectues recemment. Proche transports', 'Appartement F2 en location. Possibilite de colocation. Travaux effectues recemment. Proche transportsAppartement F2 en location. Possibilite de colocation. Travaux effectues recemment. Proche transports', 1000, 'annonce3.jpg', 'france', 'paris', '1 Place d''Italie', 75013, 3, 3, 3, '2021-02-25 15:05:15'),
(4, 'samsung galaxy s8', 'samsung galaxy s8', 'samsung galaxy s8samsung galaxy s8samsung galaxy s8samsung galaxy s8samsung galaxy s8samsung galaxy s8', 320, 'samsung.jpg', 'france', 'rouen', '13 Avenue de Bretagne', 76100, 4, 4, 5, '2021-03-01 22:50:46'),
(5, 'Parfum Pierre Cardin', 'Un classique de l''une des marques les plus emblématiques du monde.', 'Un classique de l''une des marques les plus emblématiques du monde. Bleu Marine est un mélange de note orientale associé au Patchouli et bois de Santal pour donner vie à une fragrance rafraichissante et harmonieuse. Les notes de fond chaudes de la mousse de chêne...', 223, 'parfum1.jpg', 'france', 'Grasse', '73 Route de Cannes, 06130 Grasse', 6130, 3, 8, 6, '2020-08-14 22:08:32'),
(6, 'casque audio Sennheiser', 'Sans fil, on pourrait craindre que la diffusion sonore des films et émissions de téle.', 'Sans fil, on pourrait craindre que la diffusion sonore des films et émissions de télé perde en qualité. Elle est cependant optimisée par l''architecture du puissant émetteur que vous connecterez à la sortie audio de votre téléviseur. D''une portée de 50 mètres, la haute qualité vous suivra dans toute la maison.', 129, 'casque1.jpg', 'Allemagne', 'Wedemark', '30900 Wedemark, Allemagne', 30900, 1, 7, 5, '2019-06-12 22:13:06'),
(7, 'JOHNNIE WALKER Blue Label 40%', 'Chef d''œuvre d''équilibre et de douceur, Johnnie Walker Blue Label a été spécialement assemblé pour retrouver le goût et le caractère authentique des premiers assemblages créés au XIXème siècle. ', 'Chef d''oeuvre d''équilibre et de douceur, Johnnie Walker Blue Label a été spécialement assemblé pour retrouver le goût et le caractère authentique des premiers assemblages créés au XIXème siècle. Un assemblage des whiskies les plus rares et les plus précieux au monde. Le Blue Label est un whisky de dégustation. Complexe, intense et fruité. Nez boisé et légèrement fumé. Palais intense dominé par les fruits secs et le chocolat amer. Finale longue et intense marquée par des traces de tourbe et d''épices.\r\n\r\nComplexe, intense et fruité. Nez boisé et légèrement fumé. Palais intense dominé par les fruits secs et le chocolat amer. Finale longue et intense marquée par des traces de tourbe et d''épices.', 240, 'Whiskey', 'Angleterre', 'Kilmarnock ', 'Meiklewood Rd, Kilmarnock KA3 2ES, Royaume-Uni', 21234, 19, 11, 4, '2020-08-07 22:23:16'),
(8, '1100 Sport PRO', 'Une allure ultra sportive et esthétique. Dans sa livrée "Matt Black"', 'Une allure ultra sportive et esthétique. Dans sa livrée "Matt Black", avec ses suspensions Öhlins, son guidon bas et ses rétoviseurs type Café Racer, le Ducati Scrambler 1100 Sport PRO est le sportif le plus looké de la gamme.\r\nEquipé d’un guidon bas et de rétroviseurs type Café Racer. Livrée exclusive « Matt Black ». Flancs de réservoir interchangeables logotypés 1100.', 12400, 'moto3.jpg', 'Italie', 'Milano ', 'Via Francesco Arese, 20, 20159 Milano MI, Italie', 20159, 4, 6, 6, '2021-03-08 22:28:47'),
(9, 'Cheval de l’alezan', 'Les crins peuvent être plus clairs que la robe mais en aucun cas, les extrémités (le bas des membres, le bout du nez et le bout des oreilles) ou les crins ne peuvent être noirs.', 'Les poils sont fauves clairs plus ou moins dorés, les crins sont blanc-argent, plus clairs que les poils. \r\nLa peau est noire ou grise (jamais rose) et les yeux sont foncés (pas de bleu possible). \r\n\r\nLes nuances existent comme le palomino clair, palomino et palomino cuivré. \r\n\r\nLe palomino est une robe très évolutive : les chevaux ayant cette robe naissent souvent avec une teinte plus claire que celle qu’ils auront à l’âge adulte, sans pour autant devenir alezan. \r\n\r\nLe palomino charbonne souvent et des crins noirs peuvent apparaître. \r\n\r\n', 23000, 'cheval2.jpg', 'France', 'Troyes', 'Place Saint-Pierre, 10000 Troyes', 10000, 19, 10, 11, '2020-09-11 22:28:47'),
(11, 'Duracell Plus, Lot de 36 Piles Alcalines Type AA', 'chaque batterie de secours vous aide à prolonger la durée de vie de la batterie de votre smartphone ou de tout autre appareil alimenté par USB.', 'Les Duracell Powerbanks constituent une source d''énergie fiable que vous pouvez emporter partout où vous allez. Grâce à la technologie de recharge rapide et sa haute capacité, chaque batterie de secours vous aide à prolonger la durée de vie de la batterie de votre smartphone ou de tout autre appareil alimenté par USB. Comprend 10 dispositifs de sécurité pour une utilisation sûre et sans souci.', 34, 'pile3.jpg', 'france', '92250 ', '94 Rue Pierre Brossolette, 92250 La Garenne-Colomb', 92250, 21, 15, 5, '2020-08-12 21:35:36'),
(12, 'Macwheel 28" Vélo Électrique, Vélo Électrique Assistance, ', 'Moteur Puissant et Batterie avec Longue Durée: Le vélo électrique équipant 250W moteur sans balai avec une batterie haute capacité 36 V/10 Ah (350Ah), offre un couple de 44 NM avec une vitesse maximale de 25 km/h,', 'Moteur Puissant et Batterie avec Longue Durée: Le vélo électrique équipant 250W moteur sans balai avec une batterie haute capacité 36 V/10 Ah (350Ah), offre un couple de 44 NM avec une vitesse maximale de 25 km/h, et une autonomie de 60 à 80 km en mode cyclomoteur et de 30 à 40km en mode purement électrique. Une charge complète prend entre 6 et 8 heures\r\nComposants Electriques de Haute Qualité: Le vélo ville électrique est équipé des composants de haut calibre tels que SHIMANO dérailleurs, TEKTRO frein à disque, KENDA pneu, KMC chaîne etc. Tous les cadres en aluminium ont été rigoureusement testés pour garantir une qualité optimale, et il permet de réduire le poids et de prolonger la durée de vie\r\nMode Electrique Pur & Mode d’Assistance: Mode d’Assistance - Pédalez lorsque l''écran affiche 1-5 PAS. Plus le numéro est grand, moins il faut d''effort. Mode électrique pur - Tournez le levier d''accélérateur lorsque l''écran affiche 0 PAS. Plus la pression est actionné, plus la vitesse est rapide', 843, 'velo5.jpg', 'France', 'Paris', '51 Avenue de Gravelle, 75012 Paris', 75012, 21, 9, 6, '2021-03-12 21:39:24'),
(13, 'GQUEEN Lunettes de soleil à demi-cerclées demi-monture polarisées GQO6', 'LÉGÈRES, CONFORTABLES ET DURABLES ! Tandis que d’autres lunettes de soleil glissent, s’embuent ou se cassent facilement,verres polarisés TAC filtrent les lumières éblouissantes pour vous offrir une vision limpide.', '? LÉGÈRES, CONFORTABLES ET DURABLES ! Tandis que d’autres lunettes de soleil glissent, s’embuent ou se cassent facilement, les lunettes de soleil polarisées ZILLERATE ont une monture en TR90, un matériau en polycarbonate INCROYABLEMENT LÉGER, FLEXIBLE et RÉSISTANT AUX CHOCS. Les branches confortables épousent la forme de votre tête pour que vos lunettes ne tombent pas pendant l’exercice physique. Ces lunettes de soleil sont si confortables que vous oublierez presque que vous les portez !\r\n? PROTÈGENT VOS YEUX ! Nos verres polarisés TAC filtrent les lumières éblouissantes pour vous offrir une vision limpide. Ces verres sont également UV400 pour protéger vos yeux des rayons UVA et UVB ainsi que de la lumière bleue.\r\n? GRANDE POLYVALENCE ! Idéales pour TOUS les sports, TOUTES les activités d’extérieur, TOUTES les saisons et TOUTES les occasions. Parfaites aussi bien pour les hommes que pour les femmes et les adolescents.', 214, 'lunettes3.jpg', 'Allemagne', 'Bremen', 'Langenstraße 13, 28195 Bremen, Allemagne', 28195, 18, 14, 10, '2020-07-01 21:39:24'),
(14, 'Nike Zoomx Vaporfly Next%, Chaussure de Course Mixte', ' La mousse ZoomX et le matériau VaporWeave. Les designers Nike ont mis à jour l''ensemble du système Vaporfly dans les moindres détails. ', 'Nike ZoomX Vaporfly NEXT% est née pour battre chaque record. même les personnes personnelles. Grâce à l''association de nos deux technologies les plus innovantes. La mousse ZoomX et le matériau VaporWeave. Les designers Nike ont mis à jour l''ensemble du système Vaporfly dans les moindres détails. en donnant vie à nos chaussures de compétition les plus appréciées de toujours.', 243, 'chaussures3.jpg', 'Royaume-Uni', 'Birmingham ', 'Starley Way, Marston Green, Birmingham B37 7HB, Ro', 37743, 17, 12, 10, '2020-08-07 21:52:47');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(3) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `motscles` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `titre`, `motscles`) VALUES
(1, 'Emploi', 'Offres d''emploi'),
(2, 'Vehicule', 'Voitures, Motos, Bateaux, Vélos, Equipement'),
(3, 'Immobilier', 'Ventes, Locations, Colocations, Bureaux, Logements, '),
(4, 'Vacances', 'Campings, Hotels, Hôtes'),
(5, 'Multimedia', 'Jeux Vidéos, Informatique, Image, Son, Téléphone'),
(6, 'Loisirs', 'Films, Musique, Livres'),
(7, 'Materiel', 'Outillage, Fournitures de bureau, Matériel Agricole'),
(8, 'Services', 'Prestations de services, Evénements'),
(9, 'Maison', 'Ameublement, Electroménager, Bricolage, Jardinage'),
(10, 'Vetements', 'Jean, Chemise, Robe, Chaussure'),
(11, 'Autres', '');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
  `id_commentaire` int(3) NOT NULL,
  `membre_id` int(3) NOT NULL,
  `annonce_id` int(3) NOT NULL,
  `commentaire` text NOT NULL,
  `date_enregistrement` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `membre_id`, `annonce_id`, `commentaire`, `date_enregistrement`) VALUES
(5, 1, 1, 'parfait', '2021-02-25 13:49:12'),
(6, 5, 2, 'magnifique', '2021-03-03 20:38:16'),
(8, 3, 7, 'Whiskey de luxe, on pourrait même le mettre comme parfum', '2020-12-24 22:45:53'),
(9, 22, 8, 'Moto puissante, plus rapide que l''éclaire que la vitesse même. ', '2020-09-17 22:45:53'),
(10, 18, 9, 'Cheval tout neuf. Fort comme un jeune homme de 30 ans. 3 chevaux dans le moteur en plus il ne consomme pas grand chose.', '2020-04-17 22:48:01'),
(11, 17, 6, 'Casque défectueux. Arnaque, fuyez !', '2020-11-27 22:48:01'),
(12, 21, 3, 'Apparentement très bien situé. Quartier calme et très lumineux.', '2020-09-10 22:50:18'),
(13, 16, 4, 'Téléphone en bon état mais l''écran est rayé. ', '2021-03-07 22:51:45'),
(14, 3, 7, 'Quand on parle de whisky, il faut toujours se référer au prix. Car on ne peut pas juste dire que tel whisky est bon, la palette des pris étant proprement affolante. ', '2020-10-21 21:19:34'),
(15, 22, 6, 'Vu son prix, un casque d''entrée de gamme. Cependant c''est du Sony et ça se voit. Solide, très bonne finition, léger, pliable, doté d''un jack en coude très pratique et surtout confortable - on peut passer des heures sans l''enlever.et sans avoir ses oreilles écrasées douloureusement, contrairement à d''autres modèles "bon marché".', '2020-11-11 21:19:34'),
(16, 16, 4, 'Bonjour,\r\nnous avons commandé un Galaxy S9 reconditionné "état neuf".\r\nLe paquet est arrivé rapidement, le contenu, le S9 dans une petite boîte "Exagone Mobile" bien enveloppée, avec un cable USB C générique et des écouteurs standards. Tout bon.', '2020-11-04 21:22:55'),
(17, 19, 5, 'Eau de parfum qui sent très bon et qui dure toute la journée pour un très bon petit prix pas comme les eaux de toilette qui ne sentent que quelques minutes ne vous inquiétez pas en le commandant il s’en merveilleusement bon pour les hommes et dur toute la journée pour un excellent prix', '2021-03-03 21:22:55'),
(19, 3, 14, 'Der Schuh sieht super aus, aber leider ist Amazon nicht in der Lage ihn in der gewünschten Größe zu liefern. Ich gehe hier von einem Fehler im System aus.... sehr ärgerlich. Jetzt wird mir auch kein Austausch mehr angeboten.\r\nProdukt super, Service Amazon erstmalig unterirdisch.', '2021-03-21 21:59:01'),
(20, 22, 11, 'très déçu pour la durée de vie de ces piles ,je les utilisées avec un tensiomètre et leurs autonomie n''ont pas dépassée les deux jours au plus trois ( contre habituellement trois a quatre semaines )\r\nje ne referai plus l’expérience d''en recommander', '2001-03-10 21:59:01'),
(21, 19, 1, 'Bonjour à tous,\r\nJe suis un fervent utilisateur Apple depuis plusieurs année et je suis vraiment content de ce téléphone !\r\nIl est puissant, à un écran magnifique, un appareil photo / vidéo d''une qualité impressionnante et j''en passe.', '2003-03-30 22:04:20'),
(22, 4, 1, 'tres joli iphone', '2021-03-08 23:17:08');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE IF NOT EXISTS `membre` (
  `id_membre` int(3) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `mdp` varchar(60) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `civilite` enum('m','f') NOT NULL,
  `statut` int(1) NOT NULL,
  `date_enregistrement` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `pseudo`, `mdp`, `nom`, `prenom`, `telephone`, `email`, `civilite`, `statut`, `date_enregistrement`) VALUES
(1, 'marie92', '123456', 'Berger', 'Marie', '0659938383', 'manshassan9@gmail.com', 'f', 1, '2021-02-25 13:49:12'),
(2, 'alfred75015', '1234567', 'Dupont', 'Alfred', '0659938382', 'alfred@hotmail.fr', 'm', 1, '2021-02-25 13:49:12'),
(3, 'celine75013', '12345', 'Thoyer', 'Celine', '0658493827', 'celine@gmail.com', 'f', 1, '2021-02-25 14:59:43'),
(4, 'max', '$2y$10$8D.k4uG3OFrFdOI0mnv8/.fFi25pQHedenukzHmqx10vuGzmss7FS', 'thussaut', 'mathieu', '0659938384', 'fvds@example.com', 'm', 1, '2021-03-02 21:50:25'),
(5, 'hassan', '$2y$10$/YC2O2LcnOMDRJDqQqWJ.OOkBUMkcqzc4Fmgrhw6pc0kFxw7S47ES', 'MANSOUR', 'HASSAN', '0659938386', 'mans.hassan@hotmail.fr', 'm', 2, '2021-03-02 22:34:42'),
(16, 'mamass1', '123456', 'maya', 'lavie', '0123442343', 'mayalavie@glive.fr', 'f', 1, '2020-10-01 21:32:37'),
(17, 'TheRock', '1111', 'Dwayne', 'Johnson', '0321553563', 'd-johnson@rock.fr', 'm', 1, '2021-03-09 21:45:54'),
(18, 'Brad', '4321', 'William', 'Bradley', '087234725', 'bradpitt31@gmail.com', 'm', 1, '2020-12-15 21:46:00'),
(19, 'Mich', '3333', 'Michelle ', 'williams', '017327298', 'michwill@holly.fr', 'm', 1, '2021-03-04 11:37:03'),
(20, 'pierre', '1223', 'Pietro', 'Cardini', '092894728', 'pierrecardin20@france.fr', 'm', 1, '2021-03-04 11:33:42'),
(21, 'd-rose1', '1111', 'derrick', 'rose', '028973984', 'd-rose@bulls.us', 'm', 1, '2021-01-05 21:46:05'),
(22, 'LBJ23', '2323', 'Lebron', 'james', '027387382', 'lbj23@cavs.fr', 'm', 1, '2021-03-09 21:46:10');

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE IF NOT EXISTS `note` (
  `id_note` int(3) NOT NULL,
  `membre_id1` int(3) NOT NULL,
  `membre_id2` int(3) NOT NULL,
  `note` int(3) NOT NULL,
  `avis` text NOT NULL,
  `date_enregistrement` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `note`
--

INSERT INTO `note` (`id_note`, `membre_id1`, `membre_id2`, `note`, `avis`, `date_enregistrement`) VALUES
(2, 3, 2, 2, 'excellent', '2021-03-01 15:41:13'),
(3, 5, 3, 3, 'tres bien', '2021-02-25 13:49:12'),
(24, 22, 18, 2, 'Le mec est complètement chelou, il se prend pour brad pitt.\r\nIl vend des lunettes en tocs. FAITES ATTENTIONS !!!!', '2021-03-09 21:49:27'),
(25, 20, 17, 3, 'Les protéines sont efficaces. En 2 mois j''ai pris 15 kilos de muscle grâce à ce produit. Mais je commence à avoir des palpitations au cœur, est-ce normal ?', '2020-11-13 21:49:27'),
(26, 1, 20, 1, 'Parfum qui sont les chien mouillé. C''est ce qu''on appelle du Pierre Cardin ?\r\nJe demande un remboursement ou je dépose plainte pour intoxication nasal !', '2020-12-09 21:58:35'),
(27, 3, 21, 3, 'Vélo volé apparemment. Les flics m''ont chopé avec, en plus de confiscation, j''ai du payer une amende tellement salée que ça m''a donné envie de boire de l''eau.', '2021-03-01 22:04:39'),
(28, 21, 20, 3, 'Excellent ouvrage où l''on trouve toutes les bases et les secrets de réussite de plusieurs vendeurs d''élite.Je le recommande à toute personne souhaitant développer/perfectionner son talent commercial.', '2019-12-18 21:07:37'),
(29, 2, 4, 1, 'PERTINENT - DROIT AU BUT - EN LIEN DIRECT AVEC LA REALITE - Que du bonheur ce livre pour qui veut débuter ou se perfectionner. Après de nombreuses lectures de livres de vente je viens enfin de trouver celui qui fait LA synthèse.', '2019-05-17 21:07:37'),
(30, 19, 18, 2, 'Un excellent ouvrage, que je conseille à toutes les personnes désireuses de developper leurs ventes. Que ce soit au niveau professionnel ou personnel. Il est agrémenté d''exemples concrets qui ont fait leurs preuves. C''est selon moi "l''ouvrage de réference".', '2020-12-30 21:11:30'),
(31, 5, 3, 4, 'La pire expérience de tout ma vie, Fnac de Pontarlier à bannir clairement ! Un directeur irrespectueux au possible, une gestion chaotique du magasin et de ses pauvres employés, aucune considération.', '2020-01-23 21:12:15'),
(32, 22, 17, 4, 'Journee de travail differente beaucoup de procede a apprendre en fonction du departement ou voir du rayon permentant de decouvrir d''autre salarie du magasin et d''apprendre de chaque rayon et poste surtout en logistique ou tout le process est bien rodee', '2020-09-15 21:13:01'),
(33, 21, 19, 1, 'J''ai cherché les coordonnées du vendeur en utilisant recherche approfondie... J''ai eu le nom et prénom que javais déjà et la ville + num de tél. Jai cherché sur la ville ce nom la sur pagesblanches.fr: Pas d réponse. J''ai cherché a qui appartient le numero en utilisant un service de pagesjaunes.fr et on me dit:', '2021-03-02 21:13:40'),
(34, 1, 4, 4, 'J''ai cherché les coordonées du vendeur en utilisant recherche approfondie... J''ai eu le nom et prénom que javais déjà et la ville + num de tél. Jai cherché sur la ville ce nom la sur pagesblanches.fr: Pas d réponse. J''ai cherché a qui appartient le numero en utilisant un service de pagesjaunes.fr et on me dit:', '2021-03-17 21:16:00');

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `id_photo` int(3) NOT NULL,
  `photo1` varchar(255) NOT NULL,
  `photo2` varchar(255) NOT NULL,
  `photo3` varchar(255) NOT NULL,
  `photo4` varchar(255) NOT NULL,
  `photo5` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `photo`
--

INSERT INTO `photo` (`id_photo`, `photo1`, `photo2`, `photo3`, `photo4`, `photo5`) VALUES
(1, 'annonce1-2.jpg', 'annonce1-3.jpg', 'annonce1.jpg', 'annonce1.jpg', 'annonce1.jpg'),
(2, 'annonce2-2.jpg', 'annonce2-3.jpg', 'annonce2.jpg', 'annonce2.jpg', 'annonce2.jpg'),
(3, 'annonce3.jpg', 'annonce3.jpg', 'annonce3.jpg', 'annonce3.jpg', 'annonce3.jpg'),
(4, 'samsung.jpg', 'samsung.jpg', 'samsung.jpg', 'samsung.jpg', 'samsung.jpg'),
(5, 'Chat1.jpg', 'Chat2.jpg', 'Chat3.jpg', 'Chat4.jpg', 'Chat5.jpg'),
(6, 'moto1.jpg', 'moto2.jpg', 'moto3.jpg', 'moto4.jpg', 'moto5.jpg'),
(7, 'casque1.jpg', 'casque2.jpg', 'casque3.jpg', 'casque4.jpg', 'casque5.jpg'),
(8, 'parfum1.jpg', 'parfum2.jpg', 'parfum3.jpg', 'parfum4.jpg', 'parfum5.jpg'),
(9, 'velo1.jpg', 'velo2.jpg', 'velo3.jpg', 'velo4.jpg', 'velo5.jpg'),
(10, 'cheval1.jpg', 'cheval2.jpg', 'cheval3.jpg', 'cheval4.jpg', 'cheval5.jpg'),
(11, 'Whiskey1.jpg', 'Whiskey2.jpg', 'Whiskey3.jpg', 'Whiskey4.jpg', 'Whiskey5.jpg'),
(12, 'chaussures1.jpg', 'chaussures2.jpg', 'chaussures3.jpg', 'chaussures4.jpg', 'chaussures5.jpg'),
(13, 'bijoux1.jpg', 'bijoux2.jpg', 'bijoux3.jpg', 'bijoux4.jpg', 'bijoux5.jpg'),
(14, 'lunettes1.jpg', 'lunettes2.jpg', 'lunettes3.jpg', 'lunettes4.jpg', 'lunettes5.jpg'),
(15, 'pile1.jpg', 'pile2.jpg', 'pile3.jpg', 'pile4.jpg', 'pile5.jpg'),
(16, '20210308231019-883-20210218122359-bague11.jpg', '20210308231019-329-20210218122635-509bague12.jpg', '20210308231019-764-20210218132849-839-bague12.jpg', '20210308231019-630-20210218152839-744-bague33.png', '20210308231019-121-20210218160032-271-bague15.jpg'),
(17, '20210310155423-135-20210218122359-bague11.jpg', '20210310155423-434-20210218122635-509bague12.jpg', '20210310155423-589-20210218132849-839-bague12.jpg', '20210310155423-63-20210218152839-744-bague33.png', '20210310155423-732-20210218160032-271-bague15.jpg'),
(18, '20210311125020-440-20210218160434-720-bague10.jpg', '20210311125020-235-20210219085452-991-bague14.jpg', '20210311125020-774-20210219085502-176-bague33.png', '20210311125020-940-20210219085509-104-bague31.jpg', ''),
(19, '20210311151251-131-bague2.jpg', '20210311151251-956-bague5.jpg', '20210311151251-816-bague6.jpg', '20210311151251-954-bague9.jpg', '20210311151251-590-bague10.jpg'),
(20, '20210311151422-425-bague6.jpg', '20210311151422-282-bague9.jpg', '20210311151422-394-bague10.jpg', '20210311151422-30-bague13.jpg', '20210311151422-150-bague15.jpg'),
(21, '20210311151631-782-bague10.jpg', '20210311151631-775-bague13.jpg', '20210311151631-812-bague15.jpg', '', '');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id_annonce`),
  ADD KEY `membre_id` (`membre_id`),
  ADD KEY `photo_id` (`photo_id`),
  ADD KEY `categorie_id` (`categorie_id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `membre_id` (`membre_id`),
  ADD KEY `annonce_id` (`annonce_id`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id_membre`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id_note`),
  ADD KEY `membre_id1` (`membre_id1`),
  ADD KEY `membre_id2` (`membre_id2`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id_photo`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `id_annonce` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_commentaire` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `id_note` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `id_photo` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `annonce_ibfk_3` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id_categorie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `annonce_ibfk_1` FOREIGN KEY (`membre_id`) REFERENCES `membre` (`id_membre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `annonce_ibfk_2` FOREIGN KEY (`photo_id`) REFERENCES `photo` (`id_photo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`membre_id`) REFERENCES `membre` (`id_membre`),
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`annonce_id`) REFERENCES `annonce` (`id_annonce`);

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_ibfk_1` FOREIGN KEY (`membre_id1`) REFERENCES `membre` (`id_membre`),
  ADD CONSTRAINT `note_ibfk_2` FOREIGN KEY (`membre_id2`) REFERENCES `membre` (`id_membre`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
