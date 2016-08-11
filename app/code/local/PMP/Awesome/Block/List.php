<?php

class PMP_Awesome_Block_List extends Mage_Catalog_Block_Product_Abstract
{
    protected $_itemCollection = null;

    public function getItems()
    {
        var_dump($this);
        $color = $this->getColor();
        if (!$color)
            return false;
        if (is_null($this->_itemCollection)) {
            $this->_itemCollection = Mage::getModel('pmp_awesome/products')->getItemsCollection($color);
        }

        return $this->_itemCollection;
    }
}