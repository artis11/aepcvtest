<?php

namespace App\Http\Controllers;

use DB;

class StatisticController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $posts = DB::table("posts")
            ->select(DB::raw("strftime(\"%m-%Y\", created_at) as 'month', (COUNT(*)) as count"))
            ->orderBy('created_at')
            ->groupBy(DB::raw("strftime(\"%m-%Y\", created_at);"))
            ->get()
            ->toArray();

        $comments = DB::table("comments")
            ->select(DB::raw("strftime(\"%m-%Y\", created_at) as 'month', (COUNT(*)) as count"))
            ->orderBy('created_at')
            ->groupBy(DB::raw("strftime(\"%m-%Y\", created_at);"))
            ->get()
            ->toArray();

        $mergedData = array_merge_recursive($this->formatArray($posts), $this->formatArray($comments));
        return $mergedData;
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('statistic.index');
    }

    private function formatArray(array $data)
    {
        return array_reduce($data, function ($result, $item) {
            $result[$item->month] = $item->count;
            return $result;
        }, array());
    }
}
