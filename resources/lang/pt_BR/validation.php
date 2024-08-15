<?php
    return [
        'attributes' => [
            'nome' => 'Nome',
            'email' => 'Email',
            'telefone' => 'Telefone',
            'experiencias' => 'Experiência',
            'habilidades' => 'Habilidade',
            'formacoes' => 'Formação',
            'idiomas' => 'Idiomas',
        ],
        'custom' => [
            'email' => [
                'unique' => 'Este e-mail já está cadastrado.',
            ],
        ],
        'messages' => [
            'required' => 'O campo :attribute é obrigatório.',
            'min' => 'O campo deve conter pelo menos :min caracteres.',
            'max' => 'O campo deve conter menos de :max caracteres.',
        ],
    ];
?>