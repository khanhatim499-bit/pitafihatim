-- =====================================================
-- Hatim Education Site
-- Database Version 1.0
-- =====================================================

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `if0_42367222_hatim_site`
DEFAULT CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE `if0_42367222_hatim_site`;
CREATE TABLE `users` (

    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,

    `full_name` VARCHAR(100) NOT NULL,

    `username` VARCHAR(50) NOT NULL UNIQUE,

    `email` VARCHAR(100) NOT NULL UNIQUE,

    `password` VARCHAR(255) NOT NULL,

    `role` ENUM('admin','editor')
    DEFAULT 'admin',

    `profile_image` VARCHAR(255) DEFAULT NULL,

    `status` TINYINT(1)
    DEFAULT 1,

    `created_at`
    TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);
CREATE TABLE `categories` (

    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,

    `name` VARCHAR(100) NOT NULL,

    `slug` VARCHAR(120) NOT NULL UNIQUE,

    `description` TEXT,

    `status` TINYINT(1)
    DEFAULT 1,

    `created_at`
    TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

CREATE TABLE `posts` (

    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,

    `category_id` INT UNSIGNED NOT NULL,

    `author_id` INT UNSIGNED NOT NULL,

    `title` VARCHAR(255) NOT NULL,

    `slug` VARCHAR(255) NOT NULL UNIQUE,

    `excerpt` TEXT,

    `content` LONGTEXT NOT NULL,

    `featured_image`
    VARCHAR(255),

    `post_type`
    ENUM(
        'blog',
        'tutorial',
        'note',
        'news'
    ) DEFAULT 'blog',

    `status`
    ENUM(
        'draft',
        'published'
    ) DEFAULT 'draft',

    `views`
    INT DEFAULT 0,

    `created_at`
    TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY(category_id)
    REFERENCES categories(id)
    ON DELETE CASCADE,

    FOREIGN KEY(author_id)
    REFERENCES users(id)
    ON DELETE CASCADE

);
CREATE TABLE `media` (

    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,

    `file_name` VARCHAR(255) NOT NULL,

    `file_path` VARCHAR(255) NOT NULL,

    `file_type` VARCHAR(100),

    `uploaded_by` INT UNSIGNED NOT NULL,

    `created_at`
    TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (uploaded_by)
    REFERENCES users(id)
    ON DELETE CASCADE

);

CREATE TABLE `downloads` (

    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,

    `title` VARCHAR(255) NOT NULL,

    `description` TEXT,

    `file_path` VARCHAR(255) NOT NULL,

    `category_id` INT UNSIGNED,

    `downloads` INT DEFAULT 0,

    `status`
    ENUM('published','draft')
    DEFAULT 'published',

    `created_at`
    TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (category_id)
    REFERENCES categories(id)
    ON DELETE SET NULL

);

CREATE TABLE `comments` (

    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,

    `post_id` INT UNSIGNED NOT NULL,

    `name` VARCHAR(100) NOT NULL,

    `email` VARCHAR(150),

    `comment` TEXT NOT NULL,

    `status`
    ENUM('pending','approved')
    DEFAULT 'pending',

    `created_at`
    TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (post_id)
    REFERENCES posts(id)
    ON DELETE CASCADE

);

CREATE TABLE `contact_messages` (

    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,

    `name` VARCHAR(100) NOT NULL,

    `email` VARCHAR(150) NOT NULL,

    `subject` VARCHAR(255) NOT NULL,

    `message` TEXT NOT NULL,

    `created_at`
    TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

CREATE TABLE `newsletter` (

    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,

    `email` VARCHAR(150) NOT NULL UNIQUE,

    `created_at`
    TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

CREATE TABLE `settings` (

    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,

    `site_name` VARCHAR(150) NOT NULL,

    `site_description` TEXT,

    `site_email` VARCHAR(150),

    `logo` VARCHAR(255),

    `favicon` VARCHAR(255),

    `created_at`
    TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

COMMIT;y

