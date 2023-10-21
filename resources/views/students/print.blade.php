<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
        }

        .card-frame {
            width: 352px;
            height: 538px;
            background-image: url("{{ asset('images/cardframe.png') }}");
            background-size: 100% auto;
            background-position: center;
            position: relative;
            color: #1E0064;
        }

        .studentimage {
            width: 161px;
            height: 161px;
            object-fit: cover;
            object-position: center;
            border-radius: 100%;
            border: 1px;
            position:absolute;
            left: 96px;
            top: 99px;
        }

        .studentimage > img {
            width: 100%;
            height: 100%;
            border-radius: 100%;
        }

        .information-container {
            padding: 350px 5px 5px 5px;

            font-size: 17px;
        }

        .information-container table {
            width: 100%;
        }

        .information-container table tr {
            height: 28px;
        }

        .information-container table tr td:first-child {
            width: 120px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="card-frame">
        <div class="studentimage">
            <img src="{{ asset($student->studentprofilepicture) }}" alt="studentimage"/>
        </div>
        <div class="information-container">
            <table>
                <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td>{{ $student->name }}</td>
                </tr>
                <tr>
                    <td>ID Number</td>
                    <td>:</td>
                    <td>{{ $student->member_id }}</td>
                </tr>
                <tr>
                    <td>Class</td>
                    <td>:</td>
                    <td>{{ $student->program->name }}</td>
                </tr>
                <tr>
                    <td>Campus</td>
                    <td>:</td>
                    <td>{{ $student->campus }}</td>
                </tr>
                <tr>
                    <td>Date of Issue</td>
                    <td>:</td>
                    <td>{{ $student->dateofissue }}</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
