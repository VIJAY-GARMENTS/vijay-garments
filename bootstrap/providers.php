<?php

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\EventServiceProvider::class,
    App\Providers\FortifyServiceProvider::class,
    App\Providers\JetstreamServiceProvider::class,
    Aaran\Common\Providers\CommonServiceProvider::class,
    Aaran\Master\Providers\MasterServiceProvider::class,
    Aaran\Entries\Providers\EntriesServiceProvider::class,
    Aaran\Erp\Providers\ErpServiceProvider::class,
    Aaran\Orders\Providers\OrderServiceProvider::class,
    Aaran\Attendance\Providers\AttendanceServiceProvider::class,
    Aaran\Taskmanager\Providers\TaskmanagerServiceProvider::class,
    Aaran\Audit\Providers\AuditServiceProvider::class,
    Aaran\Admin\Providers\AdminServiceProvider::class,
    Aaran\Magalir\Providers\MagalirServiceProvider::class,
    Aaran\Accounts\Providers\AccountsServiceProvider::class,
    Aaran\Offset\Providers\OffsetServiceProvider::class,

];
