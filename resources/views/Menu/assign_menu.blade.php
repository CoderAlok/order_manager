<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid m-5">
        <button class="btn btn-primary m-5 p-5" id="role_based">Role</button>
        <button class="btn btn-primary m-5 p-5" id="user_based">User</button>
    </div>

    <div class="container-fluid mt-5">
        <button class="btn btn-outline-warning text-uppercase m-5 p-5" id="after-login">After login</button>
        <p id="resss"></p>
    </div>

    <div class="container">
        <select name="access_type" id="access_type" class="form-control col-md-2 offset-md-5">
            <option value="0">User</option>
            <option value="1">Role</option>
        </select>
    </div>

</body>

</html>

<script>
    $('#role_based').on('click', function() {
        let myKeyVals = {
            "_token": "{{ csrf_token() }}",
            'type': 6
        };

        $.ajax({
            type: 'POST',
            url: "{{ route('tester.assign_menu.get.user1') }}",
            data: myKeyVals,
            dataType: "json",
            success: function(resultData) {
                console.info(resultData)
                // alert("Save Complete")
            },
            error: function(errData) {
                console.log(errData)
                // alert("Something went wrong");
            }
        });

    });

    $('#user_based').on('click', function() {
        let myKeyVals = {
            "_token": "{{ csrf_token() }}",
            'type': 5
        };

        $.ajax({
            type: 'POST',
            url: "{{ route('tester.assign_menu.get.user1') }}",
            data: myKeyVals,
            dataType: "json",
            success: function(resultData) {
                // alert("Save Complete")
                console.info(resultData)
            },
            error: function(errData) {
                console.log(errData)
                alert("Something went wrong");
            }
        });
    });



    $('#after-login').on('click', function() {
        let myKeyVals = {
            "_token": "{{ csrf_token() }}",
            'id': 2,
            'access_type': 1 // 0/1
        };

        $.ajax({
            type: 'POST',
            url: "{{ route('tester.assign_menu.get.users') }}",
            data: myKeyVals,
            dataType: "json",
            success: function(resultData) {
                // alert("Save Complete")
                console.info(resultData)
            },
            error: function(errData) {
                console.log(errData)
                alert("Something went wrong");
            }
        });
    });


    $('#access_type').on('change', function() {
        var option = $('#access_type').val();
        console.log(option);

        $.ajax({
            type: 'POST',
            url: "{{ route('tester.assign_menu.check.role') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "option": option
            },
            dataType: "json",
            success: function(resultData) {
                console.log(resultData);
            },
            error: function(errData) {
                console.log(errData);
            }
        });
    });
</script>
