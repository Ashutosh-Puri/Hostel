<?php

namespace App\Http\Livewire\Backend\Report;


use App\Models\Bed;
use App\Models\Room;
use App\Models\Floor;
use App\Models\Hostel;
use App\Models\College;
use Livewire\Component;
use App\Models\Building;
use Livewire\WithPagination;
use App\Exports\RoomReportExport;
use Maatwebsite\Excel\Facades\Excel;


class AllRoomReport extends Component
{   
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $per_page = 10;
    public $college_id;
    public $hostel_id;
    public $building_id;
    public $floor_id;
    public $room_id;
    public $room_status;
    public $bed_status;
    public $bedArray;

    public function clear()
    {
        $this->college_id=null;
        $this->hostel_id=null;
        $this->building_id=null;
        $this->floor_id=null;
        $this->room_id=null;
        $this->room_status=null;
        $this->bed_status=null;
        $this->bedArray=null;
    }


    public function generateEXCEL()
    {
        try 
        {
            $bedRecords = Bed::whereIn('id', $this->bedArray['id'])->get();
            $excel = view('pdf.room_report', [
                'beds' => $bedRecords,
            ])->extends('layouts.app')->section('content');

            return Excel::download(new RoomReportExport($excel), 'room_report.xlsx');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"EXCEL File Downloding..!"
            ]);
        } 
        catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"EXCEL File Generation Error !!"
            ]);
        }
    }

    public function render()
    {   

        $colleges = College::all();
        $hostelsQuery = Hostel::where('college_id', $this->college_id);

        if ($this->college_id) {
            $hostels = $hostelsQuery->get();
        } else {
            $hostels = [];
        }

        $buildingsQuery = Building::where('hostel_id', $this->hostel_id);
        
        if ($this->hostel_id) {
            $buildings = $buildingsQuery->get();
        } else {
            $buildings = [];
        }

        $floorsQuery = Floor::where('building_id', $this->building_id);

        if ($this->building_id) {
            $floors = $floorsQuery->get();
        } else {
            $floors = [];
        }

        $roomsQuery = Room::where('floor_id', $this->floor_id);

        if ($this->floor_id) {
            $rooms = $roomsQuery->get();
        } else {
            $rooms = [];
        }

        $query = Bed::with(['room.floor.building.hostel.college'])->orderBy('created_at', 'DESC');

        if ($this->college_id) {
            $query->whereHas('room.floor.building.hostel.college', function ($query)  {
                $query->where('id', $this->college_id);
            });
        }

        if ($this->hostel_id) {
            $query->whereHas('room.floor.building.hostel', function ($query)  {
                $query->where('id', $this->hostel_id);
            });  
        }

        if ($this->building_id) {
            $query->whereHas('room.floor.building', function ($query)  {
                $query->where('id', $this->building_id);
            });
        } 

        if ($this->floor_id) {
            $query->whereHas('room.floor', function ($query)  {
                $query->where('id', $this->floor_id);
            });  
        }

        if ($this->room_id) {
            $query->whereHas('room', function ($query)  {
                $query->where('id', $this->room_id);
            });  
        } 

        if ($this->room_status!==null) {                   
            $query->whereHas('room', function ($query)  {
                $query->where('status',$this->room_status);
            });
        }

        if ($this->bed_status!==null) {

            $query->where('status',$this->bed_status);
        }

        $beds = $query->paginate($this->per_page);

        $this->bedArray['id']=  $query->pluck('id')->all();

        return view('livewire.backend.report.all-room-report',compact('beds','rooms','colleges','hostels','buildings','floors'))->extends('layouts.admin.admin')->section('admin');
    }
}