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
                    <th>STATUS</th>
                    <th>CIVIL STATUS</th>
                    <th>CONNECTED</th>
                    <th>NATIONALITY</th>
                    <th>REGION</th>
                    <th>PROVINCE</th>
                    <th>CITY</th>
                    <th>BARANGAY</th>
                    <th>STREET</th>
                    <th></th>
                    <th>EMPLOYER</th>
                    <th>DATE OF EMPLOYED</th>
                    <th>SALARY</th>


                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $alumni)
                    <tr>
                        <td class="uppercase">{{ $alumni->firstname }}</td>
                        <td class="uppercase">{{ $alumni->middlename[0] }}</td>
                        <td class="uppercase">{{ $alumni->lastname }}</td>
                        <td class="uppercase">{{ $alumni->gender }}</td>
                        <td class="uppercase">{{ $alumni->contact_number }}</td>
                        <td class="uppercase">{{ $alumni->batch }}</td>
                        <td class="uppercase">{{ $alumni->course }}</td>
                        <td class="uppercase">{{ $alumni->short_course }}</td>
                        <td class="uppercase">{{ $alumni->status }}</td>
                        <td class="uppercase">{{ $alumni->civil_status }}</td>
                        <td class="uppercase">{{ $alumni->connected }}</td>
                        <td class="uppercase">{{ $alumni->nationality }}</td>
                        <td class="uppercase">{{ $alumni->region }}</td>
                        <td class="uppercase">{{ $alumni->province }}</td>
                        <td class="uppercase">{{ $alumni->city }}</td>
                        <td class="uppercase">{{ $alumni->barangay }}</td>
                        <td class="uppercase">{{ $alumni->street }}</td>
                        <td class="uppercase"></td>
                        <td class="uppercase">{{ $alumni->employer }}</td>
                        <td class="uppercase">{{ $alumni->doe }}</td>
                        <td class="uppercase">{{ $alumni->salary }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>
