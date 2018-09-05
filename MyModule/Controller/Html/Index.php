<?php
/**
 * Creates the output for our custom route at /html.
 *
 * @category MyRoutes
 * @package  Robert
 * @author   Robert Povelones <robert@rpdesignlab.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     http://rpdesignlab.com
 */

namespace Robert\MyModule\Controller\Html;

/**
 * Extends the default Magento Action class.
 *
 * @category MyActions
 * @package  Robert
 * @author   Robert Povelones <robert@rpdesignlab.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     http://rpdesignlab.com
 */
class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * Execute function
     *
     * @return void
     */
    public function execute()
    {
        $name = isset($_GET['name']) ? htmlentities(ucfirst($_GET['name'])) : 'World';
        die("Hello {$name}!");
    }
}