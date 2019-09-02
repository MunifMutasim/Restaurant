@extends('layout.backlayout.master_back')

@section('name')
Settings
@endsection

@section('settings_content')
    @if (\Session::has('update_pwd_fail'))
    <div id="alert" class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ session('update_pwd_fail') }}</strong>
    </div>
    @endif

    @if (\Session::has('update_pwd_success'))
    <div id="alert" class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ session('update_pwd_success') }}</strong>
    </div>
    @endif

    {{-- @if($errors->has())
        @foreach ($errors->all() as $error)
            <p></p>
        @endforeach
    @endif --}}
    
    <form class="form-horizontal" method="post" action="/admin/updatepassword" style="max-width: 500px; margin-left:45px;margin-top:45px;">
    @csrf
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

        <div class="form-group row" style="margin-right: -125px;"> 
            <label class="col-form-label col-sm-3" for="cur_pwd">Current Password</label>
            <input id="cur_pwd" name="cur_pwd" type="password" class="form-control col-sm-6 @error('cur_pwd') is-invalid @enderror" placeholder="Enter password">
            <span id="chkPwd" style="margin-left: 19px; margin-top: 6px; flex: 1; font-size: small;"></span>
            {{-- @error('cur_pwd') --}}
                <span style="margin-top: 5px; color: red;">This field is required</span>
            {{-- @enderror --}}
        </div>
        <div class="form-group row" style="margin-right: -125px;">
            <label class="col-form-label col-sm-3" for="password">New Password</label>
            <input id="password" name="password" type="password" class="form-control col-sm-6" placeholder="Enter password">
        </div>
        <div class="form-group row" style="margin-right: -125px">
            <label class="col-form-label col-sm-3" for="password_confirmatio">Confirm Password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control col-sm-6" placeholder="Enter password">
        </div>
        <div class="form-group"> 
            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
    <script>
        $(document).ready(function(){
            $("#cur_pwd").keyup(function(){
                var cur_pwd= $("#cur_pwd").val();
                $.ajax({
                    url: '/admin/checkpassword', 
                    type: "get",
                    data: {cur_pwd:cur_pwd},
                    success: function(resp){
                        if(resp=="false"){
                            $("#chkPwd").html("<font color='red'>Incorrect Password</font>");
                            // alert("False");
                        }
                        
                        else {
                            // alert("True");
                            $("#chkPwd").html("<font color='green'>Correct</font>");
                        }
                    },error: function(){
                        alert("Error");
                    }
                });
            });
        });
    </script>
@endsection