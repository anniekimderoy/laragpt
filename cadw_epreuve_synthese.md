# ![Logo de Laravel](https://upload.wikimedia.org/wikipedia/commons/9/9a/Laravel.svg)Cadriciel Web 

# Épreuve-synthèse pratique (30%)

L’objectif de ce travail est de créer un site web qui prend la forme d’un « chatbot » nommé LaraGPT: on peut poser différentes questions à l’aide d’un champ de texte et le site web nous répond de façon personnalisée selon certains critères expliqués plus bas.

- Le site doit fournir un formulaire d’enregistrement pour la création d'un compte et un formulaire de connexion qui permet d’accéder à la page des messages : si l’utilisateur n’est pas connecté et qu’il essaie d'accéder à la page des messages, il sera automatiquement redirigé vers le formulaire de connexion.  
    - La page des messages (une conversation avec LaraGPT) doit être **protégée** et accessible par authentification.  
    - Il n'est pas recommandé d'utiliser Laravel Breeze, mais ce n'est pas interdit. 

- La liste des réponses possibles de LaraGPT vous est fournie dans le fichier `phrases.json`.  
    - LaraGPT choisit sa réponse en fonction d'un mot-clé qu’elle recherche dans la question de l’utilisateur: la réponse correspondra au premier mot-clé trouvé dans la question (s'il y en a plusieurs, seulement le premier mot-clé sera utilisé, pour éviter trop de complexité)
    - Si elle ne trouve aucun mot-clé, elle retournera une réponse par défaut.  
    - Vous ne pouvez pas modifier le fichier `phrases.json`, sauf pour ajouter votre propre mot-clé/réponse (votre fichier fera partie du projet et de la remise)
    - Certaines réponses de LaraGPT contiennent des informations qui doivent être dynamisées. Ces informations sont entre `[crochets]` dans le fichier `json`.  
        - `[nom]` doit être dynamisé avec le nom de l'utilisateur connecté.
        - `[heure]` doit être dynamisé avec l'heure du moment où la question a été posée.

- L’ensemble de votre site doit présenter un visuel constant et agréable entre les pages : l’utilisation d’un framework CSS est permis et recommandé. 

---

> Deux schémas du fonctionnement de LaraGPT et un fichier de code troué sont fournis pour vous aider :  
le code contenu dans le fichier doit être complété et intégré adéquatement à votre projet.  
Vous n’êtes pas obligés d’utiliser ce code.

---

## Exigences

1. Page d'accueil
    - Présentation du site
    - Liens vers l'enregistrement et la connexion

1. Page de connexion
    - Si l'utilisateur est déjà connecté, il est automatiquement redirigé à la page des messages
    - Formulaire de connexion avec un courriel et un mot de passe
    - Les messages d'erreur sont personnalisés et affichez adéquatement (visible et compréhensible) dans le formulaire
    - Lien vers la page d'enregistrement
    - Une fois connecté, redirection vers la page des messages avec message de confirmation

2. Page d'enregistrement
    - Formulaire d'enregistrement
    - Lors de l'enregistrement, l'utilisateur fournit son prénom, nom, courriel, mot de passe, confirmation du mot de passe et une image facultative
    - Les messages d'erreur sont personnalisés et affichez adéquatement dans le formulaire
    - Redirection vers la page des messages suit à la création du compte (et connexion automatique) avec message de confirmation

3. Page des messages (conversation)
    - Champ de texte pour soumettre une question à LaraGPT
    - Liste des messages précédents, avec les plus récents en haut de la conversation
    - La dernière question posée, et la réponse, sont mis en évidence visuellement
    - Lien de déconnexion
    - Lors de la soumission d'une question, l'utilisateur est redirigé à la même page, où il pourra voir la réponse au début de la conversation.

4. Autres exigences
    - La ou les tables doivent être créées à l'aide de migrations
        - Un _seeder_ doit aussi être implémenté pour créer quelques utilisateurs fictifs à l'aide d'une _factory_. Toutes les informations nécessaires sur l'utilisateur doivent être générées (incluant l'image de profil: Pravatar?)
    - Le contenu du fichier des réponses est traité par le code (pas de tables dans la BDD pour ces réponses)
    - Vous devez utiliser un _layout_ et des _components_ cohérentes et appropriées
    - Les messages doivent affichés de qui ils proviennent et l'heure d'envoi; une image de profil doit être affichée pour l'utilisateur ainsi que LaraGPT
    - Visuel cohérent dans le projet

---

## Contraintes de production et remise
- Vous devez remettre l'ensemble de votre projet (INCLUANT les dossiers `/vendor` et /node_modules si présent) dans une archive .zip nommé **cadw_esp_NOM_prenom.zip**.
- Vous N'AVEZ PAS à déployer votre projet sur le serveur du Cégep.
- Vous devez être présent en classe tant que le projet n'est pas remis (-10% par absence ou retard majeur)
- La remise sur Teams est **finale**

---

## Bonus
- Bonus #1 (0.5): Vous devez implémenter la fonctionnalité qui fait qu'un utilisateur ne voit que ses propres messages et réponses de LaraGPT lorsqu'ils se connectent. Les autres utilisateurs ne verront aussi que leurs propres messages.
- Bonus #2 (0.5); Lorsque LaraGPT retourne la réponse par défaut (ex., "Je ne sais pas quoi répondre"), transformez-la en lien HTML qui redirige vers Google avec la question de l'utilisateur en paramètre de recherche (le lien mènera directement aux résultats Google de cette question)

---

## Critères d'évaluations
| Critère | Points |
| --- | :---: |
| **Base de données** |  |
| BDD, migrations et seeding | 2 |
| **Affichage, style et organisation** |  |
| Page d'accueil | 1 |
| Connexion et enregistrement | 2 |
| Messages | 3 |
| **Logique et authentification** |  | 
| Traitement de la connexion, déconnexion et enregistrement avec rétroaction à l'utilisateur | 5 |
| Traitement de la question et de la réponse trouvée | 4 | 
| Protection adéquate des routes | 1 |
| Personnalisation des réponses | 2 |
| **Routes et Contrôleurs** |  |
| Utilisation adéquate de controllers, conventions | 1 |
| **Modèles** |  |
| Utilisation adéquate des modèles et des relations, requêtes efficaces, conventions | 3 |
| **Qualité et consignes** |  |
| Remise adéquate | 1 |
| Indentation, nomenclature, lisibilité | 3 |
| Documentation complète et adéquate | 2 |
| **BONUS** | 1 |
| **Total** | 30 pts (+1)

