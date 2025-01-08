<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333333;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h2 {
            text-align: center;
            color: #333333;
        }

        table {
            width: 98%;
            margin: auto;
            border-collapse: collapse;
            background-color: #ffffff;
        }

        table td {
            padding: 8px;
            border: 1px solid #ddd;
        }

        table td a {
            color: #3498db;
            text-decoration: none;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .button {
            display: inline-block;
            font-size: 16px;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #3498db;
            border: none;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #777777;
        }
    </style>
</head>
<body>
<h2>New Registration For a Course</h2>
<br>

<table>
    <tr>
        <td><strong>Full Name:</strong></td>
        <td>{{ $registrationDetails['full_name'] }}</td>
    </tr>
    <tr>
        <td><strong>Email:</strong></td>
        <td>{{ $registrationDetails['email'] }}</td>
    </tr>
{{--    <tr>--}}
{{--        <td><strong>Phone:</strong></td>--}}
{{--        <td>{{ $registrationDetails['phone'] }}</td>--}}
{{--    </tr>--}}
{{--    <tr>--}}
{{--        <td><strong>Gender:</strong></td>--}}
{{--        <td>{{ $registrationDetails['gender'] }}</td>--}}
{{--    </tr>--}}
{{--    <tr>--}}
{{--        <td><strong>Address:</strong></td>--}}
{{--        <td>{{ $registrationDetails['address'] }}</td>--}}
{{--    </tr>--}}
{{--    <tr>--}}
{{--        <td><strong>Notes:</strong></td>--}}
{{--        <td>{{ $registrationDetails['notes'] }}</td>--}}
{{--    </tr>--}}
    <tr>
        <td><strong>Course Code:</strong></td>
        <td>{{ $registrationDetails['course_code'] ?? 'N/A' }}</td>
    </tr>
    <tr>
        <td><strong>Course Title:</strong></td>
        <td>
            <a href="https://yorkbritishacademy.uk/Course/{{ $registrationDetails['course_id'] }}">
                {{ $registrationDetails['course_title'] ?? 'N/A' }}
            </a>
        </td>
    </tr>
    <tr>
        <td><strong>Course Venue:</strong></td>
        <td>{{ $registrationDetails['course_venue'] ?? 'N/A' }}</td>
    </tr>
    <tr>
        <td><strong>Course Category:</strong></td>
        <td>{{ $registrationDetails['course_category'] ?? 'N/A' }}</td>
    </tr>
    <tr>
        <td><strong>Course Start Date:</strong></td>
        <td>{{ $registrationDetails['course_start_date'] ?? 'N/A' }}</td>
    </tr>
    <tr>
        <td><strong>Course End Date:</strong></td>
        <td>{{ $registrationDetails['course_end_date'] ?? 'N/A' }}</td>
    </tr>
</table>

<br>

<div class="button-container">
    <a href="https://yorkbritishacademy.uk/admin/login" class="button" target="_blank">
        Go To Dashboard
    </a>
</div>

<br>


<div class="footer">
    <p>{{ config('app.name') }} &copy; {{ date('Y') }}. All rights reserved.</p>
</div>
</body>
</html>
