<?php

class PMP_Awesome_IndexController extends Mage_Core_Controller_Front_Action
{
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