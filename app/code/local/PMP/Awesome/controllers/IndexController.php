<?php

class PMP_Awesome_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $viewData['sort'] = $this->getRequest()->getParam('sort') == 'DESC' ? 'DESC' : 'ASC';
        $viewData['productCollection'] = Mage::getModel('catalog/product')
            ->getCollection()
  #          ->setOrder('id',  $viewData['sort'])
   #         ->addAttributeToSort('id', $viewData['sort'])
            ->addAttributeToSort('id', 'descending')
            ->addAttributeToSelect('*')
   #         ->addAttributeToSelect(array('pos','ext_url','name','price','description','url_key','status'))
            ->addUrlRewrite()
            ->load();
        Mage::getSingleton('core/session')->setViewdata($viewData);
        $this->renderLayout();
    }
}