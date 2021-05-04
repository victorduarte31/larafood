<?php

namespace App\Services;


use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TenantService
{

    private $plan, $request;


    public function make(Plan $plan, Request $request)
    {
        $this->plan = $plan;
        $this->request = $request;

        $tenant = $this->storeTenant();
        return  $this->storeUser($tenant);
    }

    public function storeTenant()
    {
        return $this->plan->tenants()->create([
            'cnpj' => $this->request->cnpj,
            'name' => $this->request->empresa,
            'url' => Str::kebab($this->request->empresa),
            'email' => $this->request->email,

            'subscription' => now(),
            'expires_at' => now()->addDays(5)
        ]);
    }

    public function storeUser($tenant)
    {
        return $tenant->users()->create([
            'name' => $this->request->name,
            'email' => $this->request->email,
            'password' => Hash::make($this->request->password),
        ]);
    }
}
