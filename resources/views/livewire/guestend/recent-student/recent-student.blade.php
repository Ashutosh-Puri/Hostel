<div class="vh-100 w-100 bg-primary ">
    @section('styles')
    <style>
        /* Custom CSS for Bootstrap 5 Card */
        /* Style the card container */
        .card {
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.02);
        }

        /* Style the card image */
        .card-img-top {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        /* Style the card title */
        .card-title {
            font-size: 1.25rem;
            margin: 0;
        }

        /* Style the card text */
        .card-text {
            font-size: 1rem;
            color: #666;
        }

        /* Add space between multiple cards */
        .card+.card {
            margin-top: 20px;
        }
    </style>
    @endsection
    <div wire:poll.5000ms>
        <div wire:poll="render">

        </div>
    </div>
    <div class="row h-100">
        <div class="col">
        </div>
        <div class="col my-auto">
            <div class="card">
                <div class="card-body text-center py-5 ">
                    
                    @if ($valid===0)
                        @if (isset($student->photo))
                            <img src="{{ asset($student->photo!=null?$student->photo:'assets/images/no_image.jpg') }}" alt="avatar" class=" border border-3 border-success rounded-circle img-fluid" style="width: 150px; height:150px;">
                        @else
                            <img src="{{ asset('assets/images/no_image.jpg') }}" alt="avatar" class="border border-3 border-success rounded-circle img-fluid" style="width: 150px; height:150px;">
                        @endif
                        @if (isset($student->name))
                            <h3 class="my-3">{{ $student->name,}}</h3>
                        @elseif(isset($student->username))
                         <h3 class="my-3">{{ $student->username }}</h3>
                        @endif
                        <h1 class="text-success mb-1">Access Granted !!</h1>
                    @else
                        <img src="{{ asset('assets/images/no_image.jpg') }}" alt="avatar" class="border border-3 border-success rounded-circle img-fluid" style="width: 150px; height:150px;">
                        <h3 class="my-3">Unknown</h3>
                        <h1 class="text-danger mb-1">Access Denied !!</h1>
                    @endif
                </div>
            </div>
        </div>
        <div class="col">
        </div>
    </div>
</div>
