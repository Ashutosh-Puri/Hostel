<?php

namespace Database\Seeders;

use App\Models\Cast;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $castData = [

           // ST START
        [
            'category_id' => '1',
            'name' => 'Hindu Bhil',
            'status' => '0',
        ],
        [
            'category_id' => '1',
            'name' => 'Hindu Katkari',
            'status' => '0',
        ],
        [
            'category_id' => '1',
            'name' => 'Hindu Kathkari',
            'status' => '0',
        ],
        [
            'category_id' => '1',
            'name' => 'Hindu Dhor Koli',
            'status' => '0',
        ],
        [
            'category_id' => '1',
            'name' => 'Hindu Mahadev Koli',
            'status' => '0',
        ],
        [
            'category_id' => '1',
            'name' => 'Hindu Pardhi',
            'status' => '0',
        ],
        [
            'category_id' => '1',
            'name' => 'Hindu Phanse Pardhi',
            'status' => '0',
        ],
        [
            'category_id' => '1',
            'name' => 'Hindu Thakar',
            'status' => '0',
        ],
        // ST END

         // OBC START
         [
            'category_id' => '2',
            'name' => 'Hindu Gurav',
            'status' => '0',
        ],
        [
            'category_id' => '2',
            'name' => 'Hindu Javheri',
            'status' => '0',
        ],
        [
            'category_id' => '2',
            'name' => 'Hindu Jangam',
            'status' => '0',
        ],
        [
            'category_id' => '2',
            'name' => 'Hindu Kamati',
            'status' => '0',
        ],
        [
            'category_id' => '2',
            'name' => 'Hindu Kumbhar',
            'status' => '0',
        ],
        [
            'category_id' => '2',
            'name' => 'Hindu Kunbi',
            'status' => '0',
        ],
        [
            'category_id' => '2',
            'name' => 'Hindu Kunbi Maratha',
            'status' => '0',
        ],
        [
            'category_id' => '2',
            'name' => 'Hindu Kasar',
            'status' => '0',
        ],

        [
            'category_id' => '2',
            'name' => 'Hindu Naavi',
            'status' => '0',
        ],
        [
            'category_id' => '2',
            'name' => 'Hindu Warik',
            'status' => '0',
        ],
        [
            'category_id' => '2',
            'name' => 'Hindu Salmaniya',
            'status' => '0',
        ],
        [
            'category_id' => '2',
            'name' => 'Hindu Parit',
            'status' => '0',
        ],
        [
            'category_id' => '2',
            'name' => 'Hindu Phulari',
            'status' => '0',
        ],
        [
            'category_id' => '2',
            'name' => 'Hindu Rangari',
            'status' => '0',
        ],
        [
            'category_id' => '2',
            'name' => 'Hindu Shimpi',
            'status' => '0',
        ],
        [
            'category_id' => '2',
            'name' => 'Hindu Sonar',
            'status' => '0',
        ],
        [
            'category_id' => '2',
            'name' => 'Hindu Tambat',
            'status' => '0',
        ],
        [
            'category_id' => '2',
            'name' => 'Hindu Kasar',
            'status' => '0',
        ],
        [
            'category_id' => '2',
            'name' => 'Hindu Dharkar',
            'status' => '0',
        ],
        [
            'category_id' => '2',
            'name' => 'Hindu Agari',
            'status' => '0',
        ],
        [
            'category_id' => '2',
            'name' => 'Hindu Sutar',
            'status' => '0',
        ],
        [
            'category_id' => '2',
            'name' => 'Hindu Tilwan-teli',
            'status' => '0',
        ],
        [
            'category_id' => '2',
            'name' => 'Hindu Lingayat-teli',
            'status' => '0',
        ],
        [
            'category_id' => '2',
            'name' => 'Muslim Bagwan',
            'status' => '0',
        ],
        [
            'category_id' => '2',
            'name' => 'Muslim Lonari',
            'status' => '0',
        ],
        [
            'category_id' => '2',
            'name' => 'Muslim Kasai',
            'status' => '0',
        ],
        [
            'category_id' => '2',
            'name' => 'Muslim Kureshi',
            'status' => '0',
        ],
        [
            'category_id' => '2',
            'name' => 'Muslim Khatik',
            'status' => '0',
        ],
        // OBC END

        // SBC START
            [
                'category_id' => '3',
                'name' => 'Hindu Gowaari',
                'status' => '0',
            ],
            [
                'category_id' => '3',
                'name' => 'Hindu Koshti',
                'status' => '0',
            ],

            [
                'category_id' => '3',
                'name' => 'Hindu Sali',
                'status' => '0',
            ],

            [
                'category_id' => '3',
                'name' => 'Hindu Lad Koshti',
                'status' => '0',
            ],
            [
                'category_id' => '3',
                'name' => 'Hindu Swakul Shali',
                'status' => '0',
            ],

            [
                'category_id' => '3',
                'name' => 'Hindu Padma Shali',
                'status' => '0',
            ],
            [
                'category_id' => '3',
                'name' => 'Hindu Koli',
                'status' => '0',
            ],
            [
                'category_id' => '3',
                'name' => 'Hindu Munnerwar',
                'status' => '0',
            ],
            // SBC END

            // SC START
            [
                'category_id' => '4',
                'name' => 'Hindu Burud',
                'status' => '0',
            ],
            [
                'category_id' => '4',
                'name' => 'Hindu Bedajangam',
                'status' => '0',
            ],
            [
                'category_id' => '4',
                'name' => 'Hindu Bedar',
                'status' => '0',
            ],
            [
                'category_id' => '4',
                'name' => 'Hindu Chamaar',
                'status' => '0',
            ],

            [
                'category_id' => '4',
                'name' => 'Hindu Chambhar',
                'status' => '0',
            ],
            [
                'category_id' => '4',
                'name' => 'Hindu Mochigaar',
                'status' => '0',
            ],
            [
                'category_id' => '4',
                'name' => 'Hindu Mochi',
                'status' => '0',
            ],
            [
                'category_id' => '4',
                'name' => 'Hindu Kamati Mochi',
                'status' => '0',
            ],
            [
                'category_id' => '4',
                'name' => 'Hindu Bhangi',
                'status' => '0',
            ],
            [
                'category_id' => '4',
                'name' => 'Hindu Mehatar',
                'status' => '0',
            ],
            [
                'category_id' => '4',
                'name' => 'Hindu Balmiki',
                'status' => '0',
            ],
            [
                'category_id' => '4',
                'name' => 'Hindu Khatik',
                'status' => '0',
            ],
            [
                'category_id' => '4',
                'name' => 'Hindu Mahar',
                'status' => '0',
            ],
            [
                'category_id' => '4',
                'name' => 'Hindu Mala Jangam',
                'status' => '0',
            ],
            [
                'category_id' => '4',
                'name' => 'Muslim Madaari',
                'status' => '0',
            ],
            [
                'category_id' => '4',
                'name' => 'Muslim Gaarudi',
                'status' => '0',
            ],
            // SC END

             // VJ-A START
             [
                'category_id' => '5',
                'name' => 'Hindu Berad',
                'status' => '0',
            ],
            [
                'category_id' => '5',
                'name' => 'Hindu Bestar',
                'status' => '0',
            ],
            [
                'category_id' => '5',
                'name' => 'Hindu Bhamata',
                'status' => '0',
            ],
            [
                'category_id' => '5',
                'name' => 'Hindu Kaikadi',
                'status' => '0',
            ],
            [
                'category_id' => '5',
                'name' => 'Hindu Kanjarbhat',
                'status' => '0',
            ],
            [
                'category_id' => '5',
                'name' => 'Hindu Banjara',
                'status' => '0',
            ],
            [
                'category_id' => '5',
                'name' => 'Hindu Raj Pardhi',
                'status' => '0',
            ],
            [
                'category_id' => '5',
                'name' => 'Hindu Rajput Bhamta',
                'status' => '0',
            ],
            [
                'category_id' => '5',
                'name' => 'Hindu Ramoshi',
                'status' => '0',
            ],
            [
                'category_id' => '5',
                'name' => 'Hindu Vadar',
                'status' => '0',
            ],
	        [
                'category_id' => '5',
                'name' => 'Muslim Takari',
                'status' => '0',
            ],
	        [
                'category_id' => '5',
                'name' => 'Muslim Chapparband',
                'status' => '0',
            ],
            // VJ-A END

            // NT-B START
            [
                'category_id' => '6',
                'name' => 'Hindu Gosavi',
                'status' => '0',
            ],
            [
                'category_id' => '6',
                'name' => 'Hindu Beldar',
                'status' => '0',
            ],
            [
                'category_id' => '6',
                'name' => 'Hindu Bharaadi',
                'status' => '0',
            ],
            [
                'category_id' => '6',
                'name' => 'Hindu Garudi',
                'status' => '0',
            ],
            [
                'category_id' => '6',
                'name' => 'Hindu Lohar',
                'status' => '0',
            ],
            [
                'category_id' => '6',
                'name' => 'Hindu Golla',
                'status' => '0',
            ],
            [
                'category_id' => '6',
                'name' => 'Hindu Gondhali',
                'status' => '0',
            ],
            [
                'category_id' => '6',
                'name' => 'Hindu Gopal',
                'status' => '0',
            ],
            [
                'category_id' => '6',
                'name' => 'Hindu Kolhati',
                'status' => '0',
            ],
            [
                'category_id' => '6',
                'name' => 'Hindu Masanjogi',
                'status' => '0',
            ],
            [
                'category_id' => '6',
                'name' => 'Hindu Rawal',
                'status' => '0',
            ],
            [
                'category_id' => '6',
                'name' => 'Muslim Sikkalgar',
                'status' => '0',
            ],
            [
                'category_id' => '6',
                'name' => 'Hindu Vaidu',
                'status' => '0',
            ],
            [
                'category_id' => '6',
                'name' => 'Hindu Bhoi',
                'status' => '0',
            ],
            [
                'category_id' => '6',
                'name' => 'Muslim Madari',
                'status' => '0',
            ],
            [
                'category_id' => '6',
                'name' => 'Muslim Gavali',
                'status' => '0',
            ],
	        [
                'category_id' => '6',
                'name' => 'Muslim Garudi',
                'status' => '0',
            ],
            [
                'category_id' => '6',
                'name' => 'Muslim Darveshi',
                'status' => '0',
            ],
            // NT-B END

            // NT-C START
            [
                'category_id' => '7',
                'name' => 'Hindu Dhangar',
                'status' => '0',
            ],
	        [
                'category_id' => '7',
                'name' => 'Hindu Hatkar',
                'status' => '0',
            ],
	        [
                'category_id' => '7',
                'name' => 'Hindu Shegar',
                'status' => '0',
            ],
	        [
                'category_id' => '7',
                'name' => 'Hindu Sangar',
                'status' => '0',
            ],
	        [
                'category_id' => '7',
                'name' => 'Hindu Dhanvar',
                'status' => '0',
            ],
            // NT-C END

            // NT-D START
            [
                'category_id' => '8',
                'name' => 'Hindu Vanjari',
                'status' => '0',
            ],
            // NT-D END

        // GENERAL START
	    [
            'category_id' => '9',
            'name' => 'Hindu Maratha',
            'status' => '0',
        ],
        [
            'category_id' => '9',
            'name' => 'Hindu Brahmin',
            'status' => '0',
        ],
        [
            'category_id' => '9',
            'name' => 'Hindu Marawadi',
            'status' => '0',
        ],
        [
            'category_id' => '9',
            'name' => 'Hindu Sindhi ',
            'status' => '0',
        ],
        //GENERAL END
            // Add more user data as needed
        ];
        Cast::insert($castData);
    }
}
