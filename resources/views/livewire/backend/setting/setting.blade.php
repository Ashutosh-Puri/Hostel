<div>
    @section('title')
        Site Setting
    @endsection
    <table id="data-table" class="table  dt-responsive nowrap w-100">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr wire:key='1'>
                <td>1</td>
                <td>Reset Images Symbolic Link</td>
                <td>
                    <a wire:loading.attr="disabled" wire:click.prevent="removesymboliclink()"  class="btn btn-danger ">Delete</a>
                    <a wire:loading.attr="disabled" wire:click.prevent="createsymboliclink()"  class="btn btn-success ">Create</a>
                </td>
            </tr>
            <tr wire:key='2'>
                <td>2</td>
                <td> Show Merit List To Guest User</td>
                <td>
                    @if ($setting)
                        @if ($setting->show_merit_list==1)
                            <a wire:loading.attr="disabled" wire:click.prevent="show_merit_list()"  class="btn btn-danger ">Hide</a>
                        @else
                            <a wire:loading.attr="disabled" wire:click.prevent="show_merit_list()"  class="btn btn-success ">Show</a>
                        @endif
                    @endif
                </td>
            </tr>
            
        </tbody>
    </table>
</div>
