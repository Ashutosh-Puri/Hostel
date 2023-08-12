@extends('layouts.student')
@section('student')
<div>
    <div class="text-center">
        <div>
            logo
        </div>
        <div>
            <h5>Sangamner Collge</h5>
        </div>
        <div>
            <h2>
                Student Hostel Admission Form (2023 - 24)
            </h2>
        </div>
        <hr size=5>
    </div>
  
    <div class="container">
        <div class="row">
            <div class="col-4 col-md-4">
                <label for="memberid">Member ID:</label>
                <input  class="form-control"type="text">
            </div>
            <div class="col-3 col-md-3">
                <label for="memberid">Bed No.:</label>
                <input  class="form-control"type="text">
            </div>
            <div class="col-5 col-md-5">
                <label for="memberid">Class:</label>
                <input  class="form-control"type="text">
            </div>
        </div>
        <hr  class="bg-primary" size='5px' >
    </div>
   
</div>
@endsection