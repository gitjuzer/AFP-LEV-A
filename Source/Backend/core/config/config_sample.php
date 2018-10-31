<?php
/**
 * A config.php fájlt tartalmazza a .gitignore fájl, mivel ez minden környezetben eltérő lehet.
 * Hozd létre a fájlt, másold bele ennek a fájlnak a tartalmát, és módosítsd a beállításokat a lokális
 * környezetnek megfelelően!
 */
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        'db' => [
            'host' => 'localhost',
            'dbname' => 'jwt',
            'user' => 'root',
            'pass' => ''
        ],

        // jwt settings
        'jwt' => [
            'secret' => 'szupertitkoskulcsamitnemszabadpublikálniagithubonaprojektátadásakorkellbeállítani'
        ]
    ],
];
