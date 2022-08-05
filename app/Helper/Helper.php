<?php
namespace App\Helper;

class Helper
{
    /*
     * Convert sidebar links csv (comma-separated values) into a key value array.
     * $linksArr = ['$linksHref' => '$linksCsv'];
     */
    public static function convertSidebarLinks($linksCsv, $linksHref)
    {
        $linksArr = array_flip($linksHref);

        for ($i = 0; $i < count($linksCsv); $i++) {
            $hrefKey = $linksHref[$i];
            $linksArr[$hrefKey] = $linksCsv[$i];
        }

        return $linksArr;
    }

    public static function links($linksType)
    {
        $linksCsvVar = $linksType . "LinksCsv";
        $linksHrefVar = $linksType . "LinksHref";
        
        $linksCsv = explode(",", config("shared_vars.$linksCsvVar"));
        $linksHref = config("shared_vars.$linksHrefVar");

        return Helper::convertSidebarLinks($linksCsv, $linksHref);
    }
}
