<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function inspectionReport(Request $request)
    {
        $result = [];

        for ($i = 1; $i <= 100; $i++) {
            //any integer that is a multiple of both 3 and 5 will be a multiple of 15
            if ($i % 15 == 0) {
                $result[] = 'Coating Damage and Lightning Strike';
                continue;
            } elseif ($i % 3 == 0) {
                $result[] = 'Coating Damage';
                continue;
            } elseif ($i % 5 == 0) {
                $result[] = 'Lightning Strike';
                continue;
            }

            $result[] = $i;
        }

        return $result;
    }

    public function inspectionReportV2(Request $request)
    {
        $result = [];

        for ($i = 1; $i <= 100; $i++) {
            //any integer that is a multiple of both 3 and 5 will be a multiple of 15
            $result[$i - 1]['id'] = $i;
            if ($i % 15 == 0) {
                $result[$i - 1]['value'] = 'Coating Damage and Lightning Strike';
                continue;
            } elseif ($i % 3 == 0) {
                $result[$i - 1]['value'] = 'Coating Damage';
                continue;
            } elseif ($i % 5 == 0) {
                $result[$i - 1]['value'] = 'Lightning Strike';
                continue;
            }

            $result[$i - 1]['value'] = $i;
        }

        return $result;
    }
}
