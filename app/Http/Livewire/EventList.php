<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\ViewColumn;

class EventList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    public $add_modal = false;
    public $title, $description, $schedule, $attachment;

    protected function getTableQuery(): Builder
    {
        return Event::query();
    }

    protected function getTableColumns(): array
    {

        return [
            ViewColumn::make('status')->view('admin.event-image')->label('IMAGE'),
            Tables\Columns\TextColumn::make('title')->label('EVENT TITLE')->searchable(),
            Tables\Columns\TextColumn::make('description')->label('DESCRIPTION')->searchable()->words(10),
            Tables\Columns\TextColumn::make('schedule')->date()->label('SCHEDULE')->searchable(),
        ];

    }
    public function render()
    {
        return view('livewire.event-list');
    }

    protected function getFormSchema(): array
    {
        return [
            Grid::make(2)
                ->schema([
                    TextInput::make('title')->label('Title')->required(),
                    TextInput::make('description')->label('Description')->required(),
                    DatePicker::make('schedule')->format('d/m/Y')->label('Schedule'),
                    FileUpload::make('attachment')->label('Upload Images')->required()
                ])


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
                            TextInput::make('schedule')->default($record->type),
                        ];
                    }
                )->modalWidth('lg')->modalHeading('Update Course'),
            Tables\Actions\DeleteAction::make(),
        ];
    }

    public function saveEvent()
    {

        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'schedule' => 'required',
            'attachment' => 'required'
        ]);

        foreach ($this->attachment as $key => $items) {
            Event::create([
                'title' => $this->title,
                'description' => $this->description,
                'schedule' => $this->schedule,
                'image_path' => $items->store('event', 'public'),
            ]);
            Notification::make()
                ->title('Updated successfully')
                ->success()
                ->send();
            $this->add_modal = false;
        }

    }
}