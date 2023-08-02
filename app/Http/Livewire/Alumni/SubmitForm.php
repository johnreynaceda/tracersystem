<?php

namespace App\Http\Livewire\Alumni;

use App\Models\AlumniInformation;
use Filament\Forms;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Livewire\WithFileUploads;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use App\Models\Course;

use Livewire\Component;
use DB;

class SubmitForm extends Component implements Forms\Contracts\HasForms
{
    use WithFileUploads;
    use Forms\Concerns\InteractsWithForms;
    public $lastname, $middlename, $firstname, $gender, $contact_number, $batch, $short_course, $course, $status, $civil, $connected, $nationality, $region, $province, $city, $barangay, $street, $attachment;
    public $employer, $doe, $salary;

    protected function getFormSchema(): array
    {
        return [
            Fieldset::make('PERSONAL INFORMATION')
                ->schema([
                    TextInput::make('lastname')->label('Last Name')->required(),
                    TextInput::make('firstname')->label('First Name')->required(),
                    TextInput::make('middlename')->label('Middle Name')->required(),
                    Select::make('gender')->label('Gender')->required()
                        ->options([
                            'Male' => 'Male',
                            'Female' => 'Female',
                        ]),
                    TextInput::make('batch')->label('Batch')->required()->numeric(),
                    Select::make('course')->label('3 Years Course')->required()
                        ->options(Course::where('type', '3 years course')->pluck('name', 'name')->toArray()),
                    Select::make('short_course')->label('Short term course')->required()
                        ->options(Course::where('type', 'Short term course')->pluck('name', 'name')->toArray()),
                    TextInput::make('contact_number')->label('Contact Number')->required()->numeric()->length(11),
                    Select::make('status')->label('Employment Status')->required()->reactive()
                        ->options([
                            'Employed' => 'Employed',
                            'Unemployed' => 'Unemployed',
                        ]),
                    FileUpload::make('attachment')

                ])

                ->columns(3),
            Fieldset::make('EMPLOYED')->visible($this->status == 'Employed')
                ->schema([

                    TextInput::make('employer')->label('Employer Name')->required(),
                    DatePicker::make('doe')->label('Date of Employment')->displayFormat('d/m/Y'),
                    TextInput::make('salary')->label('Salary/Income')->numeric()->required(),

                ])
                ->columns(3),
            Fieldset::make('')
                ->schema([
                    Select::make('civil')->label('Civil Status')->required()
                        ->options([
                            'Single' => 'Single',
                            'Married' => 'Married',
                            'Separated' => 'Separated',
                            'Divorced' => 'Divorced',
                            'Widowed' => 'Widowed',

                        ]),
                    TextInput::make('connected')->label('Currently Connected to')->required(),
                    TextInput::make('nationality')->label('Nationality')->required(),

                ])
                ->columns(3),
            Fieldset::make('PERMANENT ADDRESS')
                ->schema([

                    TextInput::make('region')->label('Region')->required(),
                    TextInput::make('province')->label('Province')->required(),
                    TextInput::make('city')->label('City')->required(),
                    TextInput::make('barangay')->label('Barangay')->required(),
                    TextInput::make('street')->label('Street')->required(),
                ])
                ->columns(3)
        ];
    }

    public function submitForm()
    {
        $this->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
            'gender' => 'required',
            'batch' => 'required',
            'contact_number' => 'required',
            'status' => 'required',
            'civil' => 'required',
            'connected' => 'required',
            'nationality' => 'required',
            'region' => 'required',
            'province' => 'required',
            'city' => 'required',
            'barangay' => 'required',

            'street' => 'required',
            'attachment' => 'required',
            'employer' => $this->status == 'Employed' ? 'required' : '',
            'doe' => $this->status == 'Employed' ? 'required' : '',
            'salary' => $this->status == 'Employed' ? 'required' : '',

        ]);

        DB::beginTransaction();
        $alumni = AlumniInformation::create([
            'user_id' => auth()->user()->id,
            'lastname' => $this->lastname,
            'firstname' => $this->firstname,
            'middlename' => $this->middlename,
            'gender' => $this->gender,
            'batch' => $this->batch,
            'course' => $this->course,
            'short_course' => $this->short_course,
            'contact_number' => $this->contact_number,
            'status' => $this->status,
            'civil_status' => $this->civil,
            'connected' => $this->connected,
            'nationality' => $this->nationality,
            'region' => $this->region,
            'province' => $this->province,
            'city' => $this->city,
            'barangay' => $this->barangay,
            'street' => $this->street,
            'employer' => $this->status == 'Employed' ? $this->employer : null,
            'doe' => $this->status == 'Employed' ? $this->doe : null,
            'salary' => $this->status == 'Employed' ? $this->salary : null,


        ]);

        DB::commit();
        $record = AlumniInformation::where('id', $alumni->id)->first();
        foreach ($this->attachment as $key => $value) {
            $record->update([
                'attachment' => $value->store('alumni', 'public'),

            ]);

            $record->user->update([
                'is_submitted' => 1,
            ]);

        }

        Notification::make()
            ->title('Saved successfully')
            ->success()
            ->send();
        return redirect()->route('alumni.dashboard');
    }



    public function render()
    {
        return view('livewire.alumni.submit-form');
    }
}