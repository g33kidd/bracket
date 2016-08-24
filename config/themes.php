<?php

return [

  'enabled' => true,

  'default_templates' => [
    'index',
    'teams',
    'players'
  ],

  'model_access' => [
    'users' => 'App\Models\User::class',
    'teams' => 'App\Models\Team::class',
  ]

];
