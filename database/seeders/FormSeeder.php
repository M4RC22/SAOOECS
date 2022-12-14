<?php

namespace Database\Seeders;

use App\Models\Form;
use App\Models\Event;
use App\Models\Proposal;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $proposal = [
            [
                
                "duration_val" => 1,
                "duration_unit" => "day(s)",
                "venue" => "Asia Pacific College",
                "organizer_name" => "Michelle Manadero",
                "act_classification" => "t5",
                "act_location" => "In-Campus",
                "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostru.",
                "rationale" => "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.",
                "outcome" => "At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias exceptur.",
                "primary_audience" => "1st Year SOCIT Students",
                "num_primary_audience" => 200,
                "secondary_audience" => "2nd Year SOCIT Students",
                "num_secondary_audience" => 100,
                "form_id" =>1,
            ],
            
        ];

        $form = [
            [
                "prep_by" => 5,
                "organization_id" => 1,
                "control_number" => 284108,
                "organization_user_adviser_id" => 5,
                "sao_staff_id" => 2,
                "acadserv_staff_id" => 4,
                "finance_staff_id" => 3,
                "event_id" => 1,
                "form_type" => "APF",
                "event_title" => "Git Fundamentals 2022",
                "target_date" => "2022-10-26",
                

            ],

        ];




     

        foreach($form as $i){
            Form::create($i);
        }
        foreach($proposal as $i){
            Proposal::create($i);
        }

        
    }
}