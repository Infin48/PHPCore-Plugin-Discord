<?php

/**
 * This file is part of the official PHPCore plugin - Discord
 * 
 * Made by InfinCZ 
 * @link https://github.com/Infin48
 *
 * @copyright (c) PHPCore Limited https://phpcore.cz
 * @license GNU General Public License, version 3 (GPL-3.0)
 */

namespace Plugin\Discord\Page\Admin;

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
        // Plugin
        $plugin = $data->get('inst.plugin');

        // Form
        $form = new \App\Visualization\Form\Form($data->form);
        $form
            ->append('Plugin/Discord/Form:/Formats/Setup.json')
            ->form('discord')
                ->callOnSuccess($this, 'discordEditSettings')
                ->data($plugin->get('Discord.settings'));
        $data->form = $form->getDataToGenerate();
    }

    /**
     * Form was successfully submitted
     * 
     * @param \App\Model\Data $data Loaded page data
     * @param \App\Model\Database\Query  $db Database query compiler
     * @param \App\Model\Post $post Post data
     *
     * @return void
     */
    public function discordEditSettings( \App\Model\Data $data, \App\Model\Database\Query $db, \App\Model\Post $post )
    {
        // Plugin
        $plugin = $data->get('inst.plugin');

        $db->update(TABLE_PLUGINS, [
            'plugin_settings' => json_encode(['server_id' => $post->get('server_id') ?: 808093312565117018, 'height' => $post->get('height') ?: 400])
        ], $plugin->get('Discord.id'));

        // Show success message
        $data->set('data.message.success', __FUNCTION__);
    }
}