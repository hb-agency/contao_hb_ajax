<?php

/**
 * Ajax handler for Contao Open Source CMS
 *
 * Copyright (c) 2014 HBAgency
 *
 * @package HBAjax
 * @link    http://www.hbagency.com
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

namespace HBAgency\Hooks\GetPageLayout;


/**
 * Add a Request Token to the Frontend for global use
 *
 * @copyright  HBAgency 2014
 * @author     Blair Winans <bwinans@hbagency.com>
 * @author     Adam Fisher <afisher@hbagency.com>
 * @package    HBAjax
 */
class FrontendVars extends \Frontend
{

    /**
     * Add the token
     */
    public function run($objPage, &$objLayout, $objPageRegular)
    {
        if(TL_MODE=='FE')
        {
            array_insert($GLOBALS['TL_HEAD'], 0, array(
                '<script>var HB = HB || {}; HB.request_token = "' . REQUEST_TOKEN . '"; HB.pageid = "' . $objPage->id . '"; HB.base = "'.\Environment::get('base').'"; HB.request = "'.\Environment::get('request').'"; HB.alias = "' . $objPage->alias . '";</script>'
            ));
        }
    }
}