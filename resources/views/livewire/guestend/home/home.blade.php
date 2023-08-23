<div>
    @section('title')
        Home
    @endsection
    <section name="body">
        <div class="row">
            <div class="col-12">
                <div class="row m-0 p-0">
                    <div class="col-12 col-md-8 px-3 py-3">
                        <div class="row m-0 p-0">
                            <div class="col-12 m-0 p-0">
                                @livewire('guestend.slider.show-slider') 
                            </div>
                            <div class="col-12 p-0 ">
                                @livewire('guestend.button-grid.show-button-grid')
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 p-3">
                        <section>
                            @livewire('guestend.notice.show-notice')
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
