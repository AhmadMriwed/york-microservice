@component('mail::message')
    {{-- # New Registration For a Course --}}
    <br>
    <h2 style="text-align: center;">New Registration For a Course</h2>
    <br>
    <table style="border: 1px solid rgb(110, 110, 110); width:98%;">
        <tbody>
        <tr>
        <tr>
            <td><ins>Full Name:</ins></td>
        </tr>
        <tr>
            <td>{{ $registrationDetails['full_name'] }}</td>
        </tr>
        </tr>
        <hr size="1" width=100% style="color:rgb(110, 110, 110);">
        <tr>
        <tr>
            <td><ins>Email:</ins></td>
        </tr>
        <tr>
            <td>{{ $registrationDetails['email'] }}</td>
        </tr>
        </tr>
        <hr size="1" width=100% style="color:rgb(110, 110, 110);">
        <tr>
        <tr>
            <td><ins>Phone:</ins></td>
        </tr>
        <tr>
            <td>{{ $registrationDetails['phone'] }}</td>
        </tr>
        </tr>
        <hr size="1" width=100% style="color:rgb(110, 110, 110);">
        <tr>
        <tr>
            <td><ins>Gender:</ins></td>
        </tr>
        <tr>
            <td>{{ $registrationDetails['gender'] }}</td>
        </tr>
        </tr>
        <hr size="1" width=100% style="color:rgb(110, 110, 110);">
        <tr>
        <tr>
            <td><ins>Address:</ins></td>
        </tr>
        <tr>
            <td>{{ $registrationDetails['address'] }}</td>
        </tr>
        </tr>
        <hr size="1" width=100% style="color:rgb(110, 110, 110);">
        <tr>
        <tr>
            <td><ins>Notes:</ins></td>
        </tr>
        <tr>
            <td>{{ $registrationDetails['notes'] }}</td>
        </tr>
        </tr>
        <hr size="1" width=100% style="color:rgb(110, 110, 110);">
        <tr>
        <tr>
            <td><ins>Course Code:</ins></td>
        </tr>
        <tr>
            <td>{{ $registrationDetails['course_code'] ?? 'N/A' }}</td>
        </tr>
        </tr>
        <hr size="1" width=100% style="color:rgb(110, 110, 110);">
        <tr>
        <tr>
            <td><ins>Course Title:</ins></td>
        </tr>
        <tr>
            <td>
                <a href="https://yorkbritishacademy.uk/Course/{{ $registrationDetails['course_id'] }}">
                    {{ $registrationDetails['course_title'] ?? 'N/A' }}
                </a>
            </td>
        </tr>
        </tr>
        <hr size="1" width=100% style="color:rgb(110, 110, 110);">
        <tr>
        <tr>
            <td><ins>Course Venue:</ins></td>
        </tr>
        <tr>
            <td>{{ $registrationDetails['course_venue'] ?? 'N/A' }}</td>
        </tr>
        </tr>
        <hr size="1" width=100% style="color:rgb(110, 110, 110);">
        <tr>
        <tr>
            <td><ins>Course Category:</ins></td>
        </tr>
        <tr>
            <td>{{ $registrationDetails['course_category'] ?? 'N/A' }}</td>
        </tr>
        </tr>
        <hr size="1" width=100% style="color:rgb(110, 110, 110);">
        <tr>
        <tr>
            <td><ins>Course Start Date:</ins></td>
        </tr>
        <tr>
            <td>{{ $registrationDetails['course_start_date'] ?? 'N/A' }}</td>
        </tr>
        </tr>
        <hr size="1" width=100% style="color:rgb(110, 110, 110);">
        <tr>
        <tr>
            <td><ins>Course End Date:</ins></td>
        </tr>
        <tr>
            <td>{{ $registrationDetails['course_end_date'] ?? 'N/A' }}</td>
        </tr>
        </tr>
        </tbody>
    </table>

    @component('mail::button', ['url' => 'https://yorkbritishacademy.uk/admin/login'])
        Go To Dashboard
    @endcomponent

    <br>
    {{ config('app.name') }}
@endcomponent
