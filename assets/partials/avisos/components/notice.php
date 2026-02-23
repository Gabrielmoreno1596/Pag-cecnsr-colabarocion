<?php
if (!isset($notice) || !is_array($notice)) return;

function esc($s)
{
    return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8');
}

// =========================
// HERO (opcional)
// =========================
$hero = $notice['hero'] ?? [];
$heroBg = $hero['bg'] ?? asset('assets/partials/avisos/img/hero-libros.jpg');
$heroKicker = $hero['kicker'] ?? ($notice['badge'] ?? 'Aviso');
$heroTitle = $hero['title'] ?? ($notice['title'] ?? 'Aviso');
$heroSubtitle = $hero['subtitle'] ?? ($notice['subtitle'] ?? '');
$heroNote = $hero['note'] ?? ($notice['hours']['text'] ?? '');
?>

<section class="notice-hero" style="--notice-hero-image: url('<?= esc($heroBg) ?>');">
    <div class="notice-hero__inner">
        <div class="notice-hero__meta">
            <span class="notice-hero__badge"><?= esc($heroKicker) ?></span>
            <?php if (!empty($notice['updated_at'])): ?>
                <span class="notice-hero__updated">Actualizado: <?= esc($notice['updated_at']) ?></span>
            <?php endif; ?>
        </div>

        <h1 class="notice-hero__title"><?= esc($heroTitle) ?></h1>

        <?php if (!empty($heroSubtitle)): ?>
            <p class="notice-hero__subtitle"><?= esc($heroSubtitle) ?></p>
        <?php endif; ?>

        <div class="notice-hero__chips">
            <span class="notice-hero__chip">Busca por grado o materia</span>
            <?php if (!empty($heroNote)): ?>
                <span class="notice-hero__chip notice-hero__chip--muted"><?= esc($heroNote) ?></span>
            <?php endif; ?>
        </div>

        <div class="notice-hero__actions">
            <a class="btn btn--primary" href="#noticeContent" data-action="scroll">Ver detalle</a>

            <?php if (!empty($notice['cta']['secondary'])): ?>
                <a class="btn btn--ghost" href="<?= esc($notice['cta']['secondary']['href']) ?>">
                    <?= esc($notice['cta']['secondary']['label']) ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="notice">


    <div class="notice__tools">
        <div class="notice__search">
            <label class="notice__label" for="noticeSearch">Buscar por grado o materia</label>
            <input id="noticeSearch" class="notice__input" type="search" placeholder="Ej: 7°, Parvularia, Inglés..." />
        </div>


    </div>

    <div class="notice__content" id="noticeContent">
        <?php foreach (($notice['groups'] ?? []) as $gIndex => $group): ?>
            <section class="notice__group" data-group="<?= $gIndex ?>">
                <h2 class="notice__groupTitle"><?= esc($group['name'] ?? 'Grupo') ?></h2>

                <div class="notice__cards">
                    <?php foreach (($group['items'] ?? []) as $item): ?>
                        <article class="notice-card" data-search="<?= esc(($item['grade'] ?? '') . ' ' . implode(' ', $item['subjects'] ?? [])) ?>">
                            <div class="notice-card__top">
                                <h3 class="notice-card__grade"><?= esc($item['grade'] ?? '') ?></h3>
                                <span class="notice-card__date"><?= esc($item['dates'] ?? '') ?></span>
                            </div>

                            <?php if (!empty($item['subjects'])): ?>
                                <ul class="notice-card__list">
                                    <?php foreach ($item['subjects'] as $sub): ?>
                                        <li><?= esc($sub) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </article>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endforeach; ?>
    </div>
</section>