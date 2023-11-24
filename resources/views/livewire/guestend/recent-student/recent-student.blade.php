<div class="vh-100 w-100 bg-primary ">

    @if ($status===1)
      
            <div wire:poll.5s="fetch">

            </div>
        
    @endif

  
    <div class="row h-100">
        <div class="col-3">
        </div>
        <div class="col-6 my-auto scan">
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
                        <h1 class="text-danger mb-1">Scan Your ID Card</h1>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-3">
        </div>
    </div>

    @section('scripts')
    <script>
        document.addEventListener('livewire:load', function () {
            setInterval(function () {
                Livewire.emit('restart');
            }, 15000);
        });
    </script>
@endsection
</div>
