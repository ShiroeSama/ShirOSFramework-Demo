<!DOCTYPE html>
<html lang="fr">

<!-- Debut En-tête -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <?php if (!empty($MetaDataModule->getTitle())): ?>
            <meta name="title" content="<?= $MetaDataModule->getTitle(); ?>">
        <?php endif ?>
        
        <?php if (!empty($MetaDataModule->getDescription())): ?>
            <meta name="description" content="<?= $MetaDataModule->getDescription(); ?>">
        <?php endif ?>
        
        <?php if (!empty($MetaDataModule->getKeywords())): ?>
            <meta name="keywords" content="<?= $MetaDataModule->getKeywords(); ?>">
        <?php endif ?>
    
        <meta name="author" content="<?= $ConfigModule->get("Server.Author"); ?>">
        <meta name="generator" content="<?= $ConfigModule->get("Server.Author"); ?>">
        
        <?php if (empty($MetaDataModule->getTitle())): ?>
            <title><?= $ConfigModule->get("Server.Name"); ?></title>
        <?php else: ?>
            <title><?= $MetaDataModule->getTitle() . ' - ' . $ConfigModule->get("Server.Name"); ?></title>
        <?php endif ?>
    
        <!-- Css -->
            <?= App::getInstance()->getCss("public/Css/"); ?>
    </head>
<!-- END En-tête -->
    
    <body>
        <header id="Header">
            <div id="Menu">
                <nav>
                    <a href="<?= $UrlModule->getUrl() ?>">ShirOS Back Office</a>
                </nav>
            </div>
        </header>
        
        <!-- Corps de Site -->
        <div id="Page" class="noPadding">