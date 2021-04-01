<?php

namespace App\Observers;

use App\Models\Plan;
use Illuminate\Support\Str;

class PlanObserser
{
    /**
     * Handle the Plan "creating" event.
     *
     * @param Plan $plan
     * @return void
     */
    public function creating(Plan $plan)
    {
        $plan->url = Str::kebab($plan->name);
    }

    /**
     * Handle the Plan "updating" event.
     *
     * @param Plan $plan
     * @return void
     */
    public function updating(Plan $plan)
    {
        $plan->url = Str::kebab($plan->name);
    }
}
