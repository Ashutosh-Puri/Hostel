<div class="content">
    <div class="container-fluid">
        @if ($mode=='mail')
            @section('title')
                Reply Enquiry
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="bg-success">
                        <div class="float-start pt-2 px-2">
                            <h2>Reply Enquiry</h2>
                        </div>
                        <div class="float-end">
                            <a wire:loading.attr="disabled"  wire:click="setmode('all')"class="btn btn-success ">
                                Back<span class="btn-label-right mx-2"><i class="mdi mdi-arrow-left-thick"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form  wire:submit.prevent="sendmail({{ isset($m_id)?$m_id:''; }})" method="post" action="" id="myForm">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="reply" class="form-labell">Name</label>
                                            <label for="reply" class="form-control">{{ $this->name }}</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="reply" class="form-labell">Email</label>
                                            <label for="reply" class="form-control">{{ $this->email}}</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="reply" class="form-labell">Mobile</label>
                                            <label for="reply" class="form-control">{{ $this->mobile }}</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="reply" class="form-labell">Subject</label>
                                            <label for="reply" class="form-control">{{ $this->subject }}</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="mb-3 form-group">
                                            <label for="reply"  class="form-labell">Description</label>
                                            <textarea for="reply" class="pe-none w-100"    cols="30" rows="7" >{{ $this->description }}</textarea>

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="mb-3 form-group">
                                            <label for="reply" class="form-label">Message Body</label>
                                            <textarea class=" w-100 @error('reply') is-invalid @enderror" wire:model.debounce.500ms="reply" id="description" placeholder="Enter Enquiry Description"   cols="30" rows="5">{{ old('reply') }}</textarea>
                                            @error('reply')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    </div>
                                <button type="submit" wire:loading.remove wire:target="sendmail" class="btn btn-primary ">
                                    Send Mail
                                </button>
                                <button type="submit" wire:loading wire:target="sendmail" class="btn btn-success ">
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sending Email...
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @elseif ($mode=='add')
            @section('title')
                Add Enquiry
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="bg-success">
                        <div class="float-start pt-2 px-2">
                            <h2>Add Enquiry</h2>
                        </div>
                        <div class="float-end">
                            <a wire:loading.attr="disabled"  wire:click="setmode('all')"class="btn btn-success ">
                                Back<span class="btn-label-right mx-2"><i class="mdi mdi-arrow-left-thick"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form  wire:submit.prevent="save" method="post" action="" id="myForm">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="name" class="form-label">Student Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name" value="{{ old('name') }}" id="name" placeholder="Enter Student Name">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="gender" class="form-label">Select Gender</label>
                                            <select class="form-select  @error('gender') is-invalid @enderror" id="gender" wire:model.debounce.500ms="gender" >
                                                <option hidden value="" >Select </option>
                                                <option  value="0">Male</option>
                                                <option  value="1">Female</option>
                                            </select>
                                            @error('gender')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="email" class="form-label">Student Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" wire:model="email" value="{{ old('email') }}" id="email" placeholder="Enter Student Email">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="mobile" class="form-label">Student Mobile</label>
                                            <input type="number" class="form-control @error('mobile') is-invalid @enderror" wire:model="mobile" value="{{ old('mobile') }}" id="mobile" placeholder="Enter Student Mobile">
                                            @error('mobile')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="subject" class="form-label">Enquiry Subject</label>
                                            <input type="text" class="form-control @error('subject') is-invalid @enderror" wire:model="subject" value="{{ old('subject') }}" id="subject" placeholder="Enter Enquiry Subject">
                                            @error('subject')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group ">
                                            <label for="description" class="form-label mb-3">Status</label><br>
                                            <input class="form-check-input @error('status') is-invalid @enderror" type="checkbox" value="1" {{ $status==1?'checked':''; }} id="class_status"  wire:model="status" >
                                            <label class="form-check-label m-1" for="class_status">Mark As Read Enquiry</label>
                                            @error('status')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="mb-3 form-group">
                                            <label for="description" class="form-label">Enquiry Description</label>
                                            <textarea class=" w-100 @error('description') is-invalid @enderror" wire:model.debounce.1000ms="description" id="description" placeholder="Enter Enquiry Description"   cols="30" rows="5">{{ old('description') }}</textarea>
                                            @error('description')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit"  class="btn btn-primary ">Save Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($mode=='edit')
            @section('title')
                Edit Enquiry
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="bg-success">
                        <div class="float-start pt-2 px-2">
                            <h2>Edit Enquiry</h2>
                        </div>
                        <div class="float-end">
                            <a wire:loading.attr="disabled"  wire:click="setmode('all')"class="btn btn-success ">
                                Back<span class="btn-label-right mx-2"><i class="mdi mdi-arrow-left-thick"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form  wire:submit.prevent="update({{ isset($c_id)?$c_id:''; }})" method="post" action="" id="myForm">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="name" class="form-label">Student Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name" value="{{ old('name') }}" id="name" placeholder="Enter Student Name">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="gender" class="form-label">Select Gender</label>
                                            <select class="form-select  @error('gender') is-invalid @enderror" id="gender" wire:model.debounce.500ms="gender" >
                                                <option hidden value="" >Select </option>
                                                <option  value="0">Male</option>
                                                <option  value="1">Female</option>
                                            </select>
                                            @error('gender')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="email" class="form-label">Student Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" wire:model="email" value="{{ old('email') }}" id="email" placeholder="Enter Student Email">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="mobile" class="form-label">Student Mobile</label>
                                            <input type="number" class="form-control @error('mobile') is-invalid @enderror" wire:model="mobile" value="{{ old('mobile') }}" id="mobile" placeholder="Enter Student Mobile">
                                            @error('mobile')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="subject" class="form-label">Enquiry Subject</label>
                                            <input type="text" class="form-control @error('subject') is-invalid @enderror" wire:model="subject" value="{{ old('subject') }}" id="subject" placeholder="Enter Enquiry Subject">
                                            @error('subject')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group ">
                                            <label for="description" class="form-label mb-3">Status</label><br>
                                            <input class="form-check-input @error('status') is-invalid @enderror" type="checkbox" value="1" {{ $status==1?'checked':''; }} id="class_status"  wire:model="status" >
                                            <label class="form-check-label m-1" for="class_status">Mark As Read Enquiry</label>
                                            @error('status')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="mb-3 form-group">
                                            <label for="description" class="form-label">Enquiry Description</label>
                                            <textarea class=" w-100 @error('description') is-invalid @enderror" wire:model.debounce.1000ms="description" id="description" placeholder="Enter Enquiry Description"   cols="30" rows="5">{{ old('description') }}</textarea>
                                            @error('description')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit"  class="btn btn-primary ">Update Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($mode=='all')
            <div>
                @section('title')
                    All Enquiries
                @endsection
                <div class="row">
                    <div class="col-12">
                        <div class="bg-success">
                            <div class="float-start pt-2 px-2">
                                <h2>Data Enquiries</h2>
                                <div wire:loading wire:target="per_page" class="loading-overlay">
                                    <div class="loading-spinner">
                                        <div class="spinner-border spinner-border-lg text-primary" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="float-end">
                                <a wire:loading class="btn btn-primary btn-sm " style="padding:10px; ">
                                    <span class="spinner-border spinner-border-sm " role="status" aria-hidden="true"></span>
                                    <span class="visually-hidden">Loading...</span>
                                </a>
                                @can('Add Enquiry Form')
                                    <a wire:loading.attr="disabled"  wire:click="setmode('add')"class="btn btn-success ">
                                        Add Enquiry<span class="btn-label-right mx-2"><i class=" mdi mdi-plus-circle fw-bold"></i></span>
                                    </a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <label class=" col-4 col-md-1 py-1 ">Per Page</label>
                                    <select class=" col-4 col-md-1" wire:loading.attr="disabled" wire:model="per_page">
                                        <option value="10">10</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                        <option value="500">500</option>
                                        <option value="1000">1000</option>
                                    </select>
                                    <label class=" col-4 col-md-1  py-1  ">Records</label>
                                    <span class="col-12 col-md-9 p-0">
                                        <span class="row">
                                            <div class="col-12 col-md-6 ">
                                            </div>
                                            <div class="col-12 col-md-3 ">
                                                    <label class="w-100 p-1  text-md-end">Search</label>
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <input  class="w-100" wire:model.debounce.1000ms="search" type="search" placeholder="Student Name">
                                            </div>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="card-body table-responsive">
                                <table id="data-table" class=" table dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Subject</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            @can('Edit Enquiry Form')
                                                <th>Action</th>
                                            @elsecan('Delete Enquiry Form')
                                             <th>Action</th>
                                            @elsecan('Send Enquiry Reply')
                                                <th>Action</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($enquiries as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->gender==1?"Female":"Male"; }}</td>
                                                <td class="text-wrap lh-lg">{{ $item->subject }}</td>
                                                <td class="text-wrap lh-lg">{{ $item->description }}</td>
                                                <td>
                                                    @if ( $item->status == '0')
                                                        <span class="badge bg-success text-white">Unread</span>
                                                    @else
                                                        <span class="badge bg-danger text-white">Read</span>
                                                    @endif
                                                </td>
                                                @can('Edit Enquiry Form')
                                                    <td>
                                                        @can('Send Enquiry Reply')
                                                            <a wire:loading.attr="disabled"  wire:click="mail({{ $item->id }})" class="btn btn-primary "><i class="mdi mdi-reply"></i></a>
                                                        @endcan
                                                        @can('Edit Enquiry Form')
                                                            <a wire:loading.attr="disabled"  wire:click="edit({{ $item->id }})" class="btn btn-success "><i class="mdi mdi-lead-pencil"></i></a>
                                                            @if ($item->status==0)
                                                                <a wire:loading.attr="disabled"  wire:click="status({{ $item->id }})" class="btn btn-success "> <i class="mdi mdi-eye"></i> </a>
                                                            @else
                                                                <a wire:loading.attr="disabled"  wire:click="status({{ $item->id }})" class="btn btn-danger "> <i class="mdi mdi-eye-off"></i> </a>
                                                            @endif
                                                        @endcan
                                                        @can('Delete Enquiry Form')
                                                            @if ($item->deleted_at)
                                                                <a wire:loading.attr="disabled" wire:click.prevent="deleteconfirmation({{ $item->id }})"  class="btn btn-danger "><i class="mdi mdi-delete-forever"></i></a>
                                                                <a wire:loading.attr="disabled" wire:click.prevent="restore({{ $item->id }})"  class="btn btn-success "><i class="mdi mdi-backup-restore"></i></a>
                                                            @else
                                                                <a wire:loading.attr="disabled" wire:click.prevent="softdelete({{ $item->id }})"  class="btn btn-primary "><i class="mdi mdi-delete"></i></a>
                                                            @endif
                                                        @endcan
                                                    </td>
                                                @elsecan('Send Enquiry Reply')
                                                    <td>
                                                        @can('Send Enquiry Reply')
                                                            <a wire:loading.attr="disabled"  wire:click="mail({{ $item->id }})" class="btn btn-primary "><i class="mdi mdi-reply"></i></a>
                                                        @endcan
                                                        @can('Edit Enquiry Form')
                                                            <a wire:loading.attr="disabled"  wire:click="edit({{ $item->id }})" class="btn btn-success "><i class="mdi mdi-lead-pencil"></i></a>
                                                            @if ($item->status==0)
                                                                <a wire:loading.attr="disabled"  wire:click="status({{ $item->id }})" class="btn btn-success "> <i class="mdi mdi-eye"></i> </a>
                                                            @else
                                                                <a wire:loading.attr="disabled"  wire:click="status({{ $item->id }})" class="btn btn-danger "> <i class="mdi mdi-eye-off"></i> </a>
                                                            @endif
                                                        @endcan
                                                        @can('Delete Enquiry Form')
                                                            @if ($item->deleted_at)
                                                                <a wire:loading.attr="disabled" wire:click.prevent="deleteconfirmation({{ $item->id }})"  class="btn btn-danger "><i class="mdi mdi-delete-forever"></i></a>
                                                                <a wire:loading.attr="disabled" wire:click.prevent="restore({{ $item->id }})"  class="btn btn-success "><i class="mdi mdi-backup-restore"></i></a>
                                                            @else
                                                                <a wire:loading.attr="disabled" wire:click.prevent="softdelete({{ $item->id }})"  class="btn btn-primary "><i class="mdi mdi-delete"></i></a>
                                                            @endif
                                                        @endcan
                                                    </td>
                                                @elsecan('Delete Enquiry Form')
                                                    <td>
                                                        @can('Send Enquiry Reply')
                                                            <a wire:loading.attr="disabled"  wire:click="mail({{ $item->id }})" class="btn btn-primary "><i class="mdi mdi-reply"></i></a>
                                                        @endcan
                                                        @can('Edit Enquiry Form')
                                                            <a wire:loading.attr="disabled"  wire:click="edit({{ $item->id }})" class="btn btn-success "><i class="mdi mdi-lead-pencil"></i></a>
                                                            @if ($item->status==0)
                                                                <a wire:loading.attr="disabled"  wire:click="status({{ $item->id }})" class="btn btn-success "> <i class="mdi mdi-eye"></i> </a>
                                                            @else
                                                                <a wire:loading.attr="disabled"  wire:click="status({{ $item->id }})" class="btn btn-danger "> <i class="mdi mdi-eye-off"></i> </a>
                                                            @endif
                                                        @endcan
                                                        @can('Delete Enquiry Form')
                                                            @if ($item->deleted_at)
                                                                <a wire:loading.attr="disabled" wire:click.prevent="deleteconfirmation({{ $item->id }})"  class="btn btn-danger "><i class="mdi mdi-delete-forever"></i></a>
                                                                <a wire:loading.attr="disabled" wire:click.prevent="restore({{ $item->id }})"  class="btn btn-success "><i class="mdi mdi-backup-restore"></i></a>
                                                            @else
                                                                <a wire:loading.attr="disabled" wire:click.prevent="softdelete({{ $item->id }})"  class="btn btn-primary "><i class="mdi mdi-delete"></i></a>
                                                            @endif
                                                        @endcan
                                                    </td>
                                                @endcan
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-4">
                                    {{ $enquiries->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>




