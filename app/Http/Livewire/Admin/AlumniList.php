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
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AlumniExport;

class AlumniList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    public $view_modal = false;
    public $alumni_data = [];

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

    public function exportReport()
    {
        return Excel::download(new AlumniExport, 'AlumniExport.xlsx');
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\Action::make('view')->icon('heroicon-o-eye')->color('warning')->action(
                function ($record) {
                    $this->alumni_data = $record;
                    $this->view_modal = true;
                }
            ),
            Tables\Actions\DeleteAction::make(),
        ];
    }

}