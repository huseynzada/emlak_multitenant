<?php
/**
 * Created by PhpStorm.
 * User: Terlan-Pc
 * Date: 2/28/2018
 * Time: 11:57 PM
 */

namespace App\Library\DataFunctions;


use App\Library\MyClass;
use App\Library\MyHelper;
use App\Models\MskCity;

class Functions
{
    #region tapaz
    public static function tapazGetCity($tt, $where)
    {
        $cityName     = @$tt->findEr($where, [['.property', 0], ['.property-value', 0]])->plaintext;
        if($cityName == null) return null;

        $city = MskCity::where('pure_name', MyHelper::pureString($cityName))->first();
        return ['plaintext' => ( $city ? $city->id : 0 ) ];
    }

    public static function getMetroTapaz($tt, $where)
    {
        if( $tt->pageData['placeDom'] ){
            foreach (MyClass::$metros as $key => $metro)
                if(preg_match($metro[1], $tt->pageData['placeDom'])) return ['plaintext' => $key];
        }
        if( $tt->pageData['headerDom'] ){
            foreach (MyClass::$metros as $key => $metro)
                if(preg_match($metro[1], $tt->pageData['headerDom'])) return ['plaintext' => $key];
        }
        if( $tt->pageData['contentDom'] ){
            foreach (MyClass::$metros as $key => $metro)
                if(preg_match($metro[1], $tt->pageData['contentDom'])) return ['plaintext' => $key];
        }

        return ['plaintext' => null];
    }

    public static function getDistrictTapaz($tt, $where)
    {
        if( $tt->pageData['placeDom'] ){
            foreach (MyClass::$district as $key => $metro)
                if(preg_match($metro[1], $tt->pageData['placeDom'])) return ['plaintext' => $key];
        }
        if( $tt->pageData['headerDom'] ){
            foreach (MyClass::$district as $key => $metro)
                if(preg_match($metro[1], $tt->pageData['headerDom'])) return ['plaintext' => $key];
        }
        if( $tt->pageData['contentDom'] ){
            foreach (MyClass::$district as $key => $metro)
                if(preg_match($metro[1], $tt->pageData['contentDom'])) return ['plaintext' => $key];
        }

        return ['plaintext' => null];
    }

    public static function getFloorCountTapaz($tt, $where, $data)
    {
        $floors     = @$tt->findEr($where, $data)->plaintext;
        if($floors == null) ['plaintext' => null];

        if(preg_match('/((\d+)[ -]{0,}m[əe]rt[əe]b[əe](li|nin))|((\d+)[-\w ]{0,}(том)?[ ]{0,}этаже)/iu', $floors, $matches))
            return ['plaintext' => (int)$matches[0]];

        if(preg_match('/(\d+)[ ]{0,}[\/-][ ]{0,}(\d+)/iu', $floors, $matches))
            return ['plaintext' => (int)max($matches[1],$matches[2]) ];

        return ['plaintext' => null];
    }

    public static function getlocatedFloorTapaz($tt, $where, $data)
    {
        $floors     = @$tt->findEr($where, $data)->plaintext;
        if($floors == null) ['plaintext' => null];

        if(preg_match('/((\d+)[cuüıi.\- ]+m[əe]rt[əe]b[əe]si)|((\d+)[-\w ](ти)? этажного)/iu', $floors, $matches))
            return ['plaintext' => (int)$matches[0]];

        if(preg_match('/(\d+)[ ]{0,}[\/-][ ]{0,}(\d+)/iu', $floors, $matches))
            return ['plaintext' => (int)min($matches[1],$matches[2]) ];

        return ['plaintext' => null];
    }
    #endregion

    #region vipemlak
    public static function vipemlakGetCity($tt, $where)
    {
        $city = MskCity::where('pure_name', MyHelper::pureString('baki'))->first();
        return ['plaintext' => ( $city ? $city->id : 0 ) ];
    }
    #endregion

    #region binaaz

    #endregion
}