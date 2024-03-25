<?php

namespace App\Http\Livewire\Alumni;

use App\Models\AlumniInformation;
use Filament\Forms;
use Filament\Forms\Components\ViewField;
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

class EditRecord extends Component implements Forms\Contracts\HasForms
{
    use WithFileUploads;
    use Forms\Concerns\InteractsWithForms;
    public $lastname, $middlename, $firstname, $gender, $contact_number, $batch,  $course, $status, $civil, $connected, $nationality, $region, $province, $city, $barangay, $street, $attachment;
    public $employer, $doe, $salary, $image;

    public function mount(){


        $data = AlumniInformation::where('user_id', auth()->user()->id)->first();

        $this->lastname = $data->lastname;
        $this->middlename = $data->middlename;
        $this->firstname = $data->firstname;
        $this->gender = $data->gender;
        $this->contact_number = $data->contact_number;
        $this->course = $data->course;
        $this->batch = $data->batch;
        $this->status = $data->status;
        $this->civil = $data->civil_status;
        $this->nationality = $data->nationality;
        $this->province = $data->province;
        $this->region = $data->region;
        $this->city = $data->city;
        $this->barangay = $data->barangay;
        $this->street = $data->street;
        $this->employer = $data->employer;
        $this->doe = $data->doe;
        $this->salary = $data->salary;
        $this->image = $data->attachment;

    }

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
                    TextInput::make('course')->label('Degree')->required(),
                    TextInput::make('contact_number')->label('Contact Number')->required()->numeric()->length(11),
                    Select::make('status')->label('Employment Status')->required()->reactive()
                        ->options([
                            'Employed' => 'Employed',
                            'Unemployed' => 'Unemployed',
                        ]),
                        ViewField::make('attachment')->view('filament.forms.photo')

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
                    // TextInput::make('connected')->label('Currently Connected to')->required(),
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

    public function saveUpdate(){
        $datas = AlumniInformation::where('user_id', auth()->user()->id)->first();

        $datas->update([
            'lastname' => $this->lastname,
            'firstname' => $this->firstname,
          'middlename' => $this->middlename,
           'gender' => $this->gender,
           'batch' => $this->batch,
           'course' => $this->course,
           'contact_number' => $this->contact_number,
         'status' => $this->status,
          'civil_status' => $this->civil,
          'nationality' => $this->nationality,
        'region' => $this->region,
          'province' => $this->province,
          'city' => $this->city,
          'barangay' => $this->barangay,
        'street' => $this->street,

       'salary' => $this->salary,
          'employer' => $this->employer,
          'doe' => $this->doe,
            'attachment' => $this->attachment != null ? $this->attachment->store('alumni', 'public') : $datas->attachment,

        ]);
        sweetalert()->addSuccess('Update Successfully');
        return redirect()->route('alumni.edit-record');
    }

    public function render()
    {
        return view('livewire.alumni.edit-record');
    }
}
