<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\HasilIdentifikasi;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin;

class DashboardController extends Controller
{
    public function index(){
        $user = User::find(Auth::user()->id);
        $history = HasilIdentifikasi::orderBy('tanggal', 'DESC')->get();
        $harian = HasilIdentifikasi::where('tanggal', Carbon::now()->format('Y-m-d'))->count();
        $bulanan = HasilIdentifikasi::whereDate('created_at','>', Carbon::now()->subMonth())->count();
        $all = HasilIdentifikasi::all()->count();

        $data = HasilIdentifikasi::select(DB::raw('hasil'), DB::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"),  DB::raw('YEAR(created_at) year, MONTH(created_at) month'))->get();
        $dominance = array_fill(0, 12, NULL);
        $dominanceCompliance = array_fill(0, 12, NULL);
        $dominanceInfluence = array_fill(0, 12, NULL);
        $influence = array_fill(0, 12, NULL);
        $influenceDominance = array_fill(0, 12, NULL);
        $influenceSteadiness = array_fill(0, 12, NULL);
        $steadiness = array_fill(0, 12, NULL);
        $steadinessInfluence = array_fill(0, 12, NULL);
        $steadinessCompliance = array_fill(0, 12, NULL);
        $compliance = array_fill(0, 12, NULL);
        $complianceDominance = array_fill(0, 12, NULL);
        $complianceSteadiness = array_fill(0, 12, NULL);
        foreach($data as $item){
            if($item->month == 1 && $item->hasil == 'Dominance'){
                $dominance[0] = $dominance[0]+1;
            }if($item->month == 2 && $item->hasil == 'Dominance'){
                $dominance[1] = $dominance[1]+1;
            }if($item->month == 3 && $item->hasil == 'Dominance'){
                $dominance[2] = $dominance[2]+1;
            }if($item->month == 4 && $item->hasil == 'Dominance'){
                $dominance[3] = $dominance[3]+1;
            }if($item->month == 5 && $item->hasil == 'Dominance'){
                $dominance[4] = $dominance[4]+1;
            }if($item->month == 6 && $item->hasil == 'Dominance'){
                $dominance[5] = $dominance[5]+1;
            }if($item->month == 7 && $item->hasil == 'Dominance'){
                $dominance[6] = $dominance[6]+1;
            }if($item->month == 8 && $item->hasil == 'Dominance'){
                $dominance[7] = $dominance[7]+1;
            }if($item->month == 9 && $item->hasil == 'Dominance'){
                $dominance[8] = $dominance[8]+1;
            }if($item->month == 10 && $item->hasil == 'Dominance'){
                $dominance[9] = $dominance[9]+1;
            }if($item->month == 11 && $item->hasil == 'Dominance'){
                $dominance[10] = $dominance[10]+1;
            }if($item->month == 12 && $item->hasil == 'Dominance'){
                $dominance[11] = $dominance[11]+1;
            }

            if($item->month == 1 && $item->hasil == 'Dominance and Compliance'){
                $dominanceCompliance[0] = $dominanceCompliance[0]+1;
            }if($item->month == 2 && $item->hasil == 'Dominance and Compliance'){
                $dominanceCompliance[1] = $dominanceCompliance[1]+1;
            }if($item->month == 3 && $item->hasil == 'Dominance and Compliance'){
                $dominanceCompliance[2] = $dominanceCompliance[2]+1;
            }if($item->month == 4 && $item->hasil == 'Dominance and Compliance'){
                $dominanceCompliance[3] = $dominanceCompliance[3]+1;
            }if($item->month == 5 && $item->hasil == 'Dominance and Compliance'){
                $dominanceCompliance[4] = $dominanceCompliance[4]+1;
            }if($item->month == 6 && $item->hasil == 'Dominance and Compliance'){
                $dominanceCompliance[5] = $dominanceCompliance[5]+1;
            }if($item->month == 7 && $item->hasil == 'Dominance and Compliance'){
                $dominanceCompliance[6] = $dominanceCompliance[6]+1;
            }if($item->month == 8 && $item->hasil == 'Dominance and Compliance'){
                $dominanceCompliance[7] = $dominanceCompliance[7]+1;
            }if($item->month == 9 && $item->hasil == 'Dominance and Compliance'){
                $dominanceCompliance[8] = $dominanceCompliance[8]+1;
            }if($item->month == 10 && $item->hasil == 'Dominance and Compliance'){
                $dominanceCompliance[9] = $dominanceCompliance[9]+1;
            }if($item->month == 11 && $item->hasil == 'Dominance and Compliance'){
                $dominanceCompliance[10] = $dominanceCompliance[10]+1;
            }if($item->month == 12 && $item->hasil == 'Dominance and Compliance'){
                $dominanceCompliance[11] = $dominanceCompliance[11]+1;
            }

            if($item->month == 1 && $item->hasil == 'Dominance and Influence'){
                $dominanceInfluence[0] = $dominanceInfluence[0]+1;
            }if($item->month == 2 && $item->hasil == 'Dominance and Influence'){
                $dominanceInfluence[1] = $dominanceInfluence[1]+1;
            }if($item->month == 3 && $item->hasil == 'Dominance and Influence'){
                $dominanceInfluence[2] = $dominanceInfluence[2]+1;
            }if($item->month == 4 && $item->hasil == 'Dominance and Influence'){
                $dominanceInfluence[3] = $dominanceInfluence[3]+1;
            }if($item->month == 5 && $item->hasil == 'Dominance and Influence'){
                $dominanceInfluence[4] = $dominanceInfluence[4]+1;
            }if($item->month == 6 && $item->hasil == 'Dominance and Influence'){
                $dominanceInfluence[5] = $dominanceInfluence[5]+1;
            }if($item->month == 7 && $item->hasil == 'Dominance and Influence'){
                $dominanceInfluence[6] = $dominanceInfluence[6]+1;
            }if($item->month == 8 && $item->hasil == 'Dominance and Influence'){
                $dominanceInfluence[7] = $dominanceInfluence[7]+1;
            }if($item->month == 9 && $item->hasil == 'Dominance and Influence'){
                $dominanceInfluence[8] = $dominanceInfluence[8]+1;
            }if($item->month == 10 && $item->hasil == 'Dominance and Influence'){
                $dominanceInfluence[9] = $dominanceInfluence[9]+1;
            }if($item->month == 11 && $item->hasil == 'Dominance and Influence'){
                $dominanceInfluence[10] = $dominanceInfluence[10]+1;
            }if($item->month == 12 && $item->hasil == 'Dominance and Influence'){
                $dominanceInfluence[11] = $dominanceInfluence[11]+1;
            }

            if($item->month == 1 && $item->hasil == 'Influence'){
                $influence[0] = $influence[0]+1;
            }if($item->month == 2 && $item->hasil == 'Influence'){
                $influence[1] = $influence[1]+1;
            }if($item->month == 3 && $item->hasil == 'Influence'){
                $influence[2] = $influence[2]+1;
            }if($item->month == 4 && $item->hasil == 'Influence'){
                $influence[3] = $influence[3]+1;
            }if($item->month == 5 && $item->hasil == 'Influence'){
                $influence[4] = $influence[4]+1;
            }if($item->month == 6 && $item->hasil == 'Influence'){
                $influence[5] = $influence[5]+1;
            }if($item->month == 7 && $item->hasil == 'Influence'){
                $influence[6] = $influence[6]+1;
            }if($item->month == 8 && $item->hasil == 'Influence'){
                $influence[7] = $influence[7]+1;
            }if($item->month == 9 && $item->hasil == 'Influence'){
                $influence[8] = $influence[8]+1;
            }if($item->month == 10 && $item->hasil == 'Influence'){
                $influence[9] = $influence[9]+1;
            }if($item->month == 11 && $item->hasil == 'Influence'){
                $influence[10] = $influence[10]+1;
            }if($item->month == 12 && $item->hasil == 'Influence'){
                $influence[11] = $influence[11]+1;
            }

            if($item->month == 1 && $item->hasil == 'Influence and Dominance'){
                $influenceDominance[0] = $influenceDominance[0]+1;
            }if($item->month == 2 && $item->hasil == 'Influence and Dominance'){
                $influenceDominance[1] = $influenceDominance[1]+1;
            }if($item->month == 3 && $item->hasil == 'Influence and Dominance'){
                $influenceDominance[2] = $influenceDominance[2]+1;
            }if($item->month == 4 && $item->hasil == 'Influence and Dominance'){
                $influenceDominance[3] = $influenceDominance[3]+1;
            }if($item->month == 5 && $item->hasil == 'Influence and Dominance'){
                $influenceDominance[4] = $influenceDominance[4]+1;
            }if($item->month == 6 && $item->hasil == 'Influence and Dominance'){
                $influenceDominance[5] = $influenceDominance[5]+1;
            }if($item->month == 7 && $item->hasil == 'Influence and Dominance'){
                $influenceDominance[6] = $influenceDominance[6]+1;
            }if($item->month == 8 && $item->hasil == 'Influence and Dominance'){
                $influenceDominance[7] = $influenceDominance[7]+1;
            }if($item->month == 9 && $item->hasil == 'Influence and Dominance'){
                $influenceDominance[8] = $influenceDominance[8]+1;
            }if($item->month == 10 && $item->hasil == 'Influence and Dominance'){
                $influenceDominance[9] = $influenceDominance[9]+1;
            }if($item->month == 11 && $item->hasil == 'Influence and Dominance'){
                $influenceDominance[10] = $influenceDominance[10]+1;
            }if($item->month == 12 && $item->hasil == 'Influence and Dominance'){
                $influenceDominance[11] = $influenceDominance[11]+1;
            }

            if($item->month == 1 && $item->hasil == 'Influence and Steadiness'){
                $influinfluenceSteadinessence[0] = $influenceSteadiness[0]+1;
            }if($item->month == 2 && $item->hasil == 'Influence and Steadiness'){
                $influenceSteadiness[1] = $influenceSteadiness[1]+1;
            }if($item->month == 3 && $item->hasil == 'Influence and Steadiness'){
                $influenceSteadiness[2] = $influenceSteadiness[2]+1;
            }if($item->month == 4 && $item->hasil == 'Influence and Steadiness'){
                $influenceSteadiness[3] = $influenceSteadiness[3]+1;
            }if($item->month == 5 && $item->hasil == 'Influence and Steadiness'){
                $influenceSteadiness[4] = $influenceSteadiness[4]+1;
            }if($item->month == 6 && $item->hasil == 'Influence and Steadiness'){
                $influenceSteadiness[5] = $influenceSteadiness[5]+1;
            }if($item->month == 7 && $item->hasil == 'Influence and Steadiness'){
                $influenceSteadiness[6] = $influenceSteadiness[6]+1;
            }if($item->month == 8 && $item->hasil == 'Influence and Steadiness'){
                $influenceSteadiness[7] = $influenceSteadiness[7]+1;
            }if($item->month == 9 && $item->hasil == 'Influence and Steadiness'){
                $influenceSteadiness[8] = $influenceSteadiness[8]+1;
            }if($item->month == 10 && $item->hasil == 'Influence and Steadiness'){
                $influenceSteadiness[9] = $influenceSteadiness[9]+1;
            }if($item->month == 11 && $item->hasil == 'Influence and Steadiness'){
                $influenceSteadiness[10] = $influenceSteadiness[10]+1;
            }if($item->month == 12 && $item->hasil == 'Influence and Steadiness'){
                $influenceSteadiness[11] = $influenceSteadiness[11]+1;
            }

            if($item->month == 1 && $item->hasil == 'Steadiness'){
                $steadiness[0] = $steadiness[0]+1;
            }if($item->month == 2 && $item->hasil == 'Steadiness'){
                $steadiness[1] = $steadiness[1]+1;
            }if($item->month == 3 && $item->hasil == 'Steadiness'){
                $steadiness[2] = $steadiness[2]+1;
            }if($item->month == 4 && $item->hasil == 'Steadiness'){
                $steadiness[3] = $steadiness[3]+1;
            }if($item->month == 5 && $item->hasil == 'Steadiness'){
                $steadiness[4] = $steadiness[4]+1;
            }if($item->month == 6 && $item->hasil == 'Steadiness'){
                $steadiness[5] = $steadiness[5]+1;
            }if($item->month == 7 && $item->hasil == 'Steadiness'){
                $steadiness[6] = $steadiness[6]+1;
            }if($item->month == 8 && $item->hasil == 'Steadiness'){
                $steadiness[7] = $steadiness[7]+1;
            }if($item->month == 9 && $item->hasil == 'Steadiness'){
                $steadiness[8] = $steadiness[8]+1;
            }if($item->month == 10 && $item->hasil == 'Steadiness'){
                $steadiness[9] = $steadiness[9]+1;
            }if($item->month == 11 && $item->hasil == 'Steadiness'){
                $steadiness[10] = $steadiness[10]+1;
            }if($item->month == 12 && $item->hasil == 'Steadiness'){
                $steadiness[11] = $steadiness[11]+1;
            }

            if($item->month == 1 && $item->hasil == 'Steadiness and Influence'){
                $steadinessInfluence[0] = $steadinessInfluence[0]+1;
            }if($item->month == 2 && $item->hasil == 'Steadiness and Influence'){
                $steadinessInfluence[1] = $steadinessInfluence[1]+1;
            }if($item->month == 3 && $item->hasil == 'Steadiness and Influence'){
                $steadinessInfluence[2] = $steadinessInfluence[2]+1;
            }if($item->month == 4 && $item->hasil == 'Steadiness and Influence'){
                $steadinessInfluence[3] = $steadinessInfluence[3]+1;
            }if($item->month == 5 && $item->hasil == 'Steadiness and Influence'){
                $steadinessInfluence[4] = $steadinessInfluence[4]+1;
            }if($item->month == 6 && $item->hasil == 'Steadiness and Influence'){
                $steadinessInfluence[5] = $steadinessInfluence[5]+1;
            }if($item->month == 7 && $item->hasil == 'Steadiness and Influence'){
                $steadinessInfluence[6] = $steadinessInfluence[6]+1;
            }if($item->month == 8 && $item->hasil == 'Steadiness and Influence'){
                $steadinessInfluence[7] = $steadinessInfluence[7]+1;
            }if($item->month == 9 && $item->hasil == 'Steadiness and Influence'){
                $steadinessInfluence[8] = $steadinessInfluence[8]+1;
            }if($item->month == 10 && $item->hasil == 'Steadiness and Influence'){
                $steadinessInfluence[9] = $steadinessInfluence[9]+1;
            }if($item->month == 11 && $item->hasil == 'Steadiness and Influence'){
                $steadinessInfluence[10] = $steadinessInfluence[10]+1;
            }if($item->month == 12 && $item->hasil == 'Steadiness and Influence'){
                $steadinessInfluence[11] = $steadinessInfluence[11]+1;
            }

            if($item->month == 1 && $item->hasil == 'Steadiness and Compliance'){
                $steadinessCompliance[0] = $steadinessCompliance[0]+1;
            }if($item->month == 2 && $item->hasil == 'Steadiness and Compliance'){
                $steadinessCompliance[1] = $steadinessCompliance[1]+1;
            }if($item->month == 3 && $item->hasil == 'Steadiness and Compliance'){
                $steadinessCompliance[2] = $steadinessCompliance[2]+1;
            }if($item->month == 4 && $item->hasil == 'Steadiness and Compliance'){
                $steadinessCompliance[3] = $steadinessCompliance[3]+1;
            }if($item->month == 5 && $item->hasil == 'Steadiness and Compliance'){
                $steadinessCompliance[4] = $steadinessCompliance[4]+1;
            }if($item->month == 6 && $item->hasil == 'Steadiness and Compliance'){
                $steadinessCompliance[5] = $steadinessCompliance[5]+1;
            }if($item->month == 7 && $item->hasil == 'Steadiness and Compliance'){
                $steadinessCompliance[6] = $steadinessCompliance[6]+1;
            }if($item->month == 8 && $item->hasil == 'Steadiness and Compliance'){
                $steadinessCompliance[7] = $steadinessCompliance[7]+1;
            }if($item->month == 9 && $item->hasil == 'Steadiness and Compliance'){
                $steadinessCompliance[8] = $steadinessCompliance[8]+1;
            }if($item->month == 10 && $item->hasil == 'Steadiness and Compliance'){
                $steadinessCompliance[9] = $steadinessCompliance[9]+1;
            }if($item->month == 11 && $item->hasil == 'Steadiness and Compliance'){
                $steadinessCompliance[10] = $steadinessCompliance[10]+1;
            }if($item->month == 12 && $item->hasil == 'Steadiness and Compliance'){
                $steadinessCompliance[11] = $steadinessCompliance[11]+1;
            }

            if($item->month == 1 && $item->hasil == 'Compliance'){
                $compliance[0] = $compliance[0]+1;
            }if($item->month == 2 && $item->hasil == 'Compliance'){
                $compliance[1] = $compliance[1]+1;
            }if($item->month == 3 && $item->hasil == 'Compliance'){
                $compliance[2] = $compliance[2]+1;
            }if($item->month == 4 && $item->hasil == 'Compliance'){
                $compliance[3] = $compliance[3]+1;
            }if($item->month == 5 && $item->hasil == 'Compliance'){
                $compliance[4] = $compliance[4]+1;
            }if($item->month == 6 && $item->hasil == 'Compliance'){
                $compliance[5] = $compliance[5]+1;
            }if($item->month == 7 && $item->hasil == 'Compliance'){
                $compliance[6] = $compliance[6]+1;
            }if($item->month == 8 && $item->hasil == 'Compliance'){
                $compliance[7] = $compliance[7]+1;
            }if($item->month == 9 && $item->hasil == 'Compliance'){
                $compliance[8] = $compliance[8]+1;
            }if($item->month == 10 && $item->hasil == 'Compliance'){
                $compliance[9] = $compliance[9]+1;
            }if($item->month == 11 && $item->hasil == 'Compliance'){
                $compliance[10] = $compliance[10]+1;
            }if($item->month == 12 && $item->hasil == 'Compliance'){
                $compliance[11] = $compliance[11]+1;
            }

            if($item->month == 1 && $item->hasil == 'Compliance and Dominance'){
                $complianceDominance[0] = $complianceDominance[0]+1;
            }if($item->month == 2 && $item->hasil == 'Compliance and Dominance'){
                $complianceDominance[1] = $complianceDominance[1]+1;
            }if($item->month == 3 && $item->hasil == 'Compliance and Dominance'){
                $complianceDominance[2] = $complianceDominance[2]+1;
            }if($item->month == 4 && $item->hasil == 'Compliance and Dominance'){
                $complianceDominance[3] = $complianceDominance[3]+1;
            }if($item->month == 5 && $item->hasil == 'Compliance and Dominance'){
                $complianceDominance[4] = $complianceDominance[4]+1;
            }if($item->month == 6 && $item->hasil == 'Compliance and Dominance'){
                $complianceDominance[5] = $complianceDominance[5]+1;
            }if($item->month == 7 && $item->hasil == 'Compliance and Dominance'){
                $complianceDominance[6] = $complianceDominance[6]+1;
            }if($item->month == 8 && $item->hasil == 'Compliance and Dominance'){
                $complianceDominance[7] = $complianceDominance[7]+1;
            }if($item->month == 9 && $item->hasil == 'Compliance and Dominance'){
                $complianceDominance[8] = $complianceDominance[8]+1;
            }if($item->month == 10 && $item->hasil == 'Compliance and Dominance'){
                $complianceDominance[9] = $complianceDominance[9]+1;
            }if($item->month == 11 && $item->hasil == 'Compliance and Dominance'){
                $complianceDominance[10] = $complianceDominance[10]+1;
            }if($item->month == 12 && $item->hasil == 'Compliance and Dominance'){
                $complianceDominance[11] = $complianceDominance[11]+1;
            }

            if($item->month == 1 && $item->hasil == 'Compliance and Steadiness'){
                $complianceSteadiness[0] = $complianceSteadiness[0]+1;
            }if($item->month == 2 && $item->hasil == 'Compliance and Steadiness'){
                $complianceSteadiness[1] = $complianceSteadiness[1]+1;
            }if($item->month == 3 && $item->hasil == 'Compliance and Steadiness'){
                $complianceSteadiness[2] = $complianceSteadiness[2]+1;
            }if($item->month == 4 && $item->hasil == 'Compliance and Steadiness'){
                $complianceSteadiness[3] = $complianceSteadiness[3]+1;
            }if($item->month == 5 && $item->hasil == 'Compliance and Steadiness'){
                $complianceSteadiness[4] = $complianceSteadiness[4]+1;
            }if($item->month == 6 && $item->hasil == 'Compliance and Steadiness'){
                $complianceSteadiness[5] = $complianceSteadiness[5]+1;
            }if($item->month == 7 && $item->hasil == 'Compliance and Steadiness'){
                $complianceSteadiness[6] = $complianceSteadiness[6]+1;
            }if($item->month == 8 && $item->hasil == 'Compliance and Steadiness'){
                $complianceSteadiness[7] = $complianceSteadiness[7]+1;
            }if($item->month == 9 && $item->hasil == 'Compliance and Steadiness'){
                $complianceSteadiness[8] = $complianceSteadiness[8]+1;
            }if($item->month == 10 && $item->hasil == 'Compliance and Steadiness'){
                $complianceSteadiness[9] = $complianceSteadiness[9]+1;
            }if($item->month == 11 && $item->hasil == 'Compliance and Steadiness'){
                $complianceSteadiness[10] = $complianceSteadiness[10]+1;
            }if($item->month == 12 && $item->hasil == 'Compliance and Steadiness'){
                $complianceSteadiness[11] = $complianceSteadiness[11]+1;
            }
        }
        // dd($influence);
        return view('admin.dashboard',compact('history','user','data'))
                            ->with('harian', $harian)
                            ->with('bulanan', $bulanan)
                            ->with('all', $all)
                            ->with('dominance', $dominance)->with('dominanceCompliance', $dominanceCompliance)->with('dominanceInfluence', $dominanceInfluence)
                            ->with('influence', $influence)->with('influenceDominance', $influenceDominance)->with('influenceSteadiness', $influenceSteadiness)
                            ->with('steadiness', $steadiness)->with('steadinessCompliance', $steadinessCompliance)->with('steadinessInfluence', $steadinessInfluence)
                            ->with('compliance', $compliance)->with('complianceDominance', $complianceDominance)->with('complianceSteadiness', $complianceSteadiness);
    }

    public function profile($id){
        $user = User::where('id',Auth::user()->id)->first();
        $admin = Admin::where('user_id',$id)->first();
        
        return view('admin.profile_admin',compact('user','admin'));
    }
}
