# MyGES Refonte

Explication de chaque librairie (tous hebergées en local):

* Bootstrap, framework, nous utilisons la version minifiés
* AOS (Animate On Scroll), simplement pour avoir les animations des élements qui apparaissent à chaque scroll
* Swiper, pour les sliders dans la catégorie "partenaires" de la home page.
* PureCounter, pour les nombres qui défilent dans la catégorie "Nos valeurs" de la home page.

Besoin d'installer composer et la lib php-mailer pour utiliser le form.

## Email

Le form de contact envoie un e-mail à vous même contenant toutes les informations de l'utilisateur qui vient d'utiliser le formulaire.

Vous pouvez changer le serveur SMTP dans le fichier forms/contact.php, mais par défaut il utilise le serveur SMTP de SendGrid.
## Discord

Le form de contact envoie également un message en DM sur Discord, il faut d'abord:

* Inviter le bot Discord dans un serveur, pour qu'il puisse vous DM
* Changer le recipient_dm dans le forms/contact.php
* Envoyer un message au bot pour qu'il puisse vous avoir dans sa liste de DM