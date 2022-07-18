@extends('layouts.main')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
    integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<div class="container m-5">
    <a href="{{ route('employee.list') }}" class="btn btn-primary">Show Employees</a>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            {{-- {{ Form::open(array('url' => 'foo/bar', 'method' => 'put')) }} --}}
            {{-- <form action="{{ route('employee.add.create') }}" method="post"> --}}
            {{-- @csrf --}}
            <h4 class="text-center">Employee Register</h4>
            <span class="" id="response_message"></span>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" id="name" />
            </div>
            <div class="form-group">
                <label for="">Age</label>
                <input type="text" class="form-control" name="age" id="age" />
            </div>
            <div class="form-group">
                <label for="">Gender</label>
                <input type="text" class="form-control" name="gender" id="gender" />
            </div>
            <div class="form-group">
                <label for="">Date of Birth</label>
                <input type="text" class="form-control" name="dob" id="dob" />
            </div>
            <div class="form-group">
                <label for="">Date of Joining</label>
                <input type="text" class="form-control" name="doj" id="doj" />
            </div>
            <div class="form-group">
                <label for="">Department</label>
                <input type="text" class="form-control" name="dept" id="dept" />
            </div>
            <div class="form-group">
                <label for="">City</label>
                <input type="text" class="form-control" name="city" id="city" />
            </div>
            <div class="form-group">
                <label for="">State</label>
                <input type="text" class="form-control" name="state" id="state" />
            </div>
            <div class="form-group">
                <label for="">Salary</label>
                <input type="text" class="form-control" name="salary" id="salary" />
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-success" id="sbmt" value="Submit" onclick="submit();" />
            </div>
            {{-- </form> --}}
            {{-- {{ Form::close() }} --}}
        </div>
    </div>
</div>


<script>
    function submit() {
        insdata = {
            "_token": "{{ csrf_token() }}",
            "name": $('#name').val(),
            "age": $('#age').val(),
            "gender": $('#gender').val(),
            "dob": $('#dob').val(),
            "doj": $('#doj').val(),
            "dept": $('#dept').val(),
            "city": $('#city').val(),
            "state": $('#state').val(),
            "salary": $('#salary').val(),
        };

        // console.log(insdata);

        $.ajax({
            url: '{{ route('employee.add.create') }}',
            // headers: {
            //     'Authorization': 'Basic xxxxxxxxxxxxx',
            //     'X-CSRF-TOKEN': 'xxxxxxxxxxxxxxxxxxxx',
            //     'Content-Type': 'application/json'
            // },
            method: 'POST',
            dataType: 'json',
            data: insdata,
            success: function(data) {
                console.log(data);
                if(data.status)

                $('#response_message').addClass('text-success');
                $('#response_message').text(data.msg);
            }
        });
    }

    // $('#sbmt').on('click', function(){
    //     submit();
    // });
</script>
