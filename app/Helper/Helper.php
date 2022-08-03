<?php
namespace App\Helper;

class Helper
{
    /*
     * Convert sidebar links comma-separated values into key value array.
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
        if ($linksType === "monitor") {
            $linksCsv = explode(",", config("shared_vars.monitorLinksCsv"));
            $linksHref = config("shared_vars.monitorLinksHref");
        } else {
            $linksCsv = explode(",", config("shared_vars.taskLinksCsv"));
            $linksHref = config("shared_vars.taskLinksHref");
        }

        return Helper::convertSidebarLinks($linksCsv, $linksHref);
    }
}
