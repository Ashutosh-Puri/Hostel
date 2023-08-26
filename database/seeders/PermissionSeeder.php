<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $records = [
            [   
                'name' => "Access Academic Year",
                'group_name' => 'Academic Year',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Add Academic Year",
                'group_name' => 'Academic Year',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Edit Academic Year",
                'group_name' => 'Academic Year',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Delete Academic Year",
                'group_name' => 'Academic Year',
                'guard_name' => 'admin',
            ],

            [   
                'name' => "Access Admission",
                'group_name' => 'Admission',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Add Admission",
                'group_name' => 'Admission',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Edit Admission",
                'group_name' => 'Admission',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Delete Admission",
                'group_name' => 'Admission',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "View Admission",
                'group_name' => 'Admission',
                'guard_name' => 'admin',
            ],
            
            [   
                'name' => "Access Allocation",
                'group_name' => 'Allocation',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Add Allocation",
                'group_name' => 'Allocation',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Edit Allocation",
                'group_name' => 'Allocation',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "De Allocate Bed",
                'group_name' => 'Allocation',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Allocate Bed",
                'group_name' => 'Allocation',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Exchange Bed",
                'group_name' => 'Allocation',
                'guard_name' => 'admin',
            ],

            [   
                'name' => "Access Class",
                'group_name' => 'Class',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Add Class",
                'group_name' => 'Class',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Edit Class",
                'group_name' => 'Class',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Delete Class",
                'group_name' => 'Class',
                'guard_name' => 'admin',
            ],
            //Quota
            [   
                'name' => "Access Quota",
                'group_name' => 'Quota',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Add Quota",
                'group_name' => 'Quota',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Edit Quota",
                'group_name' => 'Quota',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Delete Quota",
                'group_name' => 'Quota',
                'guard_name' => 'admin',
            ],

            //College
            [   
                'name' => "Access College",
                'group_name' => 'College',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Add College",
                'group_name' => 'College',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Edit College",
                'group_name' => 'College',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Delete College",
                'group_name' => 'College',
                'guard_name' => 'admin',
            ],
            //Hostel
            [   
                'name' => "Access Hostel",
                'group_name' => 'Hostel',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Add Hostel",
                'group_name' => 'Hostel',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Edit Hostel",
                'group_name' => 'Hostel',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Delete Hostel",
                'group_name' => 'Hostel',
                'guard_name' => 'admin',
            ],
            //Building
            [   
                'name' => "Access Building",
                'group_name' => 'Building',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Add Building",
                'group_name' => 'Building',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Edit Building",
                'group_name' => 'Building',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Delete Building",
                'group_name' => 'Building',
                'guard_name' => 'admin',
            ],
            //Floor
            [   
                'name' => "Access Floor",
                'group_name' => 'Floor',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Add Floor",
                'group_name' => 'Floor',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Edit Floor",
                'group_name' => 'Floor',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Delete Floor",
                'group_name' => 'Floor',
                'guard_name' => 'admin',
            ],
            //Seated
            [   
                'name' => "Access Seated",
                'group_name' => 'Seated',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Add Seated",
                'group_name' => 'Seated',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Edit Seated",
                'group_name' => 'Seated',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Delete Seated",
                'group_name' => 'Seated',
                'guard_name' => 'admin',
            ],
            //Fee
            [   
                'name' => "Access Fee",
                'group_name' => 'Fee',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Add Fee",
                'group_name' => 'Fee',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Edit Fee",
                'group_name' => 'Fee',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Delete Fee",
                'group_name' => 'Fee',
                'guard_name' => 'admin',
            ],
            //Room
            [   
                'name' => "Access Room",
                'group_name' => 'Room',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Add Room",
                'group_name' => 'Room',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Edit Room",
                'group_name' => 'Room',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Delete Room",
                'group_name' => 'Room',
                'guard_name' => 'admin',
            ],
            //Bed
            [   
                'name' => "Access Bed",
                'group_name' => 'Bed',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Add Bed",
                'group_name' => 'Bed',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Edit Bed",
                'group_name' => 'Bed',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Delete Bed",
                'group_name' => 'Bed',
                'guard_name' => 'admin',
            ],
            //Facility
            [   
                'name' => "Access Facility",
                'group_name' => 'Facility',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Add Facility",
                'group_name' => 'Facility',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Edit Facility",
                'group_name' => 'Facility',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Delete Facility",
                'group_name' => 'Facility',
                'guard_name' => 'admin',
            ],
            //Student Fine
            [   
                'name' => "Access Student Fine",
                'group_name' => 'Student Fine',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Add Student Fine",
                'group_name' => 'Student Fine',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Edit Student Fine",
                'group_name' => 'Student Fine',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Delete Student Fine",
                'group_name' => 'Student Fine',
                'guard_name' => 'admin',
            ],
            //Fine
            [   
                'name' => "Access Fine",
                'group_name' => 'Fine',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Add Fine",
                'group_name' => 'Fine',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Edit Fine",
                'group_name' => 'Fine',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Delete Fine",
                'group_name' => 'Fine',
                'guard_name' => 'admin',
            ],
            //Notice
            [   
                'name' => "Access Notice",
                'group_name' => 'Notice',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Add Notice",
                'group_name' => 'Notice',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Edit Notice",
                'group_name' => 'Notice',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Delete Notice",
                'group_name' => 'Notice',
                'guard_name' => 'admin',
            ],
            //Photo Gallery
            [   
                'name' => "Access Photo Gallery",
                'group_name' => 'Photo Gallery',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Add Photo",
                'group_name' => 'Photo Gallery',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Edit Photo",
                'group_name' => 'Photo Gallery',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Delete Photo",
                'group_name' => 'Photo Gallery',
                'guard_name' => 'admin',
            ],
            //Rule
            [   
                'name' => "Access Rule",
                'group_name' => 'Rule',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Add Rule",
                'group_name' => 'Rule',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Edit Rule",
                'group_name' => 'Rule',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Delete Rule",
                'group_name' => 'Rule',
                'guard_name' => 'admin',
            ],
            //Student
            [   
                'name' => "Access Student",
                'group_name' => 'Student',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Add Student",
                'group_name' => 'Student',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Edit Student",
                'group_name' => 'Student',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Delete Student",
                'group_name' => 'Student',
                'guard_name' => 'admin',
            ],
            //Student Payment
            [   
                'name' => "Access Student Payment",
                'group_name' => 'Student Payment',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Add Student Payment",
                'group_name' => 'Student Payment',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Edit Student Payment",
                'group_name' => 'Student Payment',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Delete Student Payment",
                'group_name' => 'Student Payment',
                'guard_name' => 'admin',
            ],
            //Student Education
            [   
                'name' => "Access Student Education",
                'group_name' => 'Student Education',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Add Student Education",
                'group_name' => 'Student Education',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Edit Student Education",
                'group_name' => 'Student Education',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Delete Student Education",
                'group_name' => 'Student Education',
                'guard_name' => 'admin',
            ],
            //Role
            [   
                'name' => "Access Role",
                'group_name' => 'Role',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Add Role",
                'group_name' => 'Role',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Edit Role",
                'group_name' => 'Role',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Delete Role",
                'group_name' => 'Role',
                'guard_name' => 'admin',
            ],
            //Admin
            [   
                'name' => "Access Admin",
                'group_name' => 'Admin',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Add Admin",
                'group_name' => 'Admin',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Edit Admin",
                'group_name' => 'Admin',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Delete Admin",
                'group_name' => 'Admin',
                'guard_name' => 'admin',
            ],
            //Cast
            [   
                'name' => "Access Cast",
                'group_name' => 'Cast',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Add Cast",
                'group_name' => 'Cast',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Edit Cast",
                'group_name' => 'Cast',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Delete Cast",
                'group_name' => 'Cast',
                'guard_name' => 'admin',
            ],
            //Category
            [   
                'name' => "Access Category",
                'group_name' => 'Category',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Add Category",
                'group_name' => 'Category',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Edit Category",
                'group_name' => 'Category',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Delete Category",
                'group_name' => 'Category',
                'guard_name' => 'admin',
            ],
            //Enquiry
            [   
                'name' => "Access Enquiry",
                'group_name' => 'Enquiry',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Add Enquiry",
                'group_name' => 'Enquiry',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Edit Enquiry",
                'group_name' => 'Enquiry',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Delete Enquiry",
                'group_name' => 'Enquiry',
                'guard_name' => 'admin',
            ],
            //Slider
            [   
                'name' => "Access Slider",
                'group_name' => 'Slider',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Add Slider",
                'group_name' => 'Slider',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Edit Slider",
                'group_name' => 'Slider',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Delete Slider",
                'group_name' => 'Slider',
                'guard_name' => 'admin',
            ],
            //Contact
            [   
                'name' => "Access Contact",
                'group_name' => 'Contact',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Add Contact",
                'group_name' => 'Contact',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Edit Contact",
                'group_name' => 'Contact',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Delete Contact",
                'group_name' => 'Contact',
                'guard_name' => 'admin',
            ],
            //Nightout Form
            [   
                'name' => "Access Nightout Form",
                'group_name' => 'Nightout Form',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Add Nightout Form",
                'group_name' => 'Nightout Form',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Edit Nightout Form",
                'group_name' => 'Nightout Form',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Delete Nightout Form",
                'group_name' => 'Nightout Form',
                'guard_name' => 'admin',
            ],
            //Local Register Form
            [   
                'name' => "Access Local Register Form",
                'group_name' => 'Local Register Form',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Add Local Register Form",
                'group_name' => 'Local Register Form',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Edit Local Register Form",
                'group_name' => 'Local Register Form',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Delete Local Register Form",
                'group_name' => 'Local Register Form',
                'guard_name' => 'admin',
            ],
            //Student Come From Home Form
            [   
                'name' => "Access Student Come From Home Form",
                'group_name' => 'Student Come From Home Form',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Add Student Come From Home Form",
                'group_name' => 'Student Come From Home Form',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Edit Student Come From Home Form",
                'group_name' => 'Student Come From Home Form',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Delete Student Come From Home Form",
                'group_name' => 'Student Come From Home Form',
                'guard_name' => 'admin',
            ],
            //Report
            [   
                'name' => "Access Report",
                'group_name' => 'Report',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Add Report",
                'group_name' => 'Report',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Edit Report",
                'group_name' => 'Report',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Delete Report",
                'group_name' => 'Report',
                'guard_name' => 'admin',
            ],


            [   
                'name' => "Access Permission",
                'group_name' => 'Permission',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Add Permission",
                'group_name' => 'Permission',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Edit Permission",
                'group_name' => 'Permission',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Delete Permission",
                'group_name' => 'Permission',
                'guard_name' => 'admin',
            ],


            [   
                'name' => "Access Role Wise Permission",
                'group_name' => 'Role Wise Permission',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Add Role Wise Permission",
                'group_name' => 'Role Wise Permission',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Edit Role Wise Permission",
                'group_name' => 'Role Wise Permission',
                'guard_name' => 'admin',
            ],
            [   
                'name' => "Delete Role Wise Permission",
                'group_name' => 'Role Wise Permission',
                'guard_name' => 'admin',
            ],

        ];

        foreach ($records as $record) {
            Permission::create($record);
        }
    }
}
