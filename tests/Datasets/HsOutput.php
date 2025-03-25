<?php

dataset('hs output', [
    ["[
   {
      comment:'comment1',
      homedir:'/some/path',
      id:'104145',
      locked:false,
      name:'user-name',
      pac:'xyz00',
      quota_hardlimit:0,
      quota_softlimit:0,
      shell:'/bin/bash',
      storage_hardlimit:0,
      storage_softlimit:0,
      userid:'6'
   },
   {
      comment:'comment2',
      homedir:'/some/path',
      id:'104146',
      locked:false,
      name:'user-name',
      pac:'xyz00',
      quota_hardlimit:0,
      quota_softlimit:0,
      shell:'/bin/bash',
      storage_hardlimit:0,
      storage_softlimit:0,
      userid:'5'
   }
]", [
        [
            'comment' => 'comment1',
            'homedir' => '/some/path',
            'id' => 104145,
            'locked' => false,
            'name' => 'user-name',
            'pac' => 'xyz00',
            'quota_hardlimit' => 0,
            'quota_softlimit' => 0,
            'shell' => '/bin/bash',
            'storage_hardlimit' => 0,
            'storage_softlimit' => 0,
            'userid' => 6,
        ], [
            'comment' => 'comment2',
            'homedir' => '/some/path',
            'id' => '104146',
            'locked' => false,
            'name' => 'user-name',
            'pac' => 'xyz00',
            'quota_hardlimit' => 0,
            'quota_softlimit' => 0,
            'shell' => '/bin/bash',
            'storage_hardlimit' => 0,
            'storage_softlimit' => 0,
            'userid' => 5,
        ],
    ]], [ // next dataset
        '[
]', [
        ]], [ // next dataset
        "[
   {
      domainoptions:[
         'htdocsfallback',
         'indexes',
         'dkim',
         'fastcgi',
         'autoconfig',
         'greylisting',
         'letsencrypt'
      ],
      fcgiphpbin:'/usr/lib/cgi-bin/php',
      hive:'h11',
      id:'67175',
      name:'stufis.de',
      pac:'opa00',
      passengernodejs:'/usr/bin/node',
      passengerpython:'/usr/bin/python3',
      passengerruby:'/usr/bin/ruby',
      since:'03.04.24',
      user:'opa00-domain_stufis',
      validsubdomainnames:'*'
   }
]", [
            [
                'domainoptions' => [
                    'htdocsfallback',
                    'indexes',
                    'dkim',
                    'fastcgi',
                    'autoconfig',
                    'greylisting',
                    'letsencrypt',
                ],
                'fcgiphpbin' => '/usr/lib/cgi-bin/php',
                'hive' => 'h11',
                'id' => 67175,
                'name' => 'stufis.de',
                'pac' => 'opa00',
                'passengernodejs' => '/usr/bin/node',
                'passengerpython' => '/usr/bin/python3',
                'passengerruby' => '/usr/bin/ruby',
                'since' => '03.04.24',
                'user' => 'opa00-domain_stufis',
                'validsubdomainnames' => '*',
            ]
        ]
    ], [ // next dataset
        "Password: *****
[]",
        [],
    ], [
        "[{validsubdomainnames:''}]"
    , [
        ['validsubdomainnames' => '']
    ]] // last dataset
]);
