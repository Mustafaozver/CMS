<?php 
/**
 * Giving myself more functionality over this bit
 * 
 * @author byrd
 *
 */
class BetterXML extends SimpleXMLElement
{
    /**
     * 
     */
    public function parentNode() {
        $parent = current($this->xpath('parent::*'));
        return $parent;
    }
    
    /**
     * 
     * @param unknown_type $sametag
     */
    function getSiblings( $sametag = false ) {
        if ($sametag) {
            $sametag = $this->getName();
        }
        if (!$sametag)
            $sametag = '*';
        return $this->xpath("preceding-sibling::$sametag | following-sibling::$sametag");
    }
    
    /**
     * 
     * @param unknown_type $sametag
     */
    function getSiblingsToo( $sametag = false ) {
        if ($sametag) {
            $sametag = $this->getName();
        }
        if (!$sametag)
            $sametag = '*';
        return $this->xpath("preceding-sibling::$sametag | following-sibling::$sametag | .");
    }
    
    /**
     * 
     * @param unknown_type $key
     * @param unknown_type $value
     */
    public function addChild($key, $value=null)
    {
        $value = str_replace('&', '&amp;', $value);
        return parent::addChild($key, $value);
    }
    
    /**
     * Add CDATA text in a node
     * @param string $cdata_text The CDATA value  to add
     */
    private function addCData($cdata_text)
    {
        $node= dom_import_simplexml($this);
        $no = $node->ownerDocument;
        $node->appendChild($no->createCDATASection($cdata_text));
    }
    
    /**
     * 
     * @param unknown_type $add
     */
    public function extend( $add )
    {
        if ( $add->count() != 0 )
            $new = $this->addChild($add->getName());
        else
            $new = $this->addChild($add->getName(), $add);
        foreach ($add->attributes() as $a => $b)
        {
            $new->addAttribute($a, $b);
        }
        if ( $add->count() != 0 )
        {
            foreach ($add->children() as $child)
            {
                $new->extend($child);
            }
        }
    }
    
    /** 
    * remove a SimpleXmlElement from it's parent 
    * @return $this 
    */ 
    public function remove()
    {
        $node = dom_import_simplexml($this);
        $node->parentNode->removeChild($node); 
        return $this; 
    } 
    
    /**
     * remove given SimpleXmlElement from current element
     * @return $this
     */
    public function removeChild(SimpleXMLElement $child)
    {
        $node = dom_import_simplexml($this);
        $child = dom_import_simplexml($child);
        $node->removeChild($child);
        return $this;
    }
    
    /** 
     * replace current element with another SimpleXmlElement 
     * @param SimpleXmlElement $replaceElmt passed by reference 
     *        (must be done if we want further modification to the $replaceElmt element to be applyed to the document) 
     * @return $this 
     */ 
    public function replace(SimpleXmlElement &$replaceElmt)
    { 
        list($node,$_replaceElmt) = self::getSameDocDomNodes($this,$replaceElmt); 
        $node->parentNode->replaceChild($_replaceElmt,$node); 
        $replaceElmt = simplexml_import_dom($_replaceElmt); 
        return $this; 
    } 
    
    /**
     * replace a child SimpleXmlElement with another SimpleXmlElement
     * @param SimpleXmlElement $newChild passed by reference
     *        (must be done if we want further modification to the newChild element to be applyed to the document)
     * @param SimpleXmlElement $oldChild
     * @return $this
     */
    public function replaceChild(SimpleXmlElement &$newChild,SimpleXmlElement $oldChild)
    {
        list($oldChild,$_newChild) = self::getSameDocDomNodes($oldChild,$newChild);
        $oldChild->parentNode->replaceChild($_newChild,$oldChild);
        $newChild= simplexml_import_dom($_newChild);
        return $this;
    }
    
    /**
     * static utility method to get two dom elements and ensure that the second is part of the same document than the first given.
     * @param SimpleXmlElement $node1
     * @param SimpleXmlElement $node2
     * @return array(DomElement,DomElement)
     */
    static public function getSameDocDomNodes(SimpleXMLElement $node1,SimpleXMLElement $node2)
    {
        $node1 = dom_import_simplexml($node1);
        $node2 = dom_import_simplexml($node2);
        if(! $node1->ownerDocument->isSameNode($node2->ownerDocument) )
            $node2 = $node1->ownerDocument->importNode($node2, true);
        return array($node1,$node2);
    }
    
    /**
     * 
     * @param unknown_type $name
     * @param unknown_type $value
     */
    public function prependChild($name, $value)
    {
        $dom = dom_import_simplexml($this);
        $new = $dom->insertBefore(
            $dom->ownerDocument->createElement($name, $value),
            $dom->firstChild
        );
        return simplexml_import_dom($new, get_class($this));
    }
    
    /**
     * 
     * @param unknown_type $p1
     * @param unknown_type $p2
     * @return BetterXML
     */
    public function sort( $p1 )
    {
        // Build a sortable array
        $count = 0;
        $array = array();
        foreach ($this->getSiblingsToo() as $p) {
            foreach( $p as $name => $entry ) {
                $array[$count][$name] = (string) $entry; // Record to array
            }
            if (array_key_exists($count, $array)) {
                $array[$count]['__index'] = $count;
            }
            $count++;
        }
        
        // Sort it
        $this->_sortBy = (string) $p1;
        usort($array, array($this, 'sortBy'));
        unset($this->_sortBy);
        
        // Update the xml
        $siblings = $this->getSiblingsToo();
        foreach ($array as $k => $a) {
            $xml = simplexml_load_string( $siblings[$a['__index']]->asXML() );
            $siblings[$a['__index']]->remove();
            $this->parentNode()->extend( $xml );
        }
        return $this;
    }
    
    /**
     * usort callback
     * 
     * @param unknown_type $a
     * @param unknown_type $b
     * @return boolean
     */
    public function sortBy( $a, $b ) {
        return $a[(string)$this->_sortBy] > $b[(string)$this->_sortBy];
    }
    
    /**
     * Convert XML string to an array
     * 
     * @param unknown_type $xmlStirng
     */
    function asArray() {
        return json_decode(json_encode($this->getSiblingsToo(true)),true);
    }
}
