<?php

/**
 * This file is part of the official PHPCore plugin - Buttons
 * 
 * Made by InfinCZ 
 * @link https://github.com/Infin48
 *
 * @copyright (c) PHPCore Limited https://phpcore.cz
 * @license GNU General Public License, version 3 (GPL-3.0)
 */

namespace Plugin\Discord\Page;

/**
 * Index
 */
class Index extends \App\Page\Page
{
    /**
     * Body of this page
     *
     * @return void
     */
    public function body( \App\Model\Data $data, \App\Model\Database\Query $db )
    {
        // Sidebar
        $sidebar = new \App\Visualization\Sidebar\Sidebar($data->sidebar);
        $sidebar->append('Plugin/Discord/Sidebar:/Formats/Basic.json');
        $data->sidebar = $sidebar->getDataToGenerate();
    }
}