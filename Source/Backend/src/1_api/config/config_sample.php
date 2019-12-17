<?php
/**
 * A config.php fájlt tartalmazza a .gitignore fájl, mivel ez minden környezetben eltérő lehet.
 * Hozd létre a fájlt, másold bele ennek a fájlnak a tartalmát, és módosítsd a beállításokat a lokális
 * környezetnek megfelelően!
 */
return [
    'settings' => [
        'displayErrorDetails' => true,
        'addContentLengthHeader' => false,
        'DaoFactory' => 'MySqlFactory', //MySqlFactory, FakerFactory


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
