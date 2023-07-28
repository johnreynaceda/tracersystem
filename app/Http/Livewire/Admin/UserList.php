<?php

namespace App\Http\Livewire\Admin;


use Livewire\Component;
use App\Models\User;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Actions\Action;

class UserList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return User::query();
    }

    protected function getTableHeaderActions()
    {
        return [
            Action::make('new_user')->label('New User')->button()->icon('heroicon-o-user-add')
        ];
    }

    protected function getTableColumns(): array
    {

        return [
            Tables\Columns\TextColumn::make('name')->label('NAME')->searchable(),
            Tables\Columns\TextColumn::make('email')->label('EMAIL')->searchable(),
            Tables\Columns\BadgeColumn::make('is_admin')->enum([
                1 => 'Administrator',
                0 => 'Alumni'
            ])->colors([
                        'danger' => 1,
                        'success' => 0
                    ])->icons([
                        0 => 'heroicon-o-finger-print',
                    ])->label('ROLE')->searchable(),
        ];

    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\Action::make('edit')->icon('heroicon-o-pencil-alt'),
            Tables\Actions\DeleteAction::make(),
        ];
    }

    public function render()
    {
        return view('livewire.admin.user-list');
    }
}