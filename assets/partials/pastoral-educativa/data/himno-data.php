<?php

/**
 * Datos de la sección Himno (video + letra)
 */
return [
    'title' => 'Himno de la Pastoral Educativa',
    'video' => [
        'src'   => 'https://www.youtube.com/embed/VPTBebPfrsw?rel=0',
        'title' => 'HFIC - Himno de la Pastoral Educativa',
        'caption' => 'Himno oficial — HFIC / Pastoral Educativa',
    ],
    'lyrics' => [
        ['type' => 'chorus', 'title' => 'CORO', 'lines' => [
            'Educación para crecer,',
            'Valores que desarrollar,',
            'Francisco inspirar con su Paz y Bien,',
            'La forma alegre de estudiar.',
            '',
            'Colegios en fraternidad,',
            'pioneros de un mundo mejor,',
            'la santidad será nuestro ideal,',
            'forjamos el reino de amor.',
        ]],
        ['type' => 'verse', 'title' => 'Estrofa I', 'lines' => [
            'Ir reparando sin cesar,',
            'la viña del Señor,',
            'el amor nos moverá,',
            'en nuestra gran misión.',
        ]],
        ['type' => 'chorus', 'title' => 'CORO', 'repeat' => true],
        ['type' => 'verse', 'title' => 'Estrofa II', 'lines' => [
            'Un mundo entero que cuidar,',
            'en armonía interior,',
            'todos en fraternidad,',
            'un solo corazón.',
        ]],
        ['type' => 'chorus', 'title' => 'CORO', 'repeat' => true],
        ['type' => 'verse', 'title' => 'Estrofa III', 'lines' => [
            'Que todo hombre busque el bien,',
            'con plena libertad,',
            'el compromiso es formar,',
            'la nueva humanidad.',
        ]],
    ],
    'credits' => 'Autor letra y música: César Miranda Barragán — Pastoral Educativa HFIC',
];
