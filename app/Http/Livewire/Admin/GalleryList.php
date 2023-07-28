<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Gallery;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Livewire\WithFileUploads;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\TextColumn;

class GalleryList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    use WithFileUploads;


    public $attachment;
    public $add_modal = false;

    protected function getTableQuery(): Builder
    {
        return Gallery::query();
    }

    protected function getFormSchema(): array
    {
        return [

            FileUpload::make('attachment')->label('Upload Images')->multiple()->enableReordering()->required()
        ];
    }

    public function uploadImage()
    {
        foreach ($this->attachment as $key => $value) {
            Gallery::create([
                'name' => $value->getClientOriginalName(),
                'gallery_path' => $value->store('gallery', 'public'),
            ]);
            Notification::make()
                ->title('Uploaded successfully')
                ->success()
                ->send();
        }
        $this->add_modal = false;
        return redirect()->route('admin.gallery');
    }

    protected function getTableContentGrid(): ?array
    {
        return [
            'md' => 2,
            'xl' => 5,
        ];
    }


    protected function getTableColumns(): array
    {

        return [
            Split::make([
                TextColumn::make('name'),
            ]),
            ViewColumn::make('status')->view('admin.gallery-image')->label('IMAGE'),

        ];

    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\DeleteAction::make(),
        ];
    }



    public function render()
    {
        return view('livewire.admin.gallery-list');
    }
}