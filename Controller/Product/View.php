<?php

/**
 * @Author: Ngo Quang Cuong
 * @Date:   2017-06-26 20:44:47
 * @Last Modified by:   nquangcuong
 * @Last Modified time: 2017-06-26 21:13:48
 * @website: http://giaphugroup.com
 */

namespace PHPCuong\Product\Controller\Product;

class View extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory    = $resultPageFactory;
        return parent::__construct($context);
    }

    /**
     * View action
     *
     * @return \Magento\Framework\View\Result\PageFactory
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        // it helps to render the layout
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }
}
