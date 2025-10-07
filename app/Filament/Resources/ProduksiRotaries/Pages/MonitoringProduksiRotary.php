<?php

namespace App\Filament\Resources\ProduksiRotaries\Pages;

use App\Filament\Resources\ProduksiRotaries\ProduksiRotaryResource;
use Filament\Resources\Pages\Page;
use Illuminate\Contracts\View\View;

class MonitoringProduksiRotary extends Page
{
    protected static string $resource = ProduksiRotaryResource::class;

    protected ?string $heading = 'Monitoring Produksi Rotary';

    // untuk test, render langsung pakai welcome
    public function render(): View
    {
        return view('welcome');
    }
}