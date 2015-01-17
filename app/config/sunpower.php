<?php
/**
 * Created by PhpStorm.
 * User: heilju
 * Date: 07.01.15
 * Time: 18:46
 */
return array(

    // application base url
    'baseUrl' => 'http://d-sunpower.meema.lan',

    // PV Inverter URL
    'pvInverterUrl' => 'http://pv.meema.lan',

    // Inverter UI User
    'pvInverterUser' => 'pvserver',

    // Inverter UI Pwd
    'pvInverterPwd' => 'eTcJ0708=',

    // User-Agent for scripted data creation
    'scriptingUserAgent' => 'Meema/1.0',

    /* Max Values
    | alltime, day, week, month, year
    |
    |
    |
    */
    'maxValues' => array(
        'acOutputPowerTotal' => array('alltime', 'day', 'week', 'month', 'year'),
        'acOutputEnergyDaily' => array('alltime', 'week', 'month', 'year'),
    ),

    // xPath configuration for scraping the values from PV inverters UI
    'xPathNodes' => array(

        // XPath ac output power total
        'acOutputPowerTotal' => array('xPath' => 'html/body/form/font/table[2]/tr[4]/td[3]'),

        // XPath ac output energy daily
        'acOutputEnergyDaily' => array('xPath' => 'html/body/form/font/table[2]/tr[6]/td[6]'),

        // XPath ac output energy total
        'acOutputEnergyTotal' => array('xPath' => 'html/body/form/font/table[2]/tr[4]/td[6]'),

        // XPath PV state
        'pvState' => array('xPath' => 'html/body/form/font/table[2]/tr[8]/td[3]'),

        // XPath AC Output L1
        'acOutputVoltageL1' => array('xPath' => 'html/body/form/font/table[2]/tr[14]/td[6]'),
        'acOutputPowerL1' => array('xPath' => 'html/body/form/font/table[2]/tr[16]/td[6]'),

        // XPath AC Output L2
        'acOutputVoltageL2' => array('xPath' => 'html/body/form/font/table[2]/tr[19]/td[6]'),
        'acOutputPowerL2' => array('xPath' => 'html/body/form/font/table[2]/tr[21]/td[6]'),

        // XPath AC Output L3
        'acOutputVoltageL3' => array('xPath' => 'html/body/form/font/table[2]/tr[24]/td[6]'),
        'acOutputPowerL3' => array('xPath' => 'html/body/form/font/table[2]/tr[26]/td[6]'),

        // XPath DC Input Voltage String 1
        'dcInputVoltageS1' => array('xPath' => 'html/body/form/font/table[2]/tr[14]/td[3]'),
        'dcInputCurrentS1' => array('xPath' => 'html/body/form/font/table[2]/tr[16]/td[3]'),

        // XPath DC Input Voltage String 2
        'dcInputVoltageS2' => array('xPath' => 'html/body/form/font/table[2]/tr[19]/td[3]'),
        'dcInputCurrentS2' => array('xPath' => 'html/body/form/font/table[2]/tr[21]/td[3]'),

        // XPath DC Input Voltage String 3
        'dcInputVoltageS3' => array('xPath' => 'html/body/form/font/table[2]/tr[24]/td[3]'),
        'dcInputCurrentS3' => array('xPath' => 'html/body/form/font/table[2]/tr[26]/td[3]'),

    ),
);