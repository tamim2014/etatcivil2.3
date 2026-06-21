--
-- user_id → lien vers l’officier
-- code → le code envoyé par mail
-- expiration → durée de validité
-- used → empêche la réutilisation
-- created_at → pour nettoyer les vieux codes
--
--
-- Réinitialisation des mot de passe
-- 
-- Généré le :  Vendredi 12 Juin 2026
-- La renommer en reinit_codes (plus parlant)

CREATE TABLE reset_codes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    code VARCHAR(10) NOT NULL,
    expiration DATETIME NOT NULL,
    used TINYINT(1) DEFAULT 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);



