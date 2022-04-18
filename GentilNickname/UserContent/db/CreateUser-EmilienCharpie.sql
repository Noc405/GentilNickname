--
-- Création de l'utilisateur
--
CREATE USER 'dbUser_EmilienCharpie'@'localhost' IDENTIFIED BY '.Etml-';
GRANT SELECT, INSERT, UPDATE, DELETE ON `db_nickname_emilien`.* TO 'dbUser_EmilienCharpie'@'localhost';