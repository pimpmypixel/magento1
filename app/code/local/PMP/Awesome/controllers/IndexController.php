<?php

/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * @category    PimpMyPixel
 * @package     PMP_Awesome
 * @copyright   Copyright (c) 2016
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class PMP_Awesome_IndexController extends Mage_Core_Controller_Front_Action
{

    /**
     * @var array
     */
    public $viewData;

    /**
     * Index method
     * Gets sort GET request, retrieve and sort products by position (as per assignment) according to sort
     */
    public function indexAction()
    {
        $this->loadLayout();
        $viewData['sort'] = $this->getRequest()->getParam('sort') == 'DESC' ? 'DESC' : 'ASC';
        $viewData['productCollection'] = Mage::getModel('catalog/product')
            ->getCollection()
            ->addAttributeToSort('pos', $viewData['sort'])
            ->addAttributeToSelect('*')
            ->load();
        $viewData['productCollection'] = $viewData['productCollection']->getItems();
        Mage::getSingleton('core/session')->setViewdata($viewData);
        $this->renderLayout();
    }
}