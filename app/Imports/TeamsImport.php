<?php

namespace App\Imports;

use App\Models\Team;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TeamsImport implements ToCollection , WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $team          = null;
        $students = [];

        foreach($collection as $item){
            try{
                if($item['alrkm'] != null){
                    $team = Team::create([
                        'uuid' => time() . $item['alrkm'],
                        'team_eID' => $item['alrkm'],
                        'team_category' => $item['alfy'],
                        'team_administration' => $item['aladar_altaalymy'],
                        'team_name' => $item['asm_alfryk'],
                        'school_name' => $item['asm_almdrs'],
                        'coach_name' => $item['asm_almdrb'],
                        'coach_phone' => $item['rkm_almdrb'],
                        'coach_eID' => $item['hoy_almdrb']
                    ]);
                }

                if($team->students == null){
                    $team->students = json_encode([
                        'label'  => $item['alnoaa'],
                        'name'   => $item['alasm'],
                        'eID'    => $item['rkm_alhoy'],
                        'phone'  => $item['rkm_altalb']
                    ]);
                }else{
                    $temp_students = json_decode($team->students);
                    $temp_students = array_merge(collect($temp_students)->toArray() , [
                        'label'  => $item['alnoaa'],
                        'name'   => $item['alasm'],
                        'eID'    => $item['rkm_alhoy'],
                        'phone'  => $item['rkm_altalb']
                    ]);
                    info($temp_students);
                    $team_students = json_encode($temp_students);
                }

                $team->save();

            }catch(\Exception $e){
                info('Error' . $e->getMessage() , ['students' => $students]);
            }
        }
    }
}
