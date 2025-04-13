<?php

namespace App\Livewire\Auth;

use App\Models\AppSetting;
use Cache;
use Livewire\Component;

class AppSettingsComponent extends Component
{
    public $appSettings;

    public $paginationTheme = 'tailwind';

    public $p_id, $store_name, $currency, $wa_number, $weight, $instagram, $facebook;

    public $isModalOpen = false;
    public $query = '';
    public $totalCount = 0;

    public function mount()
    {
        $appSetting = AppSetting::first();

        $this->p_id = $appSetting->id ?? '';
        $this->store_name = $appSetting->store_name ?? '';
        $this->currency = $appSetting->currency ?? '';
        $this->wa_number = $appSetting->wa_number ?? '';
        $this->weight = $appSetting->weight ?? '';
        $this->instagram = $appSetting->instagram ?? '';
        $this->facebook = $appSetting->facebook ?? '';
    }

    public function render()
    {
        return view('livewire.auth.app-settings-component');
    }


    public function updateAppSettings()
    {
        $validated = $this->validate([
            'store_name' => ['required', 'string', 'max:255'],
            'currency' => ['required', 'string', 'max:255'],
            'wa_number' => ['required', 'string', 'max:255'],
            'weight' => ['required', 'string', 'max:255'],
            'instagram' => ['required', 'string', 'max:255'],
            'facebook' => ['required', 'string', 'max:255'],
        ]);

        $appSettings = AppSetting::updateOrCreate(
            [
                'id' => $this->p_id,
            ],
            $validated
        );

        Cache::forget('app-settings');

        $this->dispatch('app-settings-updated', [$appSettings]);
    }
}
