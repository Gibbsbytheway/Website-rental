# Asteria Pulsar — site de réservation directe

Thème WordPress sur mesure pour la présentation et la réservation directe des deux locations courte durée :

- **QuietStay 20' PARIS** — Massy
- **La Villa Fleury des Horizons** — Thouars

Le code de ce dépôt correspond directement au thème WordPress (à la racine), déployé automatiquement par Hostinger dans `wp-content/themes/asteria-pulsar` sur une instance WordPress standard. WordPress core, la base de données et les médias uploadés ne sont volontairement pas versionnés ici (voir `.gitignore`) : seul le code du thème l'est.

## Fonctionnalités

- Page d'accueil listant les logements disponibles (type de contenu personnalisé `logement`)
- Fiche détaillée par logement : galerie, description, équipements, horaires, widget de réservation Superhôte intégré (iframe)
- Page de contact avec formulaire natif (sans plugin, envoi par `wp_mail`)
- Réglages éditables dans **Apparence > Personnaliser > Réglages du site** : téléphone, email, horaires, ID et label de conversion Google Ads
- Deux logements et les pages À propos / Contact sont pré-remplis automatiquement à l'activation du thème (`inc/theme-activation.php`), à partir du contenu déjà présent sur le site Superhôte existant

## Déploiement sur Hostinger

1. **WordPress** : installer WordPress sur `asteria-pulsar.fr` depuis hPanel (Sites web > Auto Installer > WordPress).
2. **Thème** : déploiement Git automatique Hostinger (hPanel > Site web > Avancé > Git) pointé sur ce dépôt/branche, avec le répertoire de déploiement réglé sur `wp-content/themes/asteria-pulsar`. Chaque push sur la branche redéploie automatiquement. Puis activer le thème dans **Apparence > Thèmes**.
3. **Menus** : créer les menus **Menu principal** et **Menu pied de page** dans **Apparence > Menus** (Nos logements, À propos, Contact).
4. **Logo** : ajouter le logo réel dans **Apparence > Personnaliser > Identité du site**.
5. **Google Ads** : renseigner l'ID `AW-XXXXXXXXX` dans **Apparence > Personnaliser > Réglages du site** dès qu'il est disponible.
6. **DNS** : le domaine `asteria-pulsar.fr` est enregistré chez OVH avec les DNS gérés par Cloudflare — pointer un enregistrement A vers l'IP du serveur Hostinger (visible dans hPanel > Domaines > asteria-pulsar.fr > Configurer le DNS).
