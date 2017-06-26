<?php

/**
 * @Author: Ngo Quang Cuong
 * @Date:   2017-06-26 20:13:30
 * @Last Modified by:   nquangcuong
 * @Last Modified time: 2017-06-26 20:18:42
 * @website: http://giaphugroup.com
 */

namespace PHPCuong\Product\Block\Product;

class CategoryList extends \Magento\Framework\View\Element\Template
{
    /**
     *
     * @param \Magento\Catalog\Model\ProductFactory
     */
    protected $productFactory;

    /**
     *
     * @param \Magento\Catalog\Model\CategoryFactory
     */
    protected $categoryFactory;

    /**
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Catalog\Model\ProductFactory $product
     * @param \Magento\Catalog\Model\CategoryFactory $category
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Model\ProductFactory $product,
        \Magento\Catalog\Model\CategoryFactory $category
    ) {
        $this->productFactory = $product;
        $this->categoryFactory = $category;
        parent::__construct($context);
    }

    /*
     * Get the categoris list of the product
     * @return array
     */
    public function getProductCategories()
    {
        // get product id param from url, for example catalog/product/view/id/1866
        $productId = (int) $this->getRequest()->getParam('id');
        // load the product information from product id
        $product = $this->productFactory->create()->load($productId);
        $categories = [];
        // if product exists
        if ($product) {
            foreach ($product->getCategoryIds() as $categoryId) {
                // load the category information from the category id
                $category = $this->categoryFactory->create()->load($categoryId);
                $categories[] = [
                    'name' => $category->getName(),
                    'link' => $category->getUrl()
                ];
            }
        }
        return $categories;
    }
}
