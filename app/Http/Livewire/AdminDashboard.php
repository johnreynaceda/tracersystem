<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use App\Models\AlumniInformation;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Actions\Action;
use Filament\Notifications\Notification;

class AdminDashboard extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return AlumniInformation::query()->where('is_verified', 0);
    }

    public function render()
    {
        return view('livewire.admin-dashboard');
    }

    protected function getTableColumns(): array
    {

        return [
            ViewColumn::make('status')->view('admin.alumni-list-profile')->label('IMAGE'),
            Tables\Columns\TextColumn::make('fullname')->label('FULLNAME')->formatStateUsing(
                function ($record) {
                    return $record->firstname . ' ' . $record->middlename . ' ' . $record->lastname;
                }
            )->searchable([
                        'firstname',
                        'middlename',
                        'lastname',
                    ]),
            Tables\Columns\TextColumn::make('contact_number')->label('CONTACT NUMBER')->searchable(),
            Tables\Columns\TextColumn::make('batch')->label('BATCH')->searchable(),
            Tables\Columns\TextColumn::make('course')->label('COURSE')->searchable()->formatStateUsing(
                function ($record) {
                    return $record->course == null ? $record->short_course : $record->course;
                }

            ),


        ];



    }

    protected function getTableActions(): array
    {
        return [
            Action::make('Approve')->button()->label('Approved')->icon('heroicon-o-thumb-up')->color('success')->action(function ($record) {
                $record->update([
                    'is_verified' => 1,
                ]);
                Notification::make()
                    ->title('Approve successfully')
                    ->success()
                    ->send();
            }),
        ];
    }


}