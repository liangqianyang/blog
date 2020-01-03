<?php return array (
  'barryvdh/laravel-debugbar' => 
  array (
    'providers' => 
    array (
      0 => 'Barryvdh\\Debugbar\\ServiceProvider',
    ),
    'aliases' => 
    array (
      'Debugbar' => 'Barryvdh\\Debugbar\\Facade',
    ),
  ),
  'barryvdh/laravel-ide-helper' => 
  array (
    'providers' => 
    array (
      0 => 'Barryvdh\\LaravelIdeHelper\\IdeHelperServiceProvider',
    ),
  ),
  'beyondcode/laravel-dump-server' => 
  array (
    'providers' => 
    array (
      0 => 'BeyondCode\\DumpServer\\DumpServerServiceProvider',
    ),
  ),
  'dingo/api' => 
  array (
    'providers' => 
    array (
      0 => 'Dingo\\Api\\Provider\\LaravelServiceProvider',
    ),
    'aliases' => 
    array (
      'API' => 'Dingo\\Api\\Facade\\API',
    ),
  ),
  'fideloper/proxy' => 
  array (
    'providers' => 
    array (
      0 => 'Fideloper\\Proxy\\TrustedProxyServiceProvider',
    ),
  ),
  'laravel/horizon' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Horizon\\HorizonServiceProvider',
    ),
    'aliases' => 
    array (
      'Horizon' => 'Laravel\\Horizon\\Horizon',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'nesbot/carbon' => 
  array (
    'providers' => 
    array (
      0 => 'Carbon\\Laravel\\ServiceProvider',
    ),
  ),
  'nunomaduro/collision' => 
  array (
    'providers' => 
    array (
      0 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    ),
  ),
  'swooletw/laravel-swoole' => 
  array (
    'providers' => 
    array (
      0 => 'SwooleTW\\Http\\LaravelServiceProvider',
    ),
    'aliases' => 
    array (
      'Server' => 'SwooleTW\\Http\\Server\\Facades\\Server',
      'Table' => 'SwooleTW\\Http\\Server\\Facades\\Table',
      'Room' => 'SwooleTW\\Http\\Websocket\\Facades\\Room',
      'Websocket' => 'SwooleTW\\Http\\Websocket\\Facades\\Websocket',
    ),
  ),
);