<?php

namespace App\Filament\Widgets;

use App\Models\Reservation;
use App\Repositories\ReservationRepository;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class DashboardWidget extends BaseWidget
{
    protected static string|null $heading = 'Dernières Réservations'; // Change le titre de la table

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Reservation::query()
                    ->latest()
                    ->limit(10)
            )
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                Tables\Columns\TextColumn::make('customer.name')->label('Client')->searchable(),
                Tables\Columns\TextColumn::make('created_at')->label('Date de réservation')->dateTime(),
            ]);
    }
}
