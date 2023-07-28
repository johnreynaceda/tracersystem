<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\AlumniInformation;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ViewColumn;

class AlumniList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    public function render()
    {
        return view('livewire.admin.alumni-list');
    }
    protected function getTableQuery(): Builder
    {
        return AlumniInformation::query();
    }

    protected function getTableColumns(): array
    {

        return [
            ViewColumn::make('status')->view('admin.alumni-list-profile')->label('IMAGE'),
            Tables\Columns\TextColumn::make('fullname')->label('FULLNAME')->formatStateUsing(
                function ($record) {
                    return $record->firstname . ' ' . $record->middlename . ' ' . $record->lastname;
                }
            )->searchable(),
            Tables\Columns\TextColumn::make('contact_number')->label('CONTACT NUMBER')->searchable(),
            Tables\Columns\TextColumn::make('batch')->label('BATCH')->searchable(),
            Tables\Columns\TextColumn::make('course')->label('COURSE')->searchable(),


        ];

    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\Action::make('view')->icon('heroicon-o-eye')->color('warning'),
            Tables\Actions\DeleteAction::make(),
        ];
    }

}