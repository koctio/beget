<?php

return [
    'adminEmail' => 'admin@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
    'acl_list' => array(
        'guest' => array(
            'site' => array('index', 'fault', 'login', 'verification'),
            'reg' => array('index'),
            'admin' => array( 'index'),
            'tournaments' => array('marathon', 'get-tournament', 'get-start-tournament', 'open'),
            'download' => array( 'index' ),
            'about-us' => array( 'index' ),
            'contact' => array( 'index' ),
            // 'live-translation' => array( 'index' ),
            'match' => array( 'index' ),
            'sit-and-go' => array( 'index', 'ring-list'),
            'new' => array( 'index' ),
            'news' => array( 'index' ),
            'articles' => array( 'index' ),
            'article' => array( 'index' ),
            'rating' => array( 'index' ),
            'match-sit-and-go' => array('index'),
            'user-info' => array( 'index' ),
            'partnership' => array( 'index' ),
            'own-raiting' => array('index'),
            'documents' => array('index'),
            'registration-qualifying-competition' => array('index'),
            'country-list' => array('index')
        ),
        'user' => array(
            'site' => array('index', 'fault', 'logout', 'verification'),
            'admin' => array( 'index'),
            'operation' => array('index', 'get-tournaments', 'reg-tournament', 'unreg-tournament', 'sit-and-go-reg', 'my-rate'),
            'tournaments' => array('marathon', 'get-tournament', 'get-start-tournament', 'open'),
            'download' => array( 'index' ),
            'about-us' => array( 'index' ),
            'contact' => array( 'index' ),
            'my-account' => array( 'index' ),
            // 'live-translation' => array( 'index' ),
            'match' => array( 'index' ),
            'sit-and-go' => array( 'index', 'ring-list'),
            'new' => array( 'index' ),
            'news' => array( 'index' ),
            'articles' => array( 'index' ),
            'article' => array( 'index' ),
            'rating' => array( 'index' ),
            'match-sit-and-go' => array('index'),
            'user-info' => array( 'index' ),
            'partnership' => array( 'index' ),
            'own-raiting' => array('index'),
            'documents' => array('index'),
            'registration-qualifying-competition' => array('index'),
            'country-list' => array('index')
        )
    )
];
