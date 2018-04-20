<?php

/**
 * This class does load the information from the parent page in the SiteTree.
 *
 * If you are keen to avoid extensions (to save resources) please see the end of this file for the method to copy into
 * your Page.php
 */
class InheritageBySiteTreeExtension extends Extension
{
    /**
     * Does nothing else than just calling the parent, if exists, and returning $dbField or calling itself again.
     *
     * @throws Exception
     * @param string $dbField
     * @return null|string|DataList
     */
    public function getFromParentPage($dbField)
    {
        if (!is_string($dbField)) {
            throw new Exception('You can only give strings to getFromParentPage');
        }

        $result = null;

        // if this isn't the top level page...
        $parentPage = $this->owner->Parent();
        if ($parentPage) {
            // ... check if it has this field...
            if ($parentPage->hasField($dbField)) {
                $result = $parentPage->$dbField;
            } else if (get_class($parentPage) != 'SiteTree') {
                // ... if not call its parent.
                $result = $parentPage->getFromParentPage($dbField);
            }
        }

        return $result;
    }
}


    /**
     * Does nothing else than just calling the parent, if exists, and returning $dbField or calling itself again.
     *
     * @see https://www.github.com/bringyourownideas/inheritage-by-sitetree
     *
     * @throws Exception
     * @param string $dbField
     * @return null|string|DataList
     */
/*
    public function getFromParentPage($dbField)
    {
        if (!is_string($dbField)) {
            throw new Exception('You can only give strings to getFromParentPage');
        }

        $result = null;

        // if this isn't the top level page...
        $parentPage = $this->Parent();
        if ($parentPage) {
            // ... check if it has this field...
            if ($parentPage->hasField($dbField)) {
                $result = $parentPage->$dbField;
            } else {
                // ... if not call its parent.
                $result = $parentPage->getFromParentPage($dbField);
            }
        }

        return $result;
    }
 */
