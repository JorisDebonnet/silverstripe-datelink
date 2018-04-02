<?php

namespace TractorCow\DateLink\Routing;

use SilverStripe\CMS\Controllers\ModelAsController;
use SilverStripe\CMS\Model\SiteTree;

/**
 * Handles urls that match dated link routes
 *
 * @package datelink
 * @author Damian Mooyman
 * @see ModelAsController
 */
class DateLinkController extends ModelAsController
{
    protected function init()
    {
        die('hello?'); // this never gets called
    }

    /**
     * Finds the controller for this page under the given parent id
     */
    public function getNestedController()
    {
        die('helloooooo?'); // this never gets called
        // Extract values stored in route
        $parentID = $this->request->param('ParentID');
        $URLSegment = $this->request->param('URLSegment');

        // get child page
        $sitetree = SiteTree::get()
            ->filter([
                "URLSegment" => $URLSegment,
                "ParentID" => $parentID
            ])->first();

        return self::controller_for($sitetree, $this->request->param('Action'));
    }
}
