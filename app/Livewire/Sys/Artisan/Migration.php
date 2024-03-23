<?php

namespace App\Livewire\Sys\Artisan;

use Illuminate\Support\Facades\Artisan;
use Livewire\Component;

class Migration extends Component
{

    public function clearView(): void
    {
        Artisan::call('view:clear');
    }

    public function runMigration(): void
    {
        Artisan::call('migrate');
    }

    public function runMigrationRollBack(): void
    {
        Artisan::call('migrate:rollback');
    }


    public function runMigrationFreshSeed(): void
    {
        Artisan::call('migrate:fresh --seed');
    }

    public function render()
    {
        return view('livewire.sys.artisan.migration');
    }
}
