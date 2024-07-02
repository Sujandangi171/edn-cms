<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table aria-describedby="transaltion export">
        <thead>
            <tr>
                <th width="100px">Name</th>
                <th width="100px">Phone Number</th>
                <th width="100px">Email</th>
                <th width="100px">D.O.B</th>
                <th width="100px">Address</th>
                <th width="100px">University</th>
                <th width="100px">Course</th>
                <th width="100px">LinkedIn Url</th>
                <th width="100px">Github Url</th>
                <th width="100px">Vacancy</th>
                <th width="100px">Applied At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->name ?? 'N/A' }}</td>
                    <td>{{ $item->phone_number ?? 'N/A' }}</td>
                    <td>{{ $item->email ?? 'N/A' }}</td>
                    <td>{{ $item->dob ?? 'N/A' }}</td>
                    <td>{{ $item->street . ', ' . $item->municipality->name . ', ' . $item->district->name . ', ' . $item->province->name . ', ' . ($item->country ?? 'N/A') }}
                    </td>
                    <td>{{ isset($item->universityName) ? $item->universityName->title : $item->other_university_title }}
                    </td>
                    <td>{{ $item->course ?? 'N/A' }}</td>
                    <td>{{ $item->linkedin_url ?? 'N/A' }}</td>
                    <td>{{ $item->github_url ?? 'N/A' }}</td>
                    <td>{{ $item->vacancy->title ?? 'N/A' }}</td>
                    <td>{{ $item->created_at ?? 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
