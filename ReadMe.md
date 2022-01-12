# Bienvenue sur le projet Learnenglish

## Type de projet Web et prérequis :
- Projet codé en PHP,JS et SQL.
- Il est requis : un serveur Web et un serveur BDD pour l'installer.

## Sujet du projet :

#### **Projet LearnEnglish**

LearnEnglish est une application qui permet de réviser l'anglais pour les enfants
Développer une application simple et intuitive afin de permettre à des enfants de réviser l'anglais.

Les enfants ont accès à des leçons de vocabulaire par thème : Halloween, Noël
Une leçon propose plusieurs types d'exercices.

- Les glisser deposer : on voit un ensemble d'images (max 4) et un ensemble de mots dans le désordre. L'enfant doit déplacer les mots vers les images correspondantes.
- Les Ecoute et choisiImage : on voit un ensemble d'images (max 4) et 4 sons, l'enfant doit choisir quel son va avec quelle image
- Les Ecoute et choisiTexte : on voit un ensemble de textes (max 4) et 4 sons, l'enfant doit choisir quel son va avec quelle image

**BackEnd :**

Un enseignant peut créer des leçons, modifier, supprimer des leçons avec les exercices correspondants.
Les leçons peuvent être importées ou exportées en format zip.

Un enseignant a la possibilité de publier ses leçons sur internet directement sur le site de l’école en indiquant un lien de type : learnenglish.nomecole.fr/lecon.php?id=123 , cela permet aux élèves d’accéder au leçon via un lien hypertexte pour le faire de chez eux en ligne.

Un admin doit pouvoir créer et gérer les comptes des enseignants. (*)

**FrontEnd :**

Les élèves peuvent s’entrainer chez eux en cliquant sur le lien.
Ce projet nécessite une interaction avec du JS (coté ludique) donc un graphisme attrayant. Le reste sera fait en PHP avec ou sans BDD MySQL.

(*) Cas des trinômes : les comptes enseignants seront récupérés depuis une plateforme Moodle en tapant directement dans la BDD. On doit pouvoir recuperer une leçon via une API REST

## Présentation vidéo du projet

- [Au formation mp4](http://uploads.ldumay.fr/esiee-it/LearnEnglish/Demo_video.mp4)

## BDD de démo dans le dossier [" Save BDD"](https://github.com/ldumay/LearnEnglish/blob/main/_Save_BDD/)

![img_bdd](https://github.com/ldumay/LearnEnglish/blob/main/_Save_BDD/save_9_2021_05_03_3.png)

## Le Tree du projet :
```
.
├── Duo\ -\ Projet\ Web.pdf
├── ReadMe.md
├── _Save_BDD
│   ├── save_1_2021_03_30.sql
│   ├── save_2_2021_04_02.sql
│   ├── save_3_2021_04_05.sql
│   ├── save_4_2021_04_05.sql
│   ├── save_5_2021_04_06.sql
│   ├── save_6_2021_04_07.sql
│   ├── save_7_2021_04_07.sql
│   ├── save_8_2021_05_01_01_table.sql
│   ├── save_8_2021_05_01_02_datas.sql
│   ├── save_9_2021_05_03_1.sql
│   ├── save_9_2021_05_03_2.mwb
│   ├── save_9_2021_05_03_3.png
│   └── save_9_2021_05_03_4.png
├── auth.php
├── config
│   ├── config_bdd.php
│   └── config_project.php
├── css
│   ├── lecons.css
│   └── style.css
├── drag-n-drop.js
├── home.php
├── images
│   ├── ane.jpg
│   ├── bateau.jpg
│   ├── chat.jpg
│   ├── chien.jpg
│   ├── moto.jpg
│   ├── souris.jpg
│   ├── velo.jpg
│   └── voiture.jpg
├── include
│   ├── Extractor.class.php
│   ├── Extractor.php
│   ├── File.php
│   ├── FileCSV.php
│   ├── OnZip.php
│   ├── Zip.php
│   ├── add_lecon.php
│   ├── add_theme.php
│   ├── add_user.php
│   ├── alertes.php
│   ├── bdd.php
│   ├── footer.php
│   ├── head.php
│   ├── header.php
│   ├── import_lecon.php
│   ├── javascript.php
│   ├── ldumay_package_functions.php
│   ├── modules.php
│   ├── php_end.php
│   ├── php_start.php
│   ├── update_account.php
│   ├── update_lecon.php
│   ├── update_theme.php
│   └── update_user.php
├── index.php
├── init.php
├── lecon.php
├── liste-lecons.php
├── liste-themes.php
├── liste-users.php
├── post.php
├── shares_unzip
│   ├── Noel_1
│   │   ├── Christmas_Ball.jpg
│   │   ├── Christmas_Tree.jpg
│   │   ├── Christmas_Wreath.jpg
│   │   ├── Santa_Claus.jpg
│   │   └── _elementsList.csv
│   └── __MACOSX
│       └── Noel_1
├── shares_zip
│   └── Noel_1.zip
├── sons
│   ├── ane.mp3
│   ├── chat.mp3
│   ├── chien.mp3
│   └── souris.mp3
├── uploads
└── zip_demos
    ├── Demo_1
    │   ├── Bike.jpg
    │   ├── Boat.jpg
    │   ├── Car.jpg
    │   ├── Motorcycle.jpg
    │   └── _elementsList.csv
    ├── Demo_1.zip
    ├── Halloween_1
    │   ├── Pumpkin.jpg
    │   ├── Skeleton.jpg
    │   ├── Vampire.jpg
    │   ├── Witch.jpg
    │   └── _elementsList.csv
    ├── Halloween_1.zip
    ├── Noel_1
    │   ├── Christmas_Ball.jpg
    │   ├── Christmas_Tree.jpg
    │   ├── Christmas_Wreath.jpg
    │   ├── Santa_Claus.jpg
    │   └── _elementsList.csv
    └── Noel_1.zip

16 directories, 89 files
```
