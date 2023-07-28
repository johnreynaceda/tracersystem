<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Course;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\Select;

class CourseList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return Course::query();
    }

    public function render()
    {
        return view('livewire.admin.course-list');
    }

    protected function getTableHeaderActions()
    {
        return [
            Action::make('new_course')->label('New Course')->button()->icon('heroicon-o-plus-circle')->action(
                function ($record, $data) {
                    Course::create([
                        'name' => $data['name'],
                        'type' => $data['type'],
                    ]);
                    Notification::make()
                        ->title('Added successfully')
                        ->success()
                        ->send();
                }
            )->form(
                    [
                        TextInput::make('name'),
                        Select::make('type')
                            ->options([
                                '3 years course' => '3 years course',
                                'Short term course' => 'Short term course',
                            ])
                    ]
                )->modalWidth('xl')
        ];
    }
    protected function getTableColumns(): array
    {

        return [
            Tables\Columns\TextColumn::make('name')->label('COURSE NAME')->searchable(),
            Tables\Columns\TextColumn::make('type')->label('TYPE')->searchable(),
        ];

    }

    protected function getTableActions(): array
    {
        return [
            Action::make('edit')->label('Edit')->icon('heroicon-o-pencil-alt')->color('success')->action(
                function ($record, $data) {
                    $record->update($data);
                    Notification::make()
                        ->title('Updated successfully')
                        ->success()
                        ->send();
                }
            )->form(
                    function ($record) {
                        return [
                            TextInput::make('name')->default($record->name),
                            TextInput::make('type')->default($record->type),
                        ];
                    }
                )->modalWidth('lg')->modalHeading('Update Course'),
            Tables\Actions\DeleteAction::make(),
        ];
    }
}