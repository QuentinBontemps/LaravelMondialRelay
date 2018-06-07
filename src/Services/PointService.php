<?php namespace QuentinBontemps\LaravelMondialRelay\Services;


use MondialRelay\BussinessHours\BussinessHours;
use MondialRelay\Point\Point;

class PointService
{

    /**
     * @param BussinessHours $hours
     * @return string
     */
    public function displayBusinessHours(BussinessHours $hours)
    {
        $close = true;
        $return = [];

        if ($hours->openingTime1())
        {
            $close = false;
            $return[] = date_format(date_create_from_format('Hi', $hours->openingTime1()), 'H:i');
        }
        if ($hours->closingTime1())
        {
            $close = false;
            $return[] = date_format(date_create_from_format('Hi', $hours->closingTime1()), 'H:i');
        }
        if ($hours->openingTime2())
        {
            $close = false;
            $return[] = date_format(date_create_from_format('Hi', $hours->openingTime2()), 'H:i');
        }
        if ($hours->closingTime2())
        {
            $close = false;
            $return[] = date_format(date_create_from_format('Hi', $hours->closingTime2()), 'H:i');
        }

        if ($close)
        {
            $return = trans('laravel-mondialrelay::point.labels.closed');
        } else
        {
            $return = implode(' / ', $return);
        }

        return $return;
    }

    /**
     * @param BussinessHours $hours
     * @return string
     */
    public function displayDay(BussinessHours $hours)
    {
        return trans('laravel-mondialrelay::point.days.' . $hours->day());
    }

    /**
     * @param Point $point
     * @return string
     */
    public function displayDistance(Point $point)
    {
        return $point->distance() / 1000 . ' km';
    }
}