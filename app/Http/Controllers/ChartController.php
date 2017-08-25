<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;

class ChartController extends Controller
{
    public function anchorText()
    {
        // “Anchor Text” grouped by values converted to lowercase (word / tag cloud chart)
        return Link::groupBy('anchor_text')
            ->select(\DB::raw('LOWER(anchor_text) AS value'), \DB::raw('count(*) as count'))
            ->get();
    }

    public function linkStatus()
    {
        // “Link Status” (pie or donut chart)
        return Link::groupBy('link_status')
            ->select('link_status AS label', \DB::raw('count(*) as value'))
            ->get();
    }

    public function fromUrl()
    {
        // “From URL” grouped by host (pie or donut chart)
        $from_url_all = Link::groupBy('from_url')
            ->select('from_url', \DB::raw('count(*) as count'))
            ->get();

        // parse host and count together
        $hosts = [];
        foreach ($from_url_all as $value) {
            $host = parse_url($value->from_url, PHP_URL_HOST);
            if (isset($hosts[$host])) {
                $hosts[$host] += $value->count;
            } else {
                $hosts[$host] = $value->count;
            }
        };

        // data array for chart
        $from_url = [];
        foreach ($hosts as $label => $value) {
            $from_url[] = [
                'label' => $label,
                'value' => $value
            ];
        }
        return $from_url;
    }

    public function bldom()
    {
        // “BLdom” grouped by defined classes [0|1 - 10|11 - 100|\< 1,000|\< 10,000|\< 100,000|\> 100,000] (bar chart)
        $groups = [
            '0' => ['less_than' => 1],
            '1 - 10' => ['greater_than' => 0, 'less_than' => 10],
            '11 - 100' => ['greater_than' => 10, 'less_than' => 100],
            '\< 1,000' => ['greater_than' => 100, 'less_than' => 1000],
            '\< 10,000' => ['greater_than' => 1000, 'less_than' => 10000],
            '\< 100,000' => ['greater_than' => 10000, 'less_than' => 100000],
            '\> 100,000' => ['greater_than' => 100000]
        ];

        $labels = [];
        $values = [];
        foreach ($groups as $group => $conditions) {
            $labels[] = $group;
            $query = Link::select(\DB::raw('count(*) as count'));

            if (isset($conditions['less_than'])) {
                $query->where('bldom', '<', $conditions['less_than']);
            }

            if (isset($conditions['greater_than'])) {
                $query->where('bldom', '>', $conditions['greater_than']);
            }

            $result = $query->first();
            if ($result) {
                $values[] = $result->count;
            }
        }

        $bldom = [
            'labels' => $labels,
            'datasets' => [
                [
                    'data' => $values
                ],
            ]
        ];

        return $bldom;
    }
}
