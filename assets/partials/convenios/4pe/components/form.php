<?php
$f = $formData;
?>

<section class="section" id="<?= $f['id'] ?>">
  <div class="container">
    <h2 class="section-title"><?= $f['title'] ?></h2>
    <div class="title-divider" aria-hidden="true"></div>

    <form id="form-psicologia" class="contact-form" action="<?= $f['action'] ?>" method="<?= $f['method'] ?>" novalidate>
      <!-- Canal para ruteo -->
      <input type="hidden" name="canal" value="<?= htmlspecialchars($f['canal']) ?>">
      <!-- Honeypot -->
      <input type="text" name="website" tabindex="-1" autocomplete="off" style="display:none">

      <div class="form-grid">
        <?php foreach ($f['fields'] as $field): ?>
          <?php if ($field['type'] === 'select'): ?>
            <label<?= !empty($field['full']) ? ' class="full"' : '' ?>>
              <?= $field['label'] ?>
              <select name="<?= $field['name'] ?>" <?= !empty($field['required']) ? 'required' : '' ?>>
                <?php foreach ($field['options'] as $op): ?>
                  <option value="<?= htmlspecialchars($op['value']) ?>"><?= $op['label'] ?></option>
                <?php endforeach; ?>
              </select>
            </label>

          <?php elseif ($field['type'] === 'textarea'): ?>
            <label<?= !empty($field['full']) ? ' class="full"' : '' ?>>
              <?= $field['label'] ?>
              <textarea
                name="<?= $field['name'] ?>"
                rows="<?= (int)($field['rows'] ?? 4) ?>"
                placeholder="<?= htmlspecialchars($field['placeholder'] ?? '') ?>"></textarea>
            </label>

          <?php else: ?>
            <label<?= !empty($field['full']) ? ' class="full"' : '' ?>>
              <?= $field['label'] ?>
              <input
                type="<?= $field['type'] ?>"
                name="<?= $field['name'] ?>"
                <?= !empty($field['required']) ? 'required' : '' ?>
                <?= !empty($field['autocomplete']) ? 'autocomplete="' . htmlspecialchars($field['autocomplete']) . '"' : '' ?> />
            </label>
          <?php endif; ?>
        <?php endforeach; ?>

        <!-- reCAPTCHA (si esta página es .php y tienes RECAPTCHA_ENABLED=true) -->
        <?php if (defined('RECAPTCHA_ENABLED') && RECAPTCHA_ENABLED): ?>
          <div class="full">
            <div class="g-recaptcha" data-sitekey="<?= htmlspecialchars(RECAPTCHA_SITE_KEY) ?>"></div>
          </div>
        <?php endif; ?>
      </div>

      <button class="btn-solid" type="submit"><?= $f['submit'] ?></button>
      <p id="msg-psicologia" style="margin-top:10px"></p>
    </form>
  </div>
</section>
