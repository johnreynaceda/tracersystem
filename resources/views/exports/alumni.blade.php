<div>
    <div>
        <table>
            <thead>
                <tr>
                    <th>FIRSTNAME</th>
                    <th>MIDDLE INITIAL</th>
                    <th>LASTNAME</th>
                    <th>GENDER</th>
                    <th>CONTACT NUMBER</th>
                    <th>BATCH</th>
                    <th>COURSE</th>
                    <th>3 YEARS COURSE</th>
                    <th>SHORT TERM COURSE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td class="uppercase">{{ $student->lrn }}</td>
                        <td class="uppercase">{{ $student->studentInformation->firstname }}</td>
                        <td class="uppercase">{{ $student->studentInformation->middlename[0] }}</td>
                        <td class="uppercase">{{ $student->studentInformation->lastname }}</td>
                        <td class="uppercase">{{ $student->studentInformation->suffix }}</td>
                        <td class="uppercase">{{ $student->gradeLevel->name }}</td>
                        <td class="uppercase"></td>
                        <td class="uppercase">
                            {{ $student->studentInformation->studentGuardian->Where('relationship', 'MOTHER')->first()->firstname . ' ' . $student->studentInformation->studentGuardian->Where('relationship', 'MOTHER')->first()->lastname }}
                        </td>
                        <td class="uppercase">
                            {{ $student->studentInformation->studentGuardian->Where('relationship', 'MOTHER')->first()->contact_number }}
                        </td>
                        <td class="uppercase">
                            {{ $student->studentInformation->studentAddress->street . ' ' . $student->studentInformation->studentAddress->barangay . ' ' . $student->studentInformation->studentAddress->city . ', ' . $student->studentInformation->studentAddress->province }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>
