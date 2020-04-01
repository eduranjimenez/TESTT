<?php

use Illuminate\Database\Seeder;

class ParticipantRepresentationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('participant_representations')->delete();
        
        \DB::table('participant_representations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'commissionrepresentation_id' => 13,
                'participant_id' => 2,
                'created_at' => '2018-10-05 15:31:07',
                'updated_at' => '2018-10-05 15:31:07',
            ),
            1 => 
            array (
                'id' => 2,
                'commissionrepresentation_id' => 7,
                'participant_id' => 3,
                'created_at' => '2018-10-05 15:31:10',
                'updated_at' => '2018-10-05 15:31:10',
            ),
            2 => 
            array (
                'id' => 3,
                'commissionrepresentation_id' => 18,
                'participant_id' => 4,
                'created_at' => '2018-10-05 15:31:14',
                'updated_at' => '2018-10-05 15:31:14',
            ),
            3 => 
            array (
                'id' => 4,
                'commissionrepresentation_id' => 21,
                'participant_id' => 5,
                'created_at' => '2018-10-05 15:31:16',
                'updated_at' => '2018-10-05 15:31:16',
            ),
            4 => 
            array (
                'id' => 5,
                'commissionrepresentation_id' => 11,
                'participant_id' => 6,
                'created_at' => '2018-10-05 15:31:16',
                'updated_at' => '2018-10-05 15:31:16',
            ),
            5 => 
            array (
                'id' => 6,
                'commissionrepresentation_id' => 6,
                'participant_id' => 7,
                'created_at' => '2018-10-05 15:31:18',
                'updated_at' => '2018-10-05 15:31:18',
            ),
            6 => 
            array (
                'id' => 7,
                'commissionrepresentation_id' => 22,
                'participant_id' => 8,
                'created_at' => '2018-10-05 15:31:18',
                'updated_at' => '2018-10-05 15:31:18',
            ),
            7 => 
            array (
                'id' => 8,
                'commissionrepresentation_id' => 9,
                'participant_id' => 9,
                'created_at' => '2018-10-05 15:31:18',
                'updated_at' => '2018-10-05 15:31:18',
            ),
            8 => 
            array (
                'id' => 9,
                'commissionrepresentation_id' => 14,
                'participant_id' => 10,
                'created_at' => '2018-10-05 15:31:18',
                'updated_at' => '2018-10-05 15:31:18',
            ),
            9 => 
            array (
                'id' => 10,
                'commissionrepresentation_id' => 20,
                'participant_id' => 11,
                'created_at' => '2018-10-05 15:31:18',
                'updated_at' => '2018-10-05 15:31:18',
            ),
            10 => 
            array (
                'id' => 11,
                'commissionrepresentation_id' => 9,
                'participant_id' => 12,
                'created_at' => '2018-10-05 15:31:18',
                'updated_at' => '2018-10-05 15:31:18',
            ),
            11 => 
            array (
                'id' => 12,
                'commissionrepresentation_id' => 3,
                'participant_id' => 13,
                'created_at' => '2018-10-05 15:31:19',
                'updated_at' => '2018-10-05 15:31:19',
            ),
            12 => 
            array (
                'id' => 13,
                'commissionrepresentation_id' => 6,
                'participant_id' => 14,
                'created_at' => '2018-10-05 15:31:19',
                'updated_at' => '2018-10-05 15:31:19',
            ),
            13 => 
            array (
                'id' => 14,
                'commissionrepresentation_id' => 3,
                'participant_id' => 15,
                'created_at' => '2018-10-05 15:31:19',
                'updated_at' => '2018-10-05 15:31:19',
            ),
            14 => 
            array (
                'id' => 16,
                'commissionrepresentation_id' => 19,
                'participant_id' => 17,
                'created_at' => '2018-10-05 15:31:26',
                'updated_at' => '2018-10-05 15:31:26',
            ),
            15 => 
            array (
                'id' => 17,
                'commissionrepresentation_id' => 8,
                'participant_id' => 18,
                'created_at' => '2018-10-05 15:31:27',
                'updated_at' => '2018-10-05 15:31:27',
            ),
            16 => 
            array (
                'id' => 18,
                'commissionrepresentation_id' => 20,
                'participant_id' => 19,
                'created_at' => '2018-10-05 15:31:52',
                'updated_at' => '2018-10-05 15:31:52',
            ),
            17 => 
            array (
                'id' => 20,
                'commissionrepresentation_id' => 5,
                'participant_id' => 21,
                'created_at' => '2018-10-05 15:32:10',
                'updated_at' => '2018-10-05 15:32:10',
            ),
            18 => 
            array (
                'id' => 21,
                'commissionrepresentation_id' => 19,
                'participant_id' => 22,
                'created_at' => '2018-10-05 15:34:53',
                'updated_at' => '2018-10-05 15:34:53',
            ),
            19 => 
            array (
                'id' => 22,
                'commissionrepresentation_id' => 8,
                'participant_id' => 23,
                'created_at' => '2018-10-05 15:35:50',
                'updated_at' => '2018-10-05 15:35:50',
            ),
            20 => 
            array (
                'id' => 23,
                'commissionrepresentation_id' => 13,
                'participant_id' => 20,
                'created_at' => '2018-10-05 15:35:59',
                'updated_at' => '2018-10-05 15:35:59',
            ),
            21 => 
            array (
                'id' => 24,
                'commissionrepresentation_id' => 5,
                'participant_id' => 24,
                'created_at' => '2018-10-05 15:39:33',
                'updated_at' => '2018-10-05 15:39:33',
            ),
            22 => 
            array (
                'id' => 25,
                'commissionrepresentation_id' => 16,
                'participant_id' => 25,
                'created_at' => '2018-10-05 15:40:33',
                'updated_at' => '2018-10-05 15:40:33',
            ),
            23 => 
            array (
                'id' => 26,
                'commissionrepresentation_id' => 7,
                'participant_id' => 16,
                'created_at' => '2018-10-05 15:40:51',
                'updated_at' => '2018-10-05 15:40:51',
            ),
            24 => 
            array (
                'id' => 27,
                'commissionrepresentation_id' => 17,
                'participant_id' => 26,
                'created_at' => '2018-10-05 15:42:23',
                'updated_at' => '2018-10-05 15:42:23',
            ),
            25 => 
            array (
                'id' => 28,
                'commissionrepresentation_id' => 4,
                'participant_id' => 27,
                'created_at' => '2018-10-05 15:43:27',
                'updated_at' => '2018-10-05 15:43:27',
            ),
            26 => 
            array (
                'id' => 29,
                'commissionrepresentation_id' => 12,
                'participant_id' => 28,
                'created_at' => '2018-10-05 15:43:37',
                'updated_at' => '2018-10-05 15:43:37',
            ),
            27 => 
            array (
                'id' => 31,
                'commissionrepresentation_id' => 4,
                'participant_id' => 30,
                'created_at' => '2018-10-05 15:50:57',
                'updated_at' => '2018-10-05 15:50:57',
            ),
            28 => 
            array (
                'id' => 32,
                'commissionrepresentation_id' => 21,
                'participant_id' => 29,
                'created_at' => '2018-10-05 15:51:41',
                'updated_at' => '2018-10-05 15:51:41',
            ),
            29 => 
            array (
                'id' => 33,
                'commissionrepresentation_id' => 24,
                'participant_id' => 31,
                'created_at' => '2018-10-05 21:10:56',
                'updated_at' => '2018-10-05 21:10:56',
            ),
            30 => 
            array (
                'id' => 35,
                'commissionrepresentation_id' => 25,
                'participant_id' => 32,
                'created_at' => '2018-10-06 01:16:55',
                'updated_at' => '2018-10-06 01:16:55',
            ),
        ));
        
        
    }
}