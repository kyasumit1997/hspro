<!doctype html>
                        <html>
                            <head>
                                <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>
                                <title>Snippet - GoSNippets</title>
                                <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='' rel='stylesheet'>
                                <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<style>

html,
body {
    margin: 0;
    padding: 0;
}


body {
    width: 100vw;
    height: 100vh;
    font-family: 'Open sans';
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background: rgba(57, 50, 173, 1)
}

body>* {
    margin: 0;
    padding: 0;
    box-sizing: inherit;
}

.wrapper {
    width: 700px;
    background: #FFF;
    border-radius: 10px;
    box-shadow: 0 25px 70px rgba(0, 0, 0, .05);
    overflow: hidden;
}

h1.title {
    padding: 15px 0;
    margin-left: 25px;
    font-weight: normal;
    color: rgba(57, 50, 173, 1)
}

.form {
    width: 700px;
}

.myform {
    background: #F4F5F7;
    padding: 25px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-gap: 25px
}

.myform label {
    display: block;
    color: #A8AAC5;
    font-weight: bold;
    font-size: .8rem;
    margin-bottom: 10px;
}

.myform input {
    border: 0;
    outline: 0;
    height: 50px;
    background: #FFF;
    width: 100%;
    border-radius: 5px;
    color: #155BDA;
    font-weight: 700;
    font-size: .9rem;
    text-indent: 15px;
    border: 2px solid transparent;
    transition: border 250ms;
}

.full-width {
    grid-column: -1 / 1
}

.button {
    grid-column: -1 / 1;
    display: flex;
    justify-content: center;
}

.button button {
    border: 0;
    outline: 0;
    width: 120px;
    height: 50px;
    border-radius: 50px;
    color: #FFF;
    font-weight: bold;
    font-size: .9rem;
    cursor: pointer;
    background: linear-gradient(356deg, rgba(57, 50, 173, 1) 0%, rgba(87, 50, 173, 1) 100%);
}

.button button:hover {
    background: rgba(57, 50, 173, 1);
}

 
</style>
                                <script type='text/javascript' src=''></script>
                                <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
                                <!-- <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script> -->
                            </head>
                            <body oncontextmenu='return false' class='snippet-body'>
                             <div class="wrapper">

                             @if (Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                 <li>{{ Session::get('success') }}</li>
                            </ul>
                         </div>
                     @endif
                     @if (Session::has('failed'))
                        <div class="alert alert-success">
                            <ul>
                                 <li>{{ Session::get('failed') }}</li>
                            </ul>
                         </div>
                     @endif
     <div class="form">
         <h1 class="title">Patient</h1>

         <form action="{{route('Public/store')}}" method="post" class="myform" enctype="multipart/form-data">
            @csrf
             <div class="control-from">
                 <label for="firstname">Full Name *</label>
                 <input type="text" name="full_name" >
             </div>
             
             @error('full_name') <div class="alert alert-danger">
                    <ul>
                        <li>{{ $message }}</li>
                    </ul>
                    </div>
                  @enderror
            

             <div class="control-from">
                 <label for="lastname">Password *</label>
                 <input type="text" name="password">
             </div>
             
             @error('password') <div class="alert alert-danger">
                    <ul>
                        <li>{{ $message }}</li>
                    </ul>
                    </div>
                  @enderror
             

             <div class="control-from">
                 <label for="emailaddress">Email Address *</label>
                 <input type="email" name="emailaddress" >
             </div>
        
             @error('emailaddress') <div class="alert alert-danger">
                    <ul>
                        <li>{{ $message }}</li>
                    </ul>
                </div>
                  @enderror
        

             <div class="control-from">
                 <label for="phonenumber">Contact Number</label>
                 <input type="phone" name="phonenumber" >
             </div>
             
             @error('phonenumber') <div class="alert alert-danger">
                    <ul>
                        <li>{{ $message }}</li>
                    </ul>
                    </div>
                  @enderror
             

             <div class="full-width">
                 <label for="State">State</label>
                 <!-- <input type="text" name="state" > -->
                 <select class="form-control" name="state" id="states">
                </select>
             </div>
            
             @error('state') <div class="alert alert-danger">
                    <ul>
                        <li>{{ $message }}</li>
                    </ul>
                    </div>
                  @enderror
            

             <div class="control-from">
                 <label for="city">City</label>
                 <!-- <input type="text" name="city" > -->
                 <select class="form-control" name="city" id="cities">
                </select>
             </div>
             
             @error('city') <div class="alert alert-danger">
                    <ul>
                        <li>{{ $message }}</li>
                    </ul>
                </div>
                  @enderror
             

             <div class="control-from">
                 <label for="address">Address </label>
                 <input type="text" name="address" >
             </div>
             
             @error('address') <div class="alert alert-danger">
                    <ul>
                        <li>{{ $message }}</li>
                    </ul>
                </div>
                  @enderror
            

             <div class="control-from">
                 <label for="pinCode">Pin Code </label>
                 <input type="text" name="pincode" >
             </div>
             
             @error('pincode') <div class="alert alert-danger">
                    <ul>
                        <li>{{ $message }}</li>
                    </ul>
                </div>
                  @enderror
             

             <div class="form-group">
                <label for="sel1">Type of Cancer</label>
                    <select class="form-control" name="specialization">

                        @foreach($datas as $data)
                        <option value="{{$data['did']}}">{{$data['cancer_type']}}</option>
                        @endforeach
                </select>                          
            </div>
            
             @error('specialization') <div class="alert alert-danger">
                    <ul>
                        <li>{{ $message }}</li>
                    </ul>
                </div>
                  @enderror
             

            <div class="control-from">
                 <label for="documents">Documents </label>
                 <input type="file" name="file" >
             </div>
             
             @error('documents') <div class="alert alert-danger">
                    <ul>
                        <li>{{ $message }}</li>
                    </ul>
                </div>
                  @enderror

             <div class="button">
                 <button id="register">Submit</button>
             </div>



         </form>

         <script>
        
        const _token ={tkn: undefined};

       

       const result =  $.ajax({
            url: 'https://www.universal-tutorial.com/api/getaccesstoken',
            type: 'GET',
            dataType:'json',
            beforeSend: function (xhr) {

                xhr.setRequestHeader('Accept', 'application/json');
                xhr.setRequestHeader('api-token', 'g22Mgca8oGGD1Wz1O3hx5IFly4jIg5HvFsuE6KL8EciO2c49pwjJ4AJatJqeG5Xe2b8');
                xhr.setRequestHeader('user-email', 'sumitsinghrajput56@gmail.com');
            },
            success: function (response) {
                // setToken(response.auth_token);
                return new Promise((resolve) => {
                    _token.tkn = response.auth_token;
                })
                
            }
        });


      const token = result.then((data) => {
        $.ajax({
        url: 'https://www.universal-tutorial.com/api/states/india',
        type: 'GET',
        beforeSend: function (xhr) {
            xhr.setRequestHeader('Authorization', 'Bearer '+data.auth_token);
        },
        data: {},
        success: function (response) {
            $('#states').html('');
            $.each(response, function(i, p) {
                $('#states').append($('<option></option>').val(p.state_name).html(p.state_name));
            });
         },
        error: function () { },
        });

       })

       $('#states').change(function() {
       
        state = this.value;
        const _token ={tkn: undefined};

       const result =  $.ajax({
            url: 'https://www.universal-tutorial.com/api/getaccesstoken',
            type: 'GET',
            dataType:'json',
            beforeSend: function (xhr) {

                xhr.setRequestHeader('Accept', 'application/json');
                xhr.setRequestHeader('api-token', 'g22Mgca8oGGD1Wz1O3hx5IFly4jIg5HvFsuE6KL8EciO2c49pwjJ4AJatJqeG5Xe2b8');
                xhr.setRequestHeader('user-email', 'sumitsinghrajput56@gmail.com');
            },
            success: function (response) {
                // setToken(response.auth_token);
                return new Promise((resolve) => {
                    _token.tkn = response.auth_token;
                })
                
            }
        });


      const token = result.then((data) => {
        $.ajax({
        url: 'https://www.universal-tutorial.com/api/cities/'+state,
        type: 'GET',
        beforeSend: function (xhr) {
            xhr.setRequestHeader('Authorization', 'Bearer '+data.auth_token);
        },
        data: {},
        success: function (response) {
            $('#cities').html('');
            $.each(response, function(i, p) {
                $('#cities').append($('<option></option>').val(p.city_name).html(p.city_name));
            });
         },
        error: function () { },
        });

       })


       });





//             var pp;
//             var settings = {
//   "url": "https://www.universal-tutorial.com/api/getaccesstoken",
//   "method": "GET",
//   "timeout": 0,
//   "headers": {
//     "Accept": "application/json",
//     "api-token": "g22Mgca8oGGD1Wz1O3hx5IFly4jIg5HvFsuE6KL8EciO2c49pwjJ4AJatJqeG5Xe2b8",
//     "user-email": "sumitsinghrajput56@gmail.com"
//   },
// };

// $.ajax(settings).done(function (response) {

//     pp = response.auth_token;
//     console.log(pp);
// });

// console.log(pp);

// var settings = {
//   "url": "https://www.universal-tutorial.com/api/states/india",
//   "method": "GET",
//   "timeout": 0,
//   "headers": {
//     "Accept": "application/json",
//     "Authorization": 'Bearer '+auth_token
//   },
// };
// $.ajax(settings).done(function (response) {
//   console.log(response);
// });
         </script>
     </div>
 </div>
                            </body>
                        </html>