<?php
/**
 * Creates the output for our custom route at /json.
 *
 * @category MyRoutes
 * @package  Robert
 * @author   Robert Povelones <robert@rpdesignlab.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     http://rpdesignlab.com
 */

namespace Robert\MyModule\Controller\Json;

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
     * Context
     *
     * @var Class
     */
    protected $context;

    /**
     * Json Encoder utility
     *
     * @var Class
     */
    protected $jsonEncoder;

    /**
     * Initialize.
     *
     * @param \Magento\Framework\App\Action\Context    $context comment
     * @param \Magento\Framework\Json\EncoderInterface $encoder comment
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Json\EncoderInterface $encoder
    ) {
        $this->context = $context;
        $this->jsonEncoder = $encoder;
        parent::__construct($context);
    }

    /**
     * Execute.
     *
     * @return null
     */
    public function execute()
    {
        $name = isset($_GET['name']) ? htmlentities(ucfirst($_GET['name'])) : 'Your Name Here';

        $response = [
            'name' => $name
        ];

        if (isset($_GET['name']) && $_GET['name'] === 'robert') {
            $response['bio'] = [
                'dob' => 'October 1, 1983',
                'company' => 'Rivers Agency',
                'position' => 'Web Developer'
            ];
        }

        $json = $this->jsonEncoder->encode($response);
        $this->getResponse()->representJson($json);
        return;
    }
}