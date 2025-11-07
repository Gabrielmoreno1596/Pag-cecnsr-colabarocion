<?php
// assets/partials/convenios/proyecto-dual/main.php

// Carga config.php solo si aún no está cargado (cuando se incluye directo).
if (!defined('PROJECT_PATH')) {
    require_once dirname(__DIR__, 4) . '/config.php';
}

// DATA
$dHero  = require __DIR__ . '/data/hero-data.php';
$dQueEs = require __DIR__ . '/data/que-es-data.php';
$dRuta  = require __DIR__ . '/data/ruta-data.php';
$dReq   = require __DIR__ . '/data/requisitos-data.php';
$dPrep  = require __DIR__ . '/data/preparacion-data.php';
$dGal   = require __DIR__ . '/data/galeria-data.php';
$dCoor  = require __DIR__ . '/data/coor-data.php';

// COMPONENTES
include __DIR__ . '/components/hero.php';
?>

<section class="main-content">
    <?php include __DIR__ . '/components/que-es-proyecto-dual.php'; ?>
    <?php include __DIR__ . '/components/ruta-estudiante.php'; ?>
    <?php include __DIR__ . '/components/requisitos.php'; ?>
    <?php include __DIR__ . '/components/preparacion-viaje.php'; ?>
    <?php include __DIR__ . '/components/galeria.php'; ?>
    <?php include __DIR__ . '/components/coor-p-dual.php'; ?>
</section>