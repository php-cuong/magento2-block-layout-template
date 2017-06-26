<?php

/**
 * @Author: Ngo Quang Cuong
 * @Date:   2017-06-26 20:47:38
 * @Last Modified by:   nquangcuong
 * @Last Modified time: 2017-06-26 21:11:11
 * @website: http://giaphugroup.com
 */

namespace PHPCuong\Product\Block\Product;

use Magento\Framework\View\Element\Template\Context;

class ProductList extends \Magento\Framework\View\Element\Template
{
    /**
     *
     * @var \Magento\Catalog\Model\Product
     */
    protected $product;

    /**
     *
     * @var \Magento\Catalog\Model\ProductFactory
     */
    protected $productFactory;

    /**
     *
     * @param Context $context
     */
    public function __construct(
        Context $context,
        \Magento\Catalog\Model\Product $product,
        \Magento\Catalog\Model\ProductFactory $productFactory
    ) {
        $this->product = $product;
        $this->productFactory = $productFactory;
        parent::__construct($context);
    }

    /**
     *
     * @return parent
     */
    protected function _prepareLayout()
    {

        $this->pageConfig->getTitle()->set(__('Simple Product List'));

        $this->pageConfig->setKeywords(__('Simple Product List'));

        $this->pageConfig->setDescription(__('Simple Product List'));

        $breadcrumbBlock = $this->getLayout()->getBlock('breadcrumbs');

        $breadcrumbBlock->addCrumb(
            'home',
            [
                'label' => __('Home'),
                'title' => __('Home'),
                'link' => '#',
            ]
        );

        $breadcrumbBlock->addCrumb(
            'task',
            [
                'label' => __('Simple Product List'),
                'title' => __('Simple Product List')
            ]
        );

        return parent::_prepareLayout();
    }

    /**
     *
     * Get the latest simple product list
     * @return array
     */
    public function getProductNameList()
    {
        $productName = [];
        // get the max of product for displaying
        $number = (int) $this->getRequest()->getParam('number');
        if ($number <= 0) {
            // set the default value
            $number = 5;
        }
        $productList = $this->product->getCollection()->addAttributeToFilter('type_id', array('eq' => 'simple'))->setPageSize($number)->setCurPage(1)->load()->getData();
        foreach ($productList as $product) {
            $productName[] = [
                'name' => $this->productFactory->create()->load($product['entity_id'])->getName()
            ];
        }
        return $productName;
    }
}
