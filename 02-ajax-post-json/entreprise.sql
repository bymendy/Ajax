CREATE DATABASE entreprise;

USE entreprise;

CREATE TABLE IF NOT EXISTS `employes` (
  `id_employes` int NOT NULL AUTO_INCREMENT,
  `prenom` varchar(20) DEFAULT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `sexe` enum('m','f') NOT NULL,
  `service` varchar(30) DEFAULT NULL,
  `date_embauche` date DEFAULT NULL,
  `salaire` float DEFAULT NULL,
  PRIMARY KEY (`id_employes`)
) ENGINE=InnoDB AUTO_INCREMENT=994 DEFAULT CHARSET=latin1;



INSERT INTO `employes` (`id_employes`, `prenom`, `nom`, `sexe`, `service`, `date_embauche`, `salaire`) VALUES
(350, 'Jean-pierre', 'Laborde', 'm', 'direction', '2010-12-09', 5100),
(388, 'Clement', 'Gallet', 'm', 'commercial', '2010-12-15', 2400),
(415, 'Thomas', 'Winter', 'm', 'commercial', '2011-05-03', 3650),
(417, 'Chloe', 'Dubar', 'f', 'production', '2011-09-05', 2000),
(491, 'Elodie', 'Fellier', 'f', 'secretariat', '2011-11-22', 1700),
(509, 'Fabrice', 'Grand', 'm', 'comptabilite', '2011-12-30', 3000),
(547, 'Melanie', 'Collier', 'f', 'commercial', '2012-01-08', 3200),
(592, 'Laura', 'Blanchet', 'f', 'direction', '2012-05-09', 4600),
(627, 'Guillaume', 'Miller', 'm', 'commercial', '2012-07-02', 2000),
(655, 'Celine', 'Perrin', 'f', 'commercial', '2012-09-10', 2800),
(699, 'Julien', 'Cottet', 'm', 'secretariat', '2013-01-05', 1490),
(701, 'Mathieu', 'Vignal', 'm', 'informatique', '2013-04-03', 2600),
(739, 'Thierry', 'Desprez', 'm', 'secretariat', '2013-07-17', 1600),
(780, 'Amandine', 'Thoyer', 'f', 'communication', '2014-01-23', 2200),
(802, 'Damien', 'Durand', 'm', 'informatique', '2014-07-05', 2350),
(854, 'Daniel', 'Chevel', 'm', 'informatique', '2015-09-28', 3200),
(876, 'Nathalie', 'Martin', 'f', 'juridique', '2016-01-12', 3650),
(900, 'Benoit', 'Lagarde', 'm', 'production', '2016-06-03', 2650),
(933, 'Emilie', 'Sennard', 'f', 'commercial', '2017-01-11', 1900),
(990, 'Stephanie', 'Lafaye', 'f', 'assistant', '2017-03-01', 1875);
