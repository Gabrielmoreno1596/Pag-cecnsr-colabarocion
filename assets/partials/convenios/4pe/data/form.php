<?php
return [
  'id' => 'form-contacto',
  'title' => '¿Tienes dudas o quieres inscribirte?',
  'action' => 'enviar.php',
  'method' => 'POST',
  'canal' => 'psicologia',
  'fields' => [
    ['type' => 'text', 'name' => 'nombre_encargado', 'label' => 'Nombre completo', 'required' => true, 'autocomplete' => 'name'],
    ['type' => 'email', 'name' => 'correo', 'label' => 'Correo electrónico', 'required' => true, 'autocomplete' => 'email'],
    ['type' => 'tel', 'name' => 'telefono', 'label' => 'Teléfono', 'required' => true, 'autocomplete' => 'tel'],
    [
      'type' => 'select',
      'name' => 'interes',
      'label' => 'Interés',
      'required' => true,
      'options' => [
        ['value' => 'Seminario', 'label' => 'Seminario'],
        ['value' => 'Otro', 'label' => 'Otro'],
      ],
    ],
    [
      'type' => 'textarea',
      'name' => 'consulta',
      'label' => 'Mensaje',
      'required' => false,
      'rows' => 4,
      'placeholder' => 'Cuéntanos un poco tu necesidad…',
      'full' => true,
    ],
  ],
  'submit' => 'Enviar consulta',
  'success_color' => 'green',
  'error_color' => 'crimson',
];
