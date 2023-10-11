<div>
    @section('title')
        Student Dashboard
    @endsection
    <h6>Hello, {{ auth()->user()->username }}, Welcome To Dashboard</h6>
    <section>
       <div class="card">
        header
            <div>
                {{-- <img src="{{ asset(auth()->user()->photo) }}" alt="" style="height: 238px; width:200px;"> --}}
            </div>
       </div>
    </section>
</div>
