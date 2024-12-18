<!DOCTYPE html>
<html lang="en">

<body>

<div class="container">
    <div class="content">
        <h1>New Training Plan Registration</h1>
        <p>Hello York British Academy Team,</p>
        <p>A new user has successfully registered for a training plan. Below are the user details:</p>
        <ul>
            <li><strong>Full Name:</strong> {{$registrationDetails['full_name']}}</li>
            <li><strong>Email:</strong> <a href="mailto:{{$registrationDetails['email']}}">{{$registrationDetails['email']}}</a></li>
            <li><strong>Phone:</strong> {{$registrationDetails['phone']}}</li>

            <li><strong>Registration Time:</strong> {{$registrationDetails['registration_time']}}</li>
        </ul>
        <p>Please review the details and follow up if necessary.</p>
    </div>
</div>
<div class="footer">
    <p>&copy; 2024 York British Academy, All rights reserved.</p>
</div>
</body>
</html>
