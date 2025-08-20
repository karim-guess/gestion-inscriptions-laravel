<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Psycho Praticien - Gestion des Inscriptions

## Description
Application Laravel pour gérer les inscriptions à la formation "Psycho Praticien".  
Permet d’ajouter, modifier, supprimer et filtrer les participants.

## Installation

1. Cloner le dépôt :
```bash
git clone <repo_url>
cd nom_du_projet
Installer les dépendances PHP :

bash
Copier
Modifier
composer install
Configurer le fichier .env :

bash
Copier
Modifier
cp .env.example .env
php artisan key:generate
Puis configure ta base de données dans .env.

Migrer la base de données :

bash
Copier
Modifier
php artisan migrate
Lancer le serveur local :

bash
Copier
Modifier
php artisan serve
L’application sera accessible sur http://127.0.0.1:8000.

CSS
Le CSS est directement placé dans le dossier public/css.
Assurez-vous que vos vues utilisent <link rel="stylesheet" href="{{ asset('css/style.css') }}">.

Fonctionnalités
Ajout, modification et suppression d’inscriptions

Filtrage par statut et recherche par nom/email

Pagination (10 inscriptions par page)

Pagination centrée et agrandie pour meilleure UX

Boutons "Suivant" et "Retour" simples et clairs

Gestion de la priorité des participants

Routes principales
Route	Méthode	Description
/inscriptions	GET	Liste des inscriptions
/inscriptions/create	GET	Formulaire de création
/inscriptions	POST	Enregistrement d’une nouvelle inscription
/inscriptions/{id}/edit	GET	Formulaire de modification
/inscriptions/{id}	PUT/PATCH	Mise à jour d’une inscription
/inscriptions/{id}	DELETE	Suppression d’une inscription
/inscriptions/{id}/togglePriorite	POST	Activer/Désactiver la priorité
