envoyer_code.php

* Contient des données sensibles:
  - Le virer de github
  - Le mettre dans .gitIgnore
  - Le sauvegarder dans yahoo mail

----------------------------------------------

 Comment le virer de github ?

Git ignore seulement les nouveaux fichiers.
Si ton fichier est déjà dans l’historique(suivi par github), Git va continuer à le suivre même s’il est dans .gitignore.

➡️ Donc tu dois le retirer du suivi sans le supprimer du disque :

git rm --cached envoyer_code.php



