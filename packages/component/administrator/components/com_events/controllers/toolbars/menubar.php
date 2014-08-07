<?php
/**
 * Com
 *
 * @author      Dave Li <dave@moyoweb.nl>
 * @category    Nooku
 * @package     Socialhub
 * @subpackage  ...
 * @uses        Com_
 */

defined('KOOWA') or die('Protected resource');

class ComEventsControllerToolbarMenubar extends ComDefaultControllerToolbarMenubar
{
    public function getCommands()
    {
        $name = $this->getController()->getIdentifier()->name;

        $this->addCommand('Events' , array(
            'href'   => JRoute::_('index.php?option=com_events&view=events'),
            'active' => ($name == 'event')
        ));

        $this->addCommand('Venues' , array(
            'href'   => JRoute::_('index.php?option=com_events&view=venues'),
            'active' => ($name == 'venue')
        ));

        $this->addCommand('Blocks' , array(
            'href'   => JRoute::_('index.php?option=com_events&view=blocks'),
            'active' => ($name == 'block')
        ));

        $this->addCommand('Days' , array(
            'href'   => JRoute::_('index.php?option=com_events&view=days'),
            'active' => ($name == 'day')
        ));

        $this->addCommand('Organisations' , array(
            'href'   => JRoute::_('index.php?option=com_events&view=organisations'),
            'active' => ($name == 'organisation')
        ));

        $this->addCommand('Rooms' , array(
            'href'   => JRoute::_('index.php?option=com_events&view=rooms'),
            'active' => ($name == 'room')
        ));

        return parent::getCommands();
    }
}