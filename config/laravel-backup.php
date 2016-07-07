<?php
return [
  'backup' => [
    'name' => env('APP_URL'),
    'source' => [
      'files' => [
        'include' => [
          base_path(),
        ],
        'exclude' => [
          base_path('vendor'),
          storage_path(),
        ],
      ],
      'databases' => [
        'mysql'
      ],
    ],
    'destination' => [
      'disks' => [
        'backups',
      ],
    ],
  ],
  'cleanup' => [
    'strategy' => \Spatie\Backup\Tasks\Cleanup\Strategies\DefaultStrategy::class,
    'defaultStrategy' => [
      'keepAllBackupsForDays' => 7,
      'keepDailyBackupsForDays' => 16,
      'keepWeeklyBackupsForWeeks' => 8,
      'keepMonthlyBackupsForMonths' => 4,
      'keepYearlyBackupsForYears' => 2,
      'deleteOldestBackupsWhenUsingMoreMegabytesThan' => 5000
    ]
  ],
  'monitorBackups' => [
    [
      'name' => env('APP_URL'),
      'disks' => ['backups'],
      'newestBackupsShouldNotBeOlderThanDays' => 1,
      'storageUsedMayNotBeHigherThanMegabytes' => 5000,
    ],
    /*
    [
        'name' => 'name of the second app',
        'disks' => ['local', 's3'],
        'newestBackupsShouldNotBeOlderThanDays' => 1,
        'storageUsedMayNotBeHigherThanMegabytes' => 5000,
    ],
    */
  ],
  'notifications' => [
    'handler' => Spatie\Backup\Notifications\Notifier::class,
    'events' => [
      'whenBackupWasSuccessful' => ['log'],
      'whenCleanupWasSuccessful' => ['log'],
      'whenHealthyBackupWasFound' => ['log'],
      'whenBackupHasFailed' => ['log', 'mail'],
      'whenCleanupHasFailed' => ['log', 'mail'],
      'whenUnHealthyBackupWasFound' => ['log', 'mail']
    ],
    'mail' => [
      'from' => 'junliangyan@aliyun.com',
      'to' => '160294913@qq.com',
    ],
    'slack' => [
      'channel' => '#backups',
      'username' => 'Backup bot',
      'icon' => ':robot:',
    ],
  ]
];
